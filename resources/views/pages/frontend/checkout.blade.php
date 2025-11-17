@extends('layouts.frontend.master')

@section('title', 'Checkout')

@section('content')
<div class="bodyWrapper flex-grow-1">
    <section class="subheader py-5">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-md-6 text-white">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </section>

    @if(!isset($cart) || count($cart) == 0)
    <section class="cart_empty py-5">
        <div class="container py-lg-5">
            <div class="cart_empty_inner text-center">
                <div class="empty_img mb-4">
                    <img src="{{ asset('assets/frontend/images/cart_icon.svg') }}" alt="Cart Empty" class="img-fluid" />
                </div>
                <h4 class="fw-light py-2">Your cart is currently empty.</h4>
                <div class="shopbtn pt-3">
                    <a href="{{ route('shop') }}" class="cusbtn btn btn-dark rounded-0 px-5 py-3">Return to Shop <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="couper_sec pt-5">
        <div class="container pt-lg-4">

         @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

           @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="accordion" id="coupon_code">
                        <div class="accordion-item border-0">
                            <div class="accordion-header text-center">
                                Have a coupon? <span class="collapsed" data-bs-toggle="collapse" data-bs-target="#couponCode" aria-expanded="false" aria-controls="couponCode"><u>Enter your code</u></span>
                            </div>
                            <div id="couponCode" class="accordion-collapse collapse" data-bs-parent="#coupon_code">
                                <div class="accordion-body">
                                    <form id="couponForm">
                                        <div class="form-group pt-2">
                                            <input type="text" name="coupon_code" placeholder="Coupon Code" class="form-control mb-3" />
                                            <button type="submit" class="btn btn-dark w-100">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout_sec py-5">
        <div class="container py-lg-4">
            <div class="notices-wrapper"></div>
            <div class="row gx-lg-5">
                <div class="col-lg-7 my-3">
                    <form action="{{ route('checkout.process') }}" method="POST" class="cart-form" id="checkoutForm">
                        @csrf
                        <div class="checkout_form_box">
                            <h2 class="checkout_heading">Billing Details</h2>
                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <div class="form-group">
                                        <label for="fname">First Name <span class="required">*</span></label>
                                        <input type="text" name="first_name" id="fname" value="{{ old('first_name', auth()->user()->first_name ?? '') }}" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-6 my-2">
                                    <div class="form-group">
                                        <label for="lname">Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" id="lname" value="{{ old('last_name', auth()->user()->last_name ?? '') }}" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-lg-12 my-2">
                                    <div class="form-group">
                                        <label for="companyname">Company Name (Optional)</label>
                                        <input type="text" name="company_name" id="companyname" value="{{ old('company_name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 my-2">
                                    <div class="form-group">
                                        <label for="country">Country / Region <span class="required">*</span></label>
                                        <select class="form-control" name="country" id="country" required>
                                            <option value="">Select Country</option>
                                            <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                            <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                            <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 my-2">
                                    <div class="form-group">
                                        <label for="street_address">Street address <span class="required">*</span></label>
                                        <input type="text" name="street_address" id="street_address" placeholder="House number and street name" value="{{ old('street_address') }}" class="form-control mb-2" required>
                                        <input type="text" name="apartment" id="apartment" placeholder="Apartment, suite, unit, etc. (optional)" value="{{ old('apartment') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 my-2">
                                    <div class="form-group">
                                        <label for="state">State <span class="required">*</span></label>
                                        <select class="form-control" name="state" id="state" required>
                                            <option value="">Select State</option>
                                            <option value="Punjab" {{ old('state') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                                            <option value="Chandigarh" {{ old('state') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-2">
                                    <div class="form-group">
                                        <label for="city">Town / City <span class="required">*</span></label>
                                        <input type="text" name="city" id="city" value="{{ old('city') }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-2">
                                    <div class="form-group">
                                        <label for="zipcode">ZIP Code <span class="required">*</span></label>
                                        <input type="text" name="zip_code" id="zipcode" value="{{ old('zip_code') }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-2">
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="required">*</span></label>
                                        <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-2">
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="required">*</span></label>
                                        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email ?? '') }}" class="form-control" required>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12 my-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="createAccount" name="create_account">
                                        <label class="form-check-label" for="createAccount">Create an account?</label>
                                    </div>
                                </div> -->
                                <div class="col-lg-12 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="shipAddress" name="different_shipping">
                                        <label class="form-check-label" for="shipAddress">Ship to a different address?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="shipping_fields collapse" id="shipping_fields">
                                <h3 class="mt-4">Shipping Address</h3>
                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <div class="form-group">
                                            <label for="shipping_first_name">First Name <span class="required">*</span></label>
                                            <input type="text" name="shipping_first_name" id="shipping_first_name" value="{{ old('shipping_first_name') }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <div class="form-group">
                                            <label for="shipping_last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" name="shipping_last_name" id="shipping_last_name" value="{{ old('shipping_last_name') }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <div class="form-group">
                                            <label for="shipping_company_name">Company Name (Optional)</label>
                                            <input type="text" name="shipping_company_name" id="shipping_company_name" value="{{ old('shipping_company_name') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <div class="form-group">
                                            <label for="shipping_country">Country / Region <span class="required">*</span></label>
                                            <select class="form-control" name="shipping_country" id="shipping_country">
                                                <option value="">Select Country</option>
                                                <option value="India" {{ old('shipping_country') == 'India' ? 'selected' : '' }}>India</option>
                                                <option value="US" {{ old('shipping_country') == 'US' ? 'selected' : '' }}>United States</option>
                                                <option value="UK" {{ old('shipping_country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <div class="form-group">
                                            <label for="shipping_street_address">Street address <span class="required">*</span></label>
                                            <input type="text" name="shipping_street_address" id="shipping_street_address" placeholder="House number and street name" value="{{ old('shipping_street_address') }}" class="form-control mb-2">
                                            <input type="text" name="shipping_apartment" id="shipping_apartment" placeholder="Apartment, suite, unit, etc. (optional)" value="{{ old('shipping_apartment') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <div class="form-group">
                                            <label for="shipping_state">State <span class="required">*</span></label>
                                            <select class="form-control" name="shipping_state" id="shipping_state">
                                                <option value="">Select State</option>
                                                <option value="Punjab" {{ old('shipping_state') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                                                <option value="Chandigarh" {{ old('shipping_state') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <div class="form-group">
                                            <label for="shipping_city">Town / City <span class="required">*</span></label>
                                            <input type="text" name="shipping_city" id="shipping_city" value="{{ old('shipping_city') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <div class="form-group">
                                            <label for="shipping_zip_code">ZIP Code <span class="required">*</span></label>
                                            <input type="text" name="shipping_zip_code" id="shipping_zip_code" value="{{ old('shipping_zip_code') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 my-3">
                    <div class="order_review">
                        <h2 class="checkout_heading">Your Order</h2>
                        <div class="product_table">
                            <table class="shop_table">
                                <thead class="hidden-xs">
                                    <tr>
                                        <th class="ps-0">Product</th>
                                        <th class="text-end pe-0">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="checkout-order-items">
                                    @if(is_array($cart))
                                        @foreach($cart as $item)
                                            @if(is_array($item) && isset($item['title']))
                                            <tr>
                                                <td class="product-thumbnail" data-title="Product">
                                                    <div class="product-dtl">
                                                        <h4>{{ $item['title'] }} <span class="total-product">x {{ $item['quantity'] }}</span></h4>
                                                        <div class="product_price">
                                                            <span class="amount">
                                                                @if(isset($item['sale_price']) && $item['sale_price'] && isset($item['regular_price']) && $item['sale_price'] < $item['regular_price'])
                                                                <del aria-hidden="true">
                                                                    <span class="price-amount amount"><bdi><span class="price-currencySymbol">$</span>{{ number_format($item['regular_price'], 2) }}</bdi></span>
                                                                </del>
                                                                <ins aria-hidden="true">
                                                                    <span class="price-amount amount"><bdi><span class="price-currencySymbol">$</span>{{ number_format($item['sale_price'], 2) }}</bdi></span>
                                                                </ins>
                                                                @else
                                                                <span class="price-amount amount"><bdi><span class="price-currencySymbol">$</span>{{ number_format($item['regular_price'] ?? $item['price'], 2) }}</bdi></span>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product_price pe-0 text-end" data-title="Total">
                                                    <span class="amount">
                                                        <bdi><span class="price-currencySymbol">$</span>{{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 0), 2) }}</bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </tbody>
                               <tfoot>
                                    <tr>
                                        <th class="ps-0">Subtotal</th>
                                        <td class="pe-0 text-end">${{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    
                                    {{-- Show discount if coupon applied --}}
                                    @if($appliedCoupon)
                                    <tr class="discount-row">
                                        <th class="ps-0">Discount ({{ $appliedCoupon['code'] }})
                                            @if(!request()->is('checkout'))
                                            <a href="#" onclick="removeCoupon()" class="text-danger ms-2" title="Remove coupon">
                                                <small>×</small>
                                            </a>
                                            @endif
                                        </th>
                                        <td class="pe-0 text-end text-success">-${{ number_format($discountAmount, 2) }}</td>
                                    </tr>
                                    @endif
                                    
                                    <tr>
                                        <th class="ps-0">Shipping</th>
                                        <td class="pe-0 text-end">
                                            Free Shipping
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0">Total</th>
                                        <td class="pe-0 text-end">${{ number_format($total, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="payment_box">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="bank_transfer" id="bankTransfer" name="payment_method" required />
                                            <label class="form-check-label" for="bankTransfer">Direct bank transfer</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="check" id="checkPayments" name="payment_method" required />
                                            <label class="form-check-label" for="checkPayments">Check payments</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="cod" id="cashDelivery" name="payment_method" required />
                                            <label class="form-check-label" for="cashDelivery">Cash on delivery</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="policy_text">
                                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="1" id="agreeTerms" name="agree_terms" required />
                                <label class="form-check-label" for="agreeTerms">I have read and agree to the website <a href="#">terms and conditions *</a></label>
                            </div>

                            <button class="btn btn-dark w-100 placebtn" type="submit" form="checkoutForm">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <hr style="opacity: .1;">

    <section class="features_sec py-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon1.svg') }}" alt="Complimentary Shipping" class="img-fluid" />
                        </div>
                        <h4>Complimentary Shipping</h4>
                        <p>Free worldwide shipping and returns - customs and duties taxes included.</p>
                    </div>
                </div>
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon2.svg') }}" alt="Customer service" class="img-fluid" />
                        </div>
                        <h4>Customer service</h4>
                        <p>We are available from Monday-Friday to answer your questions.</p>
                    </div>
                </div>
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon3.svg') }}" alt="Secure payment" class="img-fluid" />
                        </div>
                        <h4>Secure payment</h4>
                        <p>Your payment information is processed securely.</p>
                    </div>
                </div>
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon4.svg') }}" alt="Contact us" class="img-fluid" />
                        </div>
                        <h4>Contact us</h4>
                        <p>Need to contact us? Send us an e-mail at support@printhelp.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/frontend/js/coupons.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle shipping address fields
    const shipAddressCheckbox = document.getElementById('shipAddress');
    const shippingFields = document.getElementById('shipping_fields');
    
    if (shipAddressCheckbox && shippingFields) {
        shipAddressCheckbox.addEventListener('change', function() {
            if (this.checked) {
                shippingFields.classList.add('show');
            } else {
                shippingFields.classList.remove('show');
            }
        });
    }

    // Checkout form validation and data inclusion
    const checkoutForm = document.getElementById('checkoutForm');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            if (!validateCheckoutForm()) {
                e.preventDefault();
                return false;
            }
            
            // Add payment method and terms to form data dynamically
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            const agreeTerms = document.getElementById('agreeTerms');
            
            if (paymentMethod) {
                // Remove any existing payment method hidden input
                const existingPaymentInput = document.querySelector('input[name="payment_method"][type="hidden"]');
                if (existingPaymentInput) {
                    existingPaymentInput.remove();
                }
                
                // Create new hidden input for payment method
                let paymentInput = document.createElement('input');
                paymentInput.type = 'hidden';
                paymentInput.name = 'payment_method';
                paymentInput.value = paymentMethod.value;
                this.appendChild(paymentInput);
            }
            
            if (agreeTerms && agreeTerms.checked) {
                // Remove any existing terms hidden input
                const existingTermsInput = document.querySelector('input[name="agree_terms"][type="hidden"]');
                if (existingTermsInput) {
                    existingTermsInput.remove();
                }
                
                // Create new hidden input for terms
                let termsInput = document.createElement('input');
                termsInput.type = 'hidden';
                termsInput.name = 'agree_terms';
                termsInput.value = '1';
                this.appendChild(termsInput);
            }
            
            // Show loading state
            const submitBtn = document.querySelector('button[form="checkoutForm"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Processing... <i class="fa-solid fa-spinner fa-spin"></i>';
            }
        });
    }
});

function validateCheckoutForm() {
    let isValid = true;
    
    // Validate required fields in the main form
    const requiredFields = document.querySelectorAll('#checkoutForm [required]');
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('is-invalid');
            
            // Add error message if not exists
            if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('invalid-feedback')) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'invalid-feedback';
                errorDiv.textContent = 'This field is required.';
                field.parentNode.appendChild(errorDiv);
            }
        } else {
            field.classList.remove('is-invalid');
            // Remove error message if exists
            const errorDiv = field.parentNode.querySelector('.invalid-feedback');
            if (errorDiv) {
                errorDiv.remove();
            }
        }
    });
    
    // Check if payment method is selected (outside form)
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    if (!paymentMethod) {
        // Create and show custom alert instead of default alert
        showCustomAlert('Please select a payment method.');
        isValid = false;
        
        // Highlight payment methods
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.classList.add('is-invalid');
        });
    } else {
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.classList.remove('is-invalid');
        });
    }
    
    // Check if terms are agreed (outside form)
    const agreeTerms = document.getElementById('agreeTerms');
    if (!agreeTerms.checked) {
        showCustomAlert('Please agree to the terms and conditions.');
        agreeTerms.classList.add('is-invalid');
        isValid = false;
    } else {
        agreeTerms.classList.remove('is-invalid');
    }
    
    if (!isValid) {
        // Scroll to first error
        const firstError = document.querySelector('.is-invalid');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
    
    return isValid;
}

// Custom alert function to avoid blocking the thread
function showCustomAlert(message) {
    // Remove existing alert if any
    const existingAlert = document.querySelector('.custom-alert');
    if (existingAlert) {
        existingAlert.remove();
    }
    
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = 'custom-alert alert alert-warning alert-dismissible fade show position-fixed';
    alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(alertDiv);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}
</script>
@endsection