@extends('layouts.frontend.master')

@section('title', 'Blog')

@section('content')
        <div class="bodyWrapper flex-grow-1">
            <section class="subheader py-5">
                <div class="container py-lg-5">
                    <div class="row py-lg-4">
                        <div class="col-md-6 text-white">
                            <h1>Our Blog</h1>
                            <p class="mb-0 fw-light">Get to know any questions of what values we provide and believe in</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="blog_sec py-5">
                <div class="container py-lg-5">
                    <div class="row gx-lg-4">
                        <div class="col-md-6 col-lg-4 my-3">
                            <div class="blog_box h-100 d-flex flex-column overflow-hidden rounded-3 bg-white shadow-lg p-2 border">
                                <a href="single-blog" class="blog_img">
                                    <img src="{{ asset('assets/frontend/images/cat1.jpg') }}" alt="Blog" class="img-fluid h-100 w-100 object-fit-cover" />
                                </a>
                                <div class="blog_content flex-grow-1 d-flex flex-column p-3 px-2">
                                    <h4 class="fw-normal"><a href="single-blog">Blog Title</a></h4>
                                    <p class="pb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio perspiciatis quis dolorum, dolor maxime alias in quidem. Magni deleniti mollitia, ea cum fuga reprehenderit libero dolorum alias id culpa dolores.</p>
                                    <div class="readmore mt-auto">
                                        <a href="#" class="cusbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 my-3">
                            <div class="blog_box h-100 d-flex flex-column overflow-hidden rounded-3 bg-white shadow-lg p-2 border">
                                <a href="single-blog" class="blog_img">
                                    <img src="{{ asset('assets/frontend/images/cat1.jpg') }}" alt="Blog" class="img-fluid h-100 w-100 object-fit-cover" />
                                </a>
                                <div class="blog_content flex-grow-1 d-flex flex-column p-3 px-2">
                                    <h4 class="fw-normal"><a href="single-blog">Blog Title</a></h4>
                                    <p class="pb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio perspiciatis quis dolorum, dolor maxime alias in quidem. Magni deleniti mollitia.</p>
                                    <div class="readmore mt-auto">
                                        <a href="#" class="cusbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 my-3">
                            <div class="blog_box h-100 d-flex flex-column overflow-hidden rounded-3 bg-white shadow-lg p-2 border">
                                <a href="single-blog" class="blog_img">
                                    <img src="{{ asset('assets/frontend/images/cat1.jpg') }}" alt="Blog" class="img-fluid h-100 w-100 object-fit-cover" />
                                </a>
                                <div class="blog_content flex-grow-1 d-flex flex-column p-3 px-2">
                                    <h4 class="fw-normal"><a href="single-blog">Blog Title</a></h4>
                                    <p class="pb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio perspiciatis quis dolorum, dolor maxime alias in quidem. Magni deleniti mollitia.</p>
                                    <div class="readmore mt-auto">
                                        <a href="#" class="cusbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 my-3">
                            <div class="blog_box h-100 d-flex flex-column overflow-hidden rounded-3 bg-white shadow-lg p-2 border">
                                <a href="single-blog" class="blog_img">
                                    <img src="{{ asset('assets/frontend/images/cat1.jpg') }}" alt="Blog" class="img-fluid h-100 w-100 object-fit-cover" />
                                </a>
                                <div class="blog_content flex-grow-1 d-flex flex-column p-3 px-2">
                                    <h4 class="fw-normal"><a href="single-blog">Blog Title</a></h4>
                                    <p class="pb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio perspiciatis quis dolorum, dolor maxime alias in quidem. Magni deleniti mollitia, ea cum fuga reprehenderit libero dolorum alias id culpa dolores.</p>
                                    <div class="readmore mt-auto">
                                        <a href="#" class="cusbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 my-3">
                            <div class="blog_box h-100 d-flex flex-column overflow-hidden rounded-3 bg-white shadow-lg p-2 border">
                                <a href="single-blog" class="blog_img">
                                    <img src="{{ asset('assets/frontend/images/cat1.jpg') }}" alt="Blog" class="img-fluid h-100 w-100 object-fit-cover" />
                                </a>
                                <div class="blog_content flex-grow-1 d-flex flex-column p-3 px-2">
                                    <h4 class="fw-normal"><a href="single-blog">Blog Title</a></h4>
                                    <p class="pb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio perspiciatis quis dolorum, dolor maxime alias in quidem. Magni deleniti mollitia.</p>
                                    <div class="readmore mt-auto">
                                        <a href="#" class="cusbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 my-3">
                            <div class="blog_box h-100 d-flex flex-column overflow-hidden rounded-3 bg-white shadow-lg p-2 border">
                                <a href="single-blog" class="blog_img">
                                    <img src="{{ asset('assets/frontend/images/cat1.jpg') }}" alt="Blog" class="img-fluid h-100 w-100 object-fit-cover" />
                                </a>
                                <div class="blog_content flex-grow-1 d-flex flex-column p-3 px-2">
                                    <h4 class="fw-normal"><a href="single-blog">Blog Title</a></h4>
                                    <p class="pb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio perspiciatis quis dolorum, dolor maxime alias in quidem. Magni deleniti mollitia.</p>
                                    <div class="readmore mt-auto">
                                        <a href="#" class="cusbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="pagination cuspagination mt-4 pt-4 gap-1 justify-content-center">
                        <li class="disabled"><a href="#"><i class="fa-solid fa-arrow-left"></i></a></li>
                        <li class="page_item active"><a href="#">1</a></li>
                        <li class="page_item"><a href="#">2</a></li>
                        <li class="page_item"><a href="#">3</a></li>
                        <li class="page_item dots"><span>...</span></li>
                        <li class="page_item"><a href="#">7</a></li>
                        <li class="page_item"><a href="#">8</a></li>
                        <li><a href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>


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
                                <p>Need to contact us? Send us an e-mail at support@printer.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection