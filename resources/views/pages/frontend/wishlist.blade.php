@extends('layouts.frontend.master')

@section('title', 'Wishlist')

@section('content')
        <div class="bodyWrapper flex-grow-1">
            <section class="subheader py-5">
                <div class="container py-lg-5">
                    <div class="row py-lg-4">
                        <div class="col-md-6 text-white">
                            <h1>Wishlist</h1>
                            <p class="mb-0 fw-light">Get to know any questions of what values we provide and believe in</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="wishlist_sec py-5">
                <div class="container py-lg-5">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 col-xl-3 my-15">
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product6.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product6.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-20%</div>
                                    <div class="wishlist active">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Remove From Wishlist"><i class="fa-solid fa-trash"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">Fall Cropped Knit</a></h4>
                                    <div class="price">
                                        <del>$20.00</del>
                                        <ins>$10.00</ins>
                                    </div>
                                    <div class="rating">
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-regular fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 my-15">
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product1.png') }}" alt="Product Name" class="img-fluid" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-30%</div>
                                    <div class="wishlist active">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Remove From Wishlist"><i class="fa-solid fa-trash"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">Fave Zip Cardigan</a></h4>
                                    <div class="price">
                                        <del>$20.00</del>
                                        <ins>$10.00</ins>
                                    </div>
                                    <div class="rating">
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-solid fa-star"></span>
                                        <span class="fa-regular fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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