@extends('layouts.frontend.master')

@section('title', 'Edit Shipping Address')

@section('content')
<div class="bodyWrapper flex-grow-1">
    @include('partials.subheader-myaccount')


    <section class="myaccount_sec py-5">
        <div class="container">
            <div class="row gx-lg-5">
                @include('partials.my-account-sidebar')
                <div class="col-lg-9 my-2">
                    <div class="account_right_side">
                        <div class="profile_page">
                            <h2 class="acc_heading pb-3">Shipping Address</h2>
                            <div class="account_form">
                                <form action="{{ route('address.shipping.update') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" 
                                                   value="{{ old('first_name', $address->first_name ?? Auth::user()->first_name ?? '') }}" required />
                                            @error('first_name')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" 
                                                   value="{{ old('last_name', $address->last_name ?? Auth::user()->last_name ?? '') }}" required />
                                            @error('last_name')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="company_name">Company Name (Optional)</label>
                                            <input type="text" class="form-control" name="company_name" id="company_name" 
                                                   value="{{ old('company_name', $address->company_name ?? '') }}" />
                                        </div>

                                        <div class="form-group col-lg-12 mb-3 pb-2">
                                            <label for="country">Country / Region <span class="text-danger">*</span></label>
                                            <select name="country" id="country" class="form-control" required>
                                                <option value="">Select Country</option>
                                                <option value="India" {{ (old('country', $address->country ?? '') == 'India') ? 'selected' : '' }}>India</option>
                                                <option value="United States" {{ (old('country', $address->country ?? '') == 'United States') ? 'selected' : '' }}>United States</option>
                                                <option value="United Kingdom" {{ (old('country', $address->country ?? '') == 'United Kingdom') ? 'selected' : '' }}>United Kingdom</option>
                                                <option value="Canada" {{ (old('country', $address->country ?? '') == 'Canada') ? 'selected' : '' }}>Canada</option>
                                                <option value="Australia" {{ (old('country', $address->country ?? '') == 'Australia') ? 'selected' : '' }}>Australia</option>
                                            </select>
                                            @error('country')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="street_address">Street Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="street_address" id="street_address" 
                                                   placeholder="House number and street name" 
                                                   value="{{ old('street_address', $address->street_address ?? '') }}" required />
                                            @error('street_address')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="apartment" class="d-none">Apartment/Suite</label>
                                            <input type="text" class="form-control" name="apartment" id="apartment" 
                                                   placeholder="Apartment, suite, unit, etc. (optional)" 
                                                   value="{{ old('apartment', $address->apartment ?? '') }}" />
                                        </div>

                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="city">Town / City <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="city" id="city" 
                                                   value="{{ old('city', $address->city ?? '') }}" required />
                                            @error('city')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="state">State <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="state" id="state" 
                                                   value="{{ old('state', $address->state ?? '') }}" required />
                                            @error('state')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="zip_code">ZIP Code <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="zip_code" id="zip_code" 
                                                   value="{{ old('zip_code', $address->zip_code ?? '') }}" required />
                                            @error('zip_code')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone" id="phone" 
                                                   value="{{ old('phone', $address->phone ?? Auth::user()->phone ?? '') }}" required />
                                            @error('phone')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" 
                                                   value="{{ old('email', $address->email ?? Auth::user()->email ?? '') }}" required />
                                            @error('email')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="submit_btn pt-2">
                                        <button type="submit" class="btn btn-dark py-3 text-uppercase px-5">Save Address</button>
                                        <a href="{{ route('address.index') }}" class="btn btn-outline-secondary py-3 text-uppercase px-5">Cancel</a>
                                    </div>
                                </form>
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