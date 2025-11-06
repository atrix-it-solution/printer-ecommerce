@extends('layouts.frontend.master')

@section('title', 'Home')

@section('content')
        <div class="bodyWrapper flex-grow-1">
            <section class="subheader py-5" style="background-image: url('assets/frontend/images/cartbg.jpg');">
                <div class="container py-lg-5">
                    <div class="row">
                        <div class="col-md-6 text-white">
                            <h1 class="text-dark">Cart</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cart_empty py-5" style="display: none;">
                <div class="container py-lg-5">
                    <div class="cart_empty_inner text-center">
                        <div class="empty_img mb-4">
                            <img src="{{ asset('assets/frontend/images/cart_icon.svg') }}" alt="Cart Empty" class="img-fluid" />
                        </div>
                        <h4 class="fw-light py-2">Your cart is currently empty.</h4>
                        <div class="shopbtn pt-3">
                            <a href="shop" class="cusbtn btn btn-dark rounded-0 px-5 py-3">Return to Shop <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cart_sec py-5">
                <div class="container py-lg-5">
                    <div class="notices-wrapper"></div>
                    <div class="row gx-lg-5">
                        <div class="col-lg-8 my-3">
                            <form action="" class="cart-form">
                                <table class="shop_table shop_table_responsive cart">
                                    <thead class="hidden-xs">
                                        <tr>
                                            <th class="product-thumbnail ps-0">Product</th>
                                            <th class="product-name"></th>
                                            <th class="product-price text-center">Price</th>
                                            <th class="product-quantity text-center">Quantity</th>
                                            <th class="product-subtotal text-end pe-0">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset('assets/frontend/images/product1.png') }}" class="img-fluid" alt="Product Title">

                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="#">Product Title</a>
                                                <div class="product-remove">
                                                    <a href="#" class="remove">Remove</a>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="amount">
                                                    <del aria-hidden="true">
                                                        <span class="price-amount amount"><bdi><span class="price-currencySymbol">$</span>109.99</bdi></span>
                                                    </del>
                                                    <ins aria-hidden="true">
                                                        <span class="price-amount amount"><bdi><span class="price-currencySymbol">$</span>69.99</bdi></span>
                                                    </ins>
                                                </span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity ">
                                                    <span class="svg-icon--minus qty-button">
                                                        <svg aria-hidden="true" role="img" focusable="false" width="12" height="2" viewBox="0 0 12 2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M11.998 1.85689H6.85519H5.1409H-0.00195312V0.142604H5.1409L6.85519 0.142578L11.998 0.142604V1.85689Z"></path></svg>
                                                    </span>
                                                    <input type="number" id="quantity_68ee6a75925df" class="input-text qty text" name="cart[qty]" value="1" aria-label="Product quantity" min="0" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                                                    <span class="svg-icon--plus qty-button">
                                                        <svg aria-hidden="true" role="img" focusable="false" width="12" height="12" viewBox="0 0 12 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M11.998 6.85714H6.85519V12H5.1409V6.85714H-0.00195312V5.14286H5.1409V0H6.85519V5.14286H11.998V6.85714Z"></path></svg>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="product-subtotal text-end" data-title="Total">
							                    <span class="price-amount amount">
                                                    <bdi><span class="price-currencySymbol">$</span>69.99</bdi>
                                                </span>
                                                <br>
                                                <span class="price-saved">Save: <span class="price-amount amount">
                                                    <bdi><span class="price-currencySymbol">$</span>40.00</bdi></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset('assets/frontend/images/product2.png') }}" class="img-fluid" alt="Product Title" />
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="#">Product Title</a>
                                                <div class="product-remove">
                                                    <a href="#" class="remove">Remove</a>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="amount">
                                                    <bdi><span class="price-currencySymbol">$</span>579.00</bdi>
                                                </span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity ">
                                                    <span class="svg-icon--minus qty-button">
                                                        <svg aria-hidden="true" role="img" focusable="false" width="12" height="2" viewBox="0 0 12 2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M11.998 1.85689H6.85519H5.1409H-0.00195312V0.142604H5.1409L6.85519 0.142578L11.998 0.142604V1.85689Z"></path></svg>
                                                    </span>
                                                    <input type="number" id="quantity_68ee6a75925df" class="input-text qty text" name="cart[qty]" value="1" aria-label="Product quantity" min="0" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                                                    <span class="svg-icon--plus qty-button">
                                                        <svg aria-hidden="true" role="img" focusable="false" width="12" height="12" viewBox="0 0 12 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M11.998 6.85714H6.85519V12H5.1409V6.85714H-0.00195312V5.14286H5.1409V0H6.85519V5.14286H11.998V6.85714Z"></path></svg>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="product-subtotal text-end" data-title="Total">
							                    <span class="price-amount amount">
                                                    <bdi><span class="price-currencySymbol">$</span>69.99</bdi>
                                                </span>
                                                <br>
                                                <span class="price-saved">Save: <span class="price-amount amount">
                                                    <bdi><span class="price-currencySymbol">$</span>40.00</bdi></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
				                            <td colspan="6" class="actions">
                                                <div class="actions_inner">
                                                    <div class="coupon">
                                                        <label for="coupon_code" class="screen-reader-text d-none">Coupon:</label> 
                                                        <input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="Coupon code">
                                                        <button type="submit" class="btn btn-dark" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark button-update-cart" name="update_cart" value="Update cart" disabled="">Update cart</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-row notes mt-4" id="order_comments_field">
                                    <label for="order_comments" class="pb-2">Order notes</label>
                                    <textarea name="order_comments" class="form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="4" cols="5"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 my-3">
                            <div class="cart_totals">
                                <div class="cart_totals_summary">
                                    <h2>Cart totals</h2>
                                    <table cellspacing="0" class="shop_table shop_table_responsive">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td data-title="Subtotal" class="product-subtotal text-end">
                                                    <span class="price">
                                                        <span class="price-amount amount">
                                                            <bdi><span class="price-currencySymbol">$</span>1,558.98</bdi>
                                                        </span> 
                                                        <br>
                                                        <span class="price-saved">Save: <span class="price-amount amount"><bdi><span class="price-currencySymbol">$</span>49.00</bdi></span></span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td class="text-end" data-title="Total"><strong><span class="price-amount amount"><bdi><span class="price-currencySymbol">$</span>1,558.98</bdi></span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="wc-proceed-to-checkout">
                                        <a href="checkout" class="checkout-button btn btn-dark w-100 text-uppercase">Proceed to checkout</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


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