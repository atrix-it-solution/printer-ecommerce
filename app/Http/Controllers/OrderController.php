<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Check if user is admin (dashboard) or regular user
        if (Auth::check() && Auth::user()->isAdmin()) {
            // Admin dashboard - show all orders
            $orders = Order::with('user')
                          ->orderBy('created_at', 'desc')
                          ->paginate(10);
        } else {
            // Regular user - show only their orders
            $orders = Order::where('user_id', Auth::id())
                          ->orderBy('created_at', 'desc')
                          ->paginate(10);
        }
        
        $user = Auth::user();
        
        // Return different views based on user role
        if (Auth::check() && Auth::user()->isAdmin()) {
            return view('pages.dashboard.ordersdashboard.index', compact('orders', 'user'));
        } else {
            return view('pages.frontend.orders', compact('orders', 'user'));
        }
    }
    
    public function show(Order $order)
    {
        // FIX: Use proper type casting
        if ((int)$order->user_id !== (int)Auth::id()) {
            \Log::error('Order show access denied', [
                'order_id' => $order->id,
                'order_user_id' => $order->user_id,
                'order_user_id_type' => gettype($order->user_id),
                'auth_user_id' => Auth::id(),
                'auth_user_id_type' => gettype(Auth::id()),
                'order_number' => $order->order_number
            ]);
            abort(403, 'Unauthorized action.');
        }
        
        $order->load(['orderItems' => function($query) {
            $query->with(['product' => function($query) {
                $query->select('id', 'title', 'slug');
            }]);
        }]);
        $user = Auth::user();
        
        return view('pages.frontend.view-order', compact('order', 'user'));
    }

   public function success(Order $order)
{
    // Check session first, then user ID
    $lastOrderId = session('last_order_id');
    
    if ($lastOrderId && $lastOrderId == $order->id) {
        session()->forget('last_order_id');
        return view('pages.frontend.order-success', compact('order'));
    }
    
    // Fallback to user check
    if ((int)$order->user_id === (int)Auth::id()) {
        return view('pages.frontend.order-success', compact('order'));
    }
    
    abort(403, "Order #{$order->order_number} access denied.");
}

    public function destroy(Order $order)
    {
        // Check if user is authorized to delete this order
        if ($order->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete order items first (if needed, depending on your database constraints)
        $order->orderItems()->delete();
        
        // Delete the order
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}