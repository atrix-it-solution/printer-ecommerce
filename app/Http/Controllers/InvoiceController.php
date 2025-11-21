<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
     public function download(Order $order)
    {
        // FIX: Use proper type casting
        if ((int)$order->user_id !== (int)Auth::id()) {
            \Log::error('Invoice download access denied', [
                'order_id' => $order->id,
                'order_user_id' => $order->user_id,
                'order_user_id_type' => gettype($order->user_id),
                'auth_user_id' => Auth::id(),
                'auth_user_id_type' => gettype(Auth::id()),
                'order_number' => $order->order_number
            ]);
            abort(403, 'Unauthorized action.');
        }

        // Load order relationships
        $order->load(['orderItems.product', 'user']);

        $data = [
            'order' => $order,
            'user' => Auth::user(),
        ];

        $pdf = Pdf::loadView('pdf.invoice', $data);
        
        return $pdf->download('invoice-' . $order->order_number . '.pdf');
    }

    public function view(Order $order)
    {
        // FIX: Use proper type casting
        if ((int)$order->user_id !== (int)Auth::id()) {
            \Log::error('Invoice view access denied', [
                'order_id' => $order->id,
                'order_user_id' => $order->user_id,
                'order_user_id_type' => gettype($order->user_id),
                'auth_user_id' => Auth::id(),
                'auth_user_id_type' => gettype(Auth::id()),
                'order_number' => $order->order_number
            ]);
            abort(403, 'Unauthorized action.');
        }

        // Load order relationships
        $order->load(['orderItems.product', 'user']);

        $data = [
            'order' => $order,
            'user' => Auth::user(),
        ];

        return view('pdf.invoice', $data);
    }
}