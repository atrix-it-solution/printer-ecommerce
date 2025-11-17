<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CouponController extends Controller
{
    public function applyCoupon(Request $request)
    {
        try {
            $request->validate([
                'coupon_code' => 'required|string'
            ]);
            
            // Get cart data
            $cart = session()->get('cart', []);
            
            if (empty($cart)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your cart is empty.'
                ]);
            }
            
            // Implement your coupon logic here
            $couponCode = strtoupper($request->coupon_code);
            
            // Example coupon validation - you can move this to a database later
            $validCoupons = [
                'SAVE10' => [
                    'discount' => 0.10,
                    'type' => 'percentage',
                    'min_amount' => 0
                ],
                'SAVE20' => [
                    'discount' => 0.20,
                    'type' => 'percentage', 
                    'min_amount' => 0
                ],
                'FIXED5' => [
                    'discount' => 5.00,
                    'type' => 'fixed',
                    'min_amount' => 20
                ]
            ];
            
            if (!array_key_exists($couponCode, $validCoupons)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid coupon code.'
                ]);
            }
            
            $coupon = $validCoupons[$couponCode];
            $subtotal = $this->calculateSubtotal($cart);
            
            // Check minimum amount for coupon
            if ($subtotal < $coupon['min_amount']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimum order amount of $' . $coupon['min_amount'] . ' required for this coupon.'
                ]);
            }
            
            // Calculate discount based on type
            if ($coupon['type'] === 'percentage') {
                $discountAmount = $subtotal * $coupon['discount'];
            } else {
                $discountAmount = $coupon['discount'];
            }
            
            $total = $subtotal - $discountAmount;
            
            // Ensure total doesn't go below 0
            if ($total < 0) {
                $total = 0;
                $discountAmount = $subtotal;
            }
            
            // Store coupon in session
            session()->put('applied_coupon', [
                'code' => $couponCode,
                'discount' => $coupon['discount'],
                'discount_amount' => $discountAmount,
                'type' => $coupon['type'],
                'min_amount' => $coupon['min_amount']
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Coupon applied successfully!',
                'cart_total' => number_format($total, 2),
                'discount_amount' => number_format($discountAmount, 2),
                'subtotal' => number_format($subtotal, 2),
                'coupon_code' => $couponCode
            ]);
            
        } catch (\Exception $e) {
            Log::error('Apply coupon error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to apply coupon. Please try again.'
            ], 500);
        }
    }
    
    public function removeCoupon(Request $request)
    {
        try {
            // Remove coupon from session
            session()->forget('applied_coupon');
            
            // Recalculate totals without coupon
            $cart = session()->get('cart', []);
            $subtotal = $this->calculateSubtotal($cart);
            $total = $subtotal;
            
            return response()->json([
                'success' => true,
                'message' => 'Coupon removed successfully!',
                'cart_total' => number_format($total, 2),
                'subtotal' => number_format($subtotal, 2)
            ]);
            
        } catch (\Exception $e) {
            Log::error('Remove coupon error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to remove coupon.'
            ], 500);
        }
    }
    
    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            if (is_array($item) && isset($item['price']) && isset($item['quantity'])) {
                $subtotal += $item['price'] * $item['quantity'];
            }
        }
        return $subtotal;
    }
}