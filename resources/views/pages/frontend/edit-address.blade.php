@extends('layouts.frontend.master')

@section('title', 'Edit Address')

@section('content')
<div class="bodyWrapper flex-grow-1">
     @include('partials.subheader-myaccount')


    <section class="myaccount_sec py-5">
        <div class="container">
            <div class="row gx-lg-5">
                @include('partials.my-account-sidebar')
                <div class="col-lg-9 my-2">
                    <div class="account_right_side">
                        <div class="address_page">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="row gx-lg-5">
                                <div class="col-lg-6">
                                    <div class="heading_row d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">Billing Address</h4>
                                        <a href="{{ route('address.billing') }}" class="fw-semibold text-decoration-underline">{{ $billingAddress ? 'Edit' : 'Add' }}</a>
                                    </div>
                                    <div class="address_box mt-3 p-4 border">
                                        @if($billingAddress)
                                            <address class="mb-0">
                                                <strong>{{ $billingAddress->first_name }} {{ $billingAddress->last_name }}</strong><br>
                                                @if($billingAddress->company_name)
                                                    {{ $billingAddress->company_name }}<br>
                                                @endif
                                                {{ $billingAddress->street_address }}<br>
                                                @if($billingAddress->apartment)
                                                    {{ $billingAddress->apartment }}<br>
                                                @endif
                                                {{ $billingAddress->city }}, {{ $billingAddress->state }} {{ $billingAddress->zip_code }}<br>
                                                {{ $billingAddress->country }}<br>
                                                <strong>Phone:</strong> {{ $billingAddress->phone }}<br>
                                                <strong>Email:</strong> {{ $billingAddress->email }}
                                            </address>
                                        @else
                                            <p class="fst-italic mb-0">You have not set up your billing address yet.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="heading_row d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">Shipping Address</h4>
                                        <a href="{{ route('address.shipping') }}" class="fw-semibold text-decoration-underline">
                                            {{ $shippingAddress ? 'Edit' : 'Add' }}
                                        </a>
                                    </div>
                                    <div class="address_box mt-3 p-4 border">
                                        @if($shippingAddress)
                                            <address class="mb-0">
                                                <strong>{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }}</strong><br>
                                                @if($shippingAddress->company_name)
                                                    {{ $shippingAddress->company_name }}<br>
                                                @endif
                                                {{ $shippingAddress->street_address }}<br>
                                                @if($shippingAddress->apartment)
                                                    {{ $shippingAddress->apartment }}<br>
                                                @endif
                                                {{ $shippingAddress->city }}, {{ $shippingAddress->state }} {{ $shippingAddress->zip_code }}<br>
                                                {{ $shippingAddress->country }}<br>
                                                <strong>Phone:</strong> {{ $shippingAddress->phone }}<br>
                                                <strong>Email:</strong> {{ $shippingAddress->email }}
                                            </address>
                                        @else
                                            <p class="fst-italic mb-0">You have not set up your shipping address yet.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.features_sec')

</div>
@endsection