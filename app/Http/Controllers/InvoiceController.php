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
        // Check if order belongs to authenticated user
        if ($order->user_id !== Auth::id()) {
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
        // Check if order belongs to authenticated user
        if ($order->user_id !== Auth::id()) {
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