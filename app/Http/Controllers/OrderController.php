<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
        
        // Pass user data to the view
        $user = Auth::user();
        
        return view('pages.frontend.orders', compact('orders', 'user'));
    }
    
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $order->load('orderItems.product');
        $user = Auth::user(); // Get authenticated user
        
        return view('pages.frontend.view-order', compact('order', 'user'));
    }

    public function success(Order $order)
    {
        // Verify that the order belongs to the authenticated user
        if (Auth::check() && $order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('pages.frontend.order-success', compact('order'));
    }
}