@extends('layouts.frontend.master')

@section('title', 'Order Success')

@section('content')
<div class="bodyWrapper flex-grow-1">
    <section class="subheader py-5">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-md-6 text-white">
                    <h1>Order Confirmation</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="order-success py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="success-icon mb-4">
                        <i class="fa-solid fa-circle-check text-success" style="font-size: 80px;"></i>
                    </div>
                    <h2 class="mb-3">Thank You For Your Order!</h2>
                    <p class="lead mb-4">Your order has been placed successfully.</p>
                    
                    <div class="order-details bg-light p-4 rounded mb-4">
                        <h4 class="mb-3">Order Details</h4>
                        <p><strong>Order Number:</strong> #{{ $order->order_number }}</p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                        <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-success">{{ ucfirst($order->order_status) }}</span></p>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-dark me-3">View Order Details</a>
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-dark me-3">View All Orders</a>
                        <a href="{{ route('shop') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection