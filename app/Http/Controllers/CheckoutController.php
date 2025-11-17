<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product\Product; 

class CheckoutController extends Controller
{
    public function showCheckout(Request $request)
    {
        try {
            // Get cart data from session
            $cart = session()->get('cart', []);
            
            \Log::info('Checkout cart data:', [
                'cart_count' => count($cart),
                'cart_items' => $cart
            ]);
            
            if (empty($cart)) {
                return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
            }
            
            $subtotal = $this->calculateSubtotal($cart);
            $appliedCoupon = session()->get('applied_coupon');
            
            // Apply coupon discount if any
            if ($appliedCoupon) {
                $discountAmount = $appliedCoupon['discount_amount'];
                $total = $subtotal - $discountAmount;
            } else {
                $total = $subtotal;
                $discountAmount = 0;
            }
            
            return view('pages.frontend.checkout', compact('cart', 'subtotal', 'total', 'appliedCoupon', 'discountAmount'));
            
        } catch (\Exception $e) {
            Log::error('Checkout page error: ' . $e->getMessage());
            return redirect()->route('cart.view')->with('error', 'Unable to load checkout page.');
        }
    }
    
    public function processCheckout(Request $request)
    {
        try {
             \Log::info('Checkout process started', [
            'user_id' => Auth::id(),
            'request_data' => $request->all(),
            'cart_count' => count(session()->get('cart', [])),
            'session_id' => session()->getId()
        ]);

            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'country' => 'required|string',
                'street_address' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'zip_code' => 'required|string',
                'payment_method' => 'required|string|in:cod,bank_transfer,check',
                'agree_terms' => 'required|accepted'
            ]);
            
            // Get cart data from session
            $cart = session()->get('cart', []);
            $appliedCoupon = session()->get('applied_coupon');

               \Log::info('Cart data in checkout:', ['cart' => $cart]);
            
            if (empty($cart)) {
                return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
            }
            
            // Calculate totals
            $subtotal = $this->calculateSubtotal($cart);
            $discountAmount = $appliedCoupon ? $appliedCoupon['discount_amount'] : 0;
            $total = $subtotal - $discountAmount;
            
            // Create order
            $order = $this->createOrder($request, $cart, $subtotal, $discountAmount, $total, $appliedCoupon);
            
            // Create order items
            $this->createOrderItems($order, $cart);
            
            // Update product stock quantities
            $this->updateProductStock($cart);
            
            // Clear cart and coupon session
            session()->forget('cart');
            session()->forget('applied_coupon');
            
            return redirect()->route('order.success', ['order' => $order->id])->with('success', 'Order placed successfully!');
            
        } catch (\Exception $e) {
             \Log::error('Checkout process error: ' . $e->getMessage());
        \Log::error('Stack trace: ' . $e->getTraceAsString());
            return back()->with('error', 'Unable to process your order. Please try again.')->withInput();
        }
    }
    
    /**
     * Create order in database
     */
    private function createOrder($request, $cart, $subtotal, $discountAmount, $total, $appliedCoupon)
    {
        $orderData = [
            'order_number' => Order::generateOrderNumber(),
            'user_id' => Auth::id(),
            'subtotal' => $subtotal,
            'discount_amount' => $discountAmount,
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'pending',
            'order_status' => 'pending',
            
            // Billing details
            'billing_first_name' => $request->first_name,
            'billing_last_name' => $request->last_name,
            'billing_email' => $request->email,
            'billing_phone' => $request->phone,
            'billing_country' => $request->country,
            'billing_street_address' => $request->street_address,
            'billing_apartment' => $request->apartment,
            'billing_city' => $request->city,
            'billing_state' => $request->state,
            'billing_zip_code' => $request->zip_code,
            
            // Shipping details
            'shipping_first_name' => $request->shipping_first_name ?? $request->first_name,
            'shipping_last_name' => $request->shipping_last_name ?? $request->last_name,
            'shipping_email' => $request->shipping_email ?? $request->email,
            'shipping_phone' => $request->shipping_phone ?? $request->phone,
            'shipping_country' => $request->shipping_country ?? $request->country,
            'shipping_street_address' => $request->shipping_street_address ?? $request->street_address,
            'shipping_apartment' => $request->shipping_apartment ?? $request->apartment,
            'shipping_city' => $request->shipping_city ?? $request->city,
            'shipping_state' => $request->shipping_state ?? $request->state,
            'shipping_zip_code' => $request->shipping_zip_code ?? $request->zip_code,
            
            'order_notes' => $request->order_comments,
            'coupon_code' => $appliedCoupon ? $appliedCoupon['code'] : null,
        ];
        
        return Order::create($orderData);
    }
    
    /**
     * Create order items in database
     */
    private function createOrderItems($order, $cart)
    {
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_name' => $item['title'],
                'product_slug' => $item['slug'],
                'product_price' => $item['price'],
                'product_regular_price' => $item['regular_price'],
                'product_sale_price' => $item['sale_price'],
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }
    }
    
    /**
     * Update product stock quantities
     */
    private function updateProductStock($cart)
    {
        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product && !is_null($product->stock_quantity)) {
                $product->decrement('stock_quantity', $item['quantity']);
            }
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