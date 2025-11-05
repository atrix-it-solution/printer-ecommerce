@extends('layouts.frontend.master')

@section('title', 'Home')

@section('content')
 
  <div class="bodyWrapper flex-grow-1"> 
            <section class="hero_section overflow-hidden">
                <div class="hero_slider common_slider">
                    <div>
                        <div class="hero_slide_box">
                            <a href="javascript:void(0);" class="slide_link"></a>
                            <div class="slide_img">
                                <img src="{{ asset('assets/frontend/images/printer_banner.png') }}" alt="VSIPL" class="img-fluid w-100" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="hero_slide_box">
                            <a href="javascript:void(0);" class="slide_link"></a>
                            <div class="slide_img">
                                <img src="{{ asset('assets/frontend/images/printer_banner.png') }}" alt="VSIPL" class="img-fluid w-100" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="hero_slide_box">
                            <a href="javascript:void(0);" class="slide_link"></a>
                            <div class="slide_img">
                                <img src="{{ asset('assets/frontend/images/printer_banner.png') }}" alt="VSIPL" class="img-fluid w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="category_sec py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-3 my-3">
                            <div class="cat_box">
                                <a href="#" class="cat_img">
                                    <img src="{{ asset('assets/frontend/images/cat_1.jpg') }}" alt="Grocery" class="img-fluid" />
                                </a>
                                <div class="cat_content">
                                    <h4><a href="#">Deskjet Printers</a></h4>
                                    <div class="cusbtn">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 my-3 pt-xl-5">
                            <div class="cat_box">
                                <a href="#" class="cat_img">
                                    <img src="{{ asset('assets/frontend/images/cat_2.jpg') }}" alt="Garments" class="img-fluid" />
                                </a>
                                <div class="cat_content">
                                    <h4><a href="#">Envy Printers</a></h4>
                                    <div class="cusbtn">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 my-3">
                            <div class="cat_box">
                                <a href="#" class="cat_img">
                                    <img src="{{ asset('assets/frontend/images/cat_3.jpg') }}" alt="Food Essentials" class="img-fluid" />
                                </a>
                                <div class="cat_content">
                                    <h4><a href="#">Laserjet Printers</a></h4>
                                    <div class="cusbtn">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 my-3 pt-xl-5">
                            <div class="cat_box">
                                <a href="#" class="cat_img">
                                    <img src="{{ asset('assets/frontend/images/cat_4.jpg') }}" alt="Accessories" class="img-fluid" />
                                </a>
                                <div class="cat_content">
                                    <h4><a href="#">Officejet Printers</a></h4>
                                    <div class="cusbtn">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="features_sec py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-xl-3 my-3">
                            <div class="feature_box">
                                <div class="feature_icon">
                                    <img src="{{ asset('assets/frontend/images/icon1.png') }}" alt="Free shipping" class="img-fluid" />
                                </div>
                                <h4>Free shipping</h4>
                                <p>You will love at great low prices</p>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 my-3">
                            <div class="feature_box">
                                <div class="feature_icon">
                                    <img src="{{ asset('assets/frontend/images/icon2.png') }}" alt="Flexible payment" class="img-fluid" />
                                </div>
                                <h4>Flexible payment</h4>
                                <p>Pay with multiple credit cards</p>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 my-3">
                            <div class="feature_box">
                                <div class="feature_icon">
                                    <img src="{{ asset('assets/frontend/images/icon3.png') }}" alt="14 days returns" class="img-fluid" />
                                </div>
                                <h4>14 days returns</h4>
                                <p>Within 30 days exchanges</p>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 my-3">
                            <div class="feature_box">
                                <div class="feature_icon">
                                    <img src="{{ asset('assets/frontend/images/icon4.png') }}" alt="Money guarantee" class="img-fluid" />
                                </div>
                                <h4>Money guarantee</h4>
                                <p>100% money-back assurance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            

            <section class="product_sec overflow-hidden py-5">
                <div class="container">
                    <div class="cusheading_row pb-4">
                        <h2>Trending <b class="ffs">Products</b></h2>
                        <p>Grab the latest trending printers — preorder today and unlock exclusive deals & bonus gifts!</p>

                    </div>
                    <div class="product_slider new_arrival_slider common_slider">
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product1.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product1.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP OfficeJet Pro 9125e All-in-One Printer</a></h4>
                                    <div class="price">
                                        <del>$99.00</del>
                                        <ins>$89.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product2.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product2.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP OfficeJet Pro 8135e Wireless All-in-One Printer</a></h4>
                                    <div class="price">
                                        <del>$149.00</del>
                                        <ins>$129.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product3.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product3.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP OfficeJet Pro 9125e All-in-One Printer</a></h4>
                                    <div class="price">
                                        <del>$180.00</del>
                                        <ins>$109.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product4.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product5.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP Color LaserJet Pro MFP 3301fdw Wireless Printer</a></h4>
                                    <div class="price">
                                        <del>$70.00</del>
                                        <ins>$49.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product5.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product5.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Go to Wishlist"><i class="fa-solid fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP LaserJet Pro MFP 3101sdw Printer</a></h4>
                                    <div class="price">
                                        <del>$77.00</del>
                                        <ins>$47.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product6.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product6.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">(Renewed) HP DeskJet 4155e All-in-One Wireless Color Inkjet Printer</a></h4>
                                    <div class="price">
                                        <del>$80.00</del>
                                        <ins>$39.00</ins>
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
            </section>

            <section class="py-5 best-collections_sec">
                <div class="container">
                    <div class="row gx-lg-0 mb-4 mb-lg-0">
                        <div class="col-lg-6">
                            <div class="img_box">
                                <img src="{{ asset('assets/frontend/images/product_21.png') }}" alt="sustainability" class="img-fluid w-100" />
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="contentbox px-0 px-lg-5 pt-4 pt-lg-5 pb-5 m-lg-4">
                                <h5 class="subheading ffs text-theme">Sustainability</h5>
                                <h2>Supporting eco-friendly printing choices.</h2>
                                <p>As a trusted printer seller, we promote products that are energy-efficient, durable, and designed with lower environmental impact. By offering printers that use less power, support recycled cartridges, and reduce overall waste, we help customers choose smarter, more sustainable printing solutions.</p>
                                <div class="cusbtn pt-3">
                                    <a href="#" class="btn btn-dark px-5 py-3">Discover More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rotate_text d-none d-lg-block text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 120 120" class="tab-vertical__textcircle">
                            <defs><path d="M 60, 60 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0" id="txt-path"></path></defs>
                            <text><textPath startOffset="0" xlink:href="#txt-path"> VSIPL Trending Product</textPath></text>
                        </svg>
                    </div>
                    <div class="row gx-lg-0">
                        <div class="col-lg-6 order-lg-1">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="img_box">
                                        <img src="{{ asset('assets/frontend/images/best_collection_1.png') }}" alt="Spring Summer 24" class="img-fluid w-100" />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="img_box">
                                        <img src="{{ asset('assets/frontend/images/best_collection_2.png') }}" alt="Essentials" class="img-fluid w-100" />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                    <div class="img_box">
                                        <img src="{{ asset('assets/frontend/images/best_collection_3.png') }}" alt="Lookbook" class="img-fluid w-100" />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                                    <div class="img_box">
                                        <img src="{{ asset('assets/frontend/images/best_collection_4.png') }}" alt="Perfect Office Style" class="img-fluid w-100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="contentbox p-3 p-lg-5 ps-0 ps-lg-0 ms-0 ms-lg-0 m-3 m-lg-4">
                                <h5 class="subheading fw-normal text-dark pb-lg-3 text-uppercase text-theme"><small>Best Collections</small></h5>
                                <ul class="list-unstyled m-0" id="pills-tab" role="tablist">
                                    <li class="nav-item pb-2 pb-lg-4 mb-2" role="presentation">
                                        <h2 class="nav-link ffs active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><a href="javascript:void(0);">Officejet Printers</a></h2>
                                    </li>
                                    <li class="nav-item pb-2 pb-lg-4 mb-2" role="presentation">
                                        <h2 class="nav-link ffs" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><a href="javascript:void(0);">Envy Printers</a></h2>
                                    </li>
                                    <li class="nav-item pb-2 pb-lg-4 mb-2" role="presentation">
                                        <h2 class="nav-link ffs" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><a href="javascript:void(0);">Deskjet Printers</a></h2>
                                    </li>
                                    <li class="nav-item pb-2 pb-lg-4 mb-2" role="presentation">
                                        <h2 class="nav-link ffs" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" role="tab" aria-controls="pills-disabled" aria-selected="false"><a href="javascript:void(0);">Laserjet Printers</a></h2>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product_sec best-seller overflow-hidden py-5">
                <div class="container pb-lg-5">
                    <div class="cusheading_row pb-4">
                        <h2>Best <b class="ffs">Seller</b></h2>
                        <p>Shop our best-selling printers and enjoy exclusive offers on top models.</p>

                    </div>
                    <div class="product_slider best_seller_slider common_slider">
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product6.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product6.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">(Renewed) HP DeskJet 4155e All-in-One Wireless Color Inkjet Printer</a></h4>
                                    <div class="price">
                                        <del>$80.00</del>
                                        <ins>$39.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product1.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product1.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP OfficeJet Pro 9125e All-in-One Printer</a></h4>
                                    <div class="price">
                                        <del>$99.00</del>
                                        <ins>$89.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product4.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product5.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP Color LaserJet Pro MFP 3301fdw Wireless Printer</a></h4>
                                    <div class="price">
                                        <del>$70.00</del>
                                        <ins>$49.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product2.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product2.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP OfficeJet Pro 8135e Wireless All-in-One Printer</a></h4>
                                    <div class="price">
                                        <del>$149.00</del>
                                        <ins>$129.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product5.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product5.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Go to Wishlist"><i class="fa-solid fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP LaserJet Pro MFP 3101sdw Printer</a></h4>
                                    <div class="price">
                                        <del>$77.00</del>
                                        <ins>$47.00</ins>
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
                        <div>
                            <div class="product_box">
                                <a href="#" class="product_img">
                                    <img src="{{ asset('assets/frontend/images/product3.png') }}" alt="Product Name" class="img-fluid" />
                                    <img src="{{ asset('assets/frontend/images/product3.png') }}" alt="Product Name" class="img-fluid hover_img" />
                                    <div class="cart_btn">
                                        <button class="cusbtn cartbtn">Add to cart</button>
                                    </div>
                                </a>
                                <div class="product_meta">
                                    <div class="discount_percent">-50%</div>
                                    <div class="wishlist">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to Wishlist"><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h4><a href="#">HP OfficeJet Pro 9125e All-in-One Printer</a></h4>
                                    <div class="price">
                                        <del>$180.00</del>
                                        <ins>$109.00</ins>
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
            </section>

            <section class="subscribe_sec bg-light py-5">
                <div class="container py-lg-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 my-2">
                              <h3>Subscribe and get $5 off your next order!</h3>
                                <p>Get the latest deals, new printer launches, and exclusive promotions delivered to your inbox — plus enjoy savings on your next order.</p>
                                <p>*Valid once per customer. Terms apply.</p>
                            
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="subcribe_text">
                              
                                <form action="">
                                    <div class="form-group mb-3">
                                        <label for="name" class="d-none">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="d-none">Email Address</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="submitbtn">
                                        <button type="submit" class="btn btn-dark cusbtn w-100">Subscribe Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="sale_sec py-5">
                <div class="container py-lg-4">
                    <div class="row align-items-center">
                        <div class="col-lg-6 my-2">
                            <div class="sale_banner text-center">
                                <img src="{{ asset('assets/frontend/images/offer-banner.png') }}" alt="Offers" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="sale_content text-center">
                                <h5 class="subheading ffs text-theme">Super offer</h5>
                                <h2 class="text-uppercase py-2">Summer sale</h2>
                                <h4 class="pb-3">Up to 50% off</h4>
                                <p>Spend just $100 and get a 50% off voucher for your next printer or accessory purchase.</p>
                                <div class="cusbtn pt-4">
                                    <a href="#" class="btn btn-dark px-5 py-3">Discover More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="review_sec overflow-hidden py-5">
                <div class="container">
                    <div class="cusheading_row pb-4">
                        <h2>Customer <b class="ffs">Reviews</b></h2>
                    </div>
                    <div class="testimonial_slider common_slider">
                        <div>
                            <div class="review_box">
                                <!-- <a href="javascript:void(0);" class="review_img">
                                    <img src="{{ asset('assets/frontend/images/review-1.jpg') }}" alt="Review" class="img-fluid" />
                                </a> -->
                                <div class="review_content">
                                    <div class="review_content_inner">
                                        <span><i class="fa-solid fa-quote-left"></i></span>
                                        <p class="desc">Great experience! The printer works perfectly and the prices are unbeatable. Highly satisfied with my purchase.</p>
                                    </div>
                                    <div class="review_foot">
                                        <div>
                                            <h6 class="author-title">Selina morgan</h6>
                                            <p class="author-des">Interior designer</p>
                                        </div>
                                        <div>
                                            <div class="rating">
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-regular fa-star"></span>
                                            </div>
                                            <div>(5 review)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="review_box">
                                <!-- <a href="javascript:void(0);" class="review_img">
                                    <img src="{{ asset('assets/frontend/images/review-2.jpg') }}" alt="Review" class="img-fluid" />
                                </a> -->
                                <div class="review_content">
                                    <div class="review_content_inner">
                                        <span><i class="fa-solid fa-quote-left"></i></span>
                                        <p class="desc">Great experience! The printer works perfectly and the prices are unbeatable. Highly satisfied with my purchase.</p>
                                    </div>
                                    <div class="review_foot">
                                        <div>
                                            <h6 class="author-title">Mia thompson</h6>
                                            <p class="author-des">Customer product</p>
                                        </div>
                                        <div>
                                            <div class="rating">
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-regular fa-star"></span>
                                            </div>
                                            <div>(5 review)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="review_box">
                                <!-- <a href="javascript:void(0);" class="review_img">
                                    <img src="{{ asset('assets/frontend/images/review-1.jpg') }}" alt="Review" class="img-fluid" />
                                </a> -->
                                <div class="review_content">
                                    <div class="review_content_inner">
                                        <span><i class="fa-solid fa-quote-left"></i></span>
                                        <p class="desc">Great experience! The printer works perfectly and the prices are unbeatable. Highly satisfied with my purchase.</p>
                                    </div>
                                    <div class="review_foot">
                                        <div>
                                            <h6 class="author-title">Selina morgan</h6>
                                            <p class="author-des">Interior designer</p>
                                        </div>
                                        <div>
                                            <div class="rating">
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-regular fa-star"></span>
                                            </div>
                                            <div>(5 review)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="earn_sec py-4">
                <div class="container pb-lg-5">
                    <div class="cusheading_row text-center pb-4">
                        <h2>Ways to earn with <b class="">VSIPL</b></h2>
                    </div>
                    <div class="row">
                        <div class="col-6 col-xl-3 my-3">
                            <a href="javascript:void(0);" class="earn_box">
                                <div class="icon"><img src="{{ asset('assets/frontend/images/earn_icon1.svg') }}" alt="Network and seller Partner" class="img-fluid" /></div>
                                <h4>Network and seller Partner</h4>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3 my-3">
                            <a href="javascript:void(0);" class="earn_box">
                                <div class="icon"><img src="{{ asset('assets/frontend/images/earn_icon2.svg') }}" alt="Brand & vendor partner" class="img-fluid" /></div>
                                <h4>Brand & vendor partner</h4>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3 my-3">
                            <a href="javascript:void(0);" class="earn_box">
                                <div class="icon"><img src="{{ asset('assets/frontend/images/earn_icon3.svg') }}" alt="Digital content creator" class="img-fluid" /></div>
                                <h4>Digital content creator</h4>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3 my-3">
                            <a href="javascript:void(0);" class="earn_box">
                                <div class="icon"><img src="{{ asset('assets/frontend/images/earn_icon4.svg') }}" alt="Experience host & trainer" class="img-fluid" /></div>
                                <h4>Experience host & trainer</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>


@endsection