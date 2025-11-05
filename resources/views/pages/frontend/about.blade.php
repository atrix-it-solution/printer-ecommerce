@extends('layouts.frontend.master')

@section('title', 'About')


@section('content')

<div class="bodyWrapper flex-grow-1">
            <section class="subheader py-5">
                <div class="container py-lg-5">
                    <div class="row py-lg-4">
                        <div class="col-md-6 text-white">
                            <h5 class="ffs mb-1 fw-light">about us</h5>
                            <h1>Our Story</h1>
                            <p class="mb-0 fw-light">Get to know our story of what values we provide and believe in</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about_sec py-5">
                <div class="container pt-lg-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="cusheading_row pb-3">
                                <h5 class="subheading ffs text-theme">it’s about your skin, but it’s also about you.</h5>
                                <h2>Advanced Science Of Care That <br class="d-none d-lg-block"> Uplifts And Inspires.</h2>
                            </div>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus fuga animi assumenda iusto voluptatibus, eaque maxime, enim ipsam a, et aut laudantium officiis consectetur fugit temporibus officia quisquam! Reiciendis, perferendis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dolor quae itaque repellat facere, dolorem, accusamus quo non rerum obcaecati, eos corrupti vero totam minima. Vel esse accusamus molestiae obcaecati.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil libero similique eveniet ullam temporibus saepe nisi illum obcaecati, veritatis repellat earum iusto incidunt consequuntur quasi! Modi, temporibus? Deleniti, quo dolorem?</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-5">
                <div class="container pb-lg-5">
                    <div class="row gx-lg-0 mb-4 mb-lg-0">
                        <div class="col-lg-6">
                            <div class="img_box">
                                <img src="{{ asset('assets/frontend/images/mission_img.webp') }}" alt="Our Mission" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="contentbox px-0 px-lg-5 pt-4 pt-lg-5 pb-5 m-lg-4">
                                <h5 class="subheading ffs text-theme">excited</h5>
                                <h2>Our Mission</h2>
                                <p>Sea Level Swim captures the essence of our Australian lifestyle through relaxed escapism, a celebration of form and function and sustainable ideas.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt blanditiis praesentium ad delectus? Rerum dolore aut dolorem quasi, corrupti ullam iusto quam accusamus magnam impedit aspernatur debitis est animi eaque?</p>
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
                            <div class="img_box">
                                <img src="{{ asset('assets/frontend/images/vision_img.jpg') }}" alt="Our Vision" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="contentbox p-3 p-lg-5 ps-0 ps-lg-0 ms-0 ms-lg-0 m-3 m-lg-4">
                                <h5 class="subheading ffs text-theme">excited</h5>
                                <h2>Our Vision</h2>
                                <p>Introducing the foundation of an essential holiday wardrobe: we are dedicated to creating the ultimate in form-flattering shape, enhancing confidence via innovative fit technology and the best in body sculpting design.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt blanditiis praesentium ad delectus? Rerum dolore aut dolorem quasi, corrupti ullam iusto quam accusamus magnam impedit aspernatur debitis est animi eaque?</p>                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="video_sec overflow-hidden">
                <video autoplay muted class="d-block">
                    <source src="images/about_video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </section>

            <section class="teamsec py-5">
                <div class="container py-lg-5">

                    <div class="cusheading_row text-center pb-4">
                        <h5 class="subheading mb-1 ffs text-theme">Who we are</h5>
                        <h2 class="">Meet our team</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 my-15">
                            <div class="team_box">
                                <a href="javascript:void(0);" class="team_img">
                                    <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="Team" class="img-fluid" />
                                </a>
                                <div class="team_content">
                                    <h4><a href="javascript:void(0);">Member Name</a></h4>
                                    <div class="designation mb-1 pb-2">Founder</div>
                                    <ul class="user_social list-unstyled gap-2 d-flex">
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 my-15">
                            <div class="team_box">
                                <a href="javascript:void(0);" class="team_img">
                                    <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="Team" class="img-fluid" />
                                </a>
                                <div class="team_content">
                                    <h4><a href="javascript:void(0);">Member Name</a></h4>
                                    <div class="designation mb-1 pb-2">Co-Founder</div>
                                    <ul class="user_social list-unstyled gap-2 d-flex">
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 my-15">
                            <div class="team_box">
                                <a href="javascript:void(0);" class="team_img">
                                    <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="Team" class="img-fluid" />
                                </a>
                                <div class="team_content">
                                    <h4><a href="javascript:void(0);">Member Name</a></h4>
                                    <div class="designation mb-1 pb-2">Chairman</div>
                                    <ul class="user_social list-unstyled gap-2 d-flex">
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 my-2">
                            <ul class="nav nav-pills sticky-top" id="aboutsec" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="founder-tab" data-bs-toggle="pill" data-bs-target="#founder" type="button" role="tab" aria-controls="founder" aria-selected="true">Founder</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="cofounder-tab" data-bs-toggle="pill" data-bs-target="#cofounder" type="button" role="tab" aria-controls="cofounder" aria-selected="false">Co-Founder</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Chairman-tab" data-bs-toggle="pill" data-bs-target="#Chairman" type="button" role="tab" aria-controls="Chairman" aria-selected="false">Chairman</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="president-tab" data-bs-toggle="pill" data-bs-target="#president" type="button" role="tab" aria-controls="president" aria-selected="false">President</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9 my-2">
                            <div class="tab-content" id="aboutsecContent">
                                <div class="tab-pane fade show active" id="founder" role="tabpanel" aria-labelledby="founder-tab" tabindex="0">
                                    <div class="team_content">
                                        <div class="team_img rounded-3 overflow-hidden position-relative">
                                            <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="Founder" class="img-fluid" />
                                            <h3>Member Name</h3>
                                        </div>
                                        <div class="team_desc">
                                            <h4>Founder</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cofounder" role="tabpanel" aria-labelledby="cofounder-tab" tabindex="0">
                                    <div class="team_content">
                                        <div class="team_img rounded-3 overflow-hidden position-relative">
                                            <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="Founder" class="img-fluid" />
                                            <h3>Member Name</h3>
                                        </div>
                                        <div class="team_desc">
                                            <h4>Co-Founder</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Chairman" role="tabpanel" aria-labelledby="Chairman-tab" tabindex="0">
                                    <div class="team_content">
                                        <div class="team_img rounded-3 overflow-hidden position-relative">
                                            <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="Chairman" class="img-fluid" />
                                            <h3>Member Name</h3>
                                        </div>
                                        <div class="team_desc">
                                            <h4>Chairman</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="president" role="tabpanel" aria-labelledby="president-tab" tabindex="0">
                                    <div class="team_content">
                                        <div class="team_img rounded-3 overflow-hidden position-relative">
                                            <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="president" class="img-fluid" />
                                            <h3>Member Name</h3>
                                        </div>
                                        <div class="team_desc">
                                            <h4>President</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima libero ab laboriosam, possimus quo facere rerum nesciunt id. Est quo illo earum quidem dignissimos ipsam cumque fuga. Unde, esse odit!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>

            <section class="subscribe_sec bg-light py-5">
                <div class="container py-lg-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 my-2">
                            <h2 class="text-center ffs text-theme">Subscribe</h2>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="subcribe_text">
                                <h3>Subscribe and get $5 off your next order!</h3>
                                <p>Simply subscribe to our newsletter to receive emails with the latest news and exclusive promotion details from Stella Beauty and get $5 off your next order.</p>
                                <p>*One per customer, minimum spend $40 & excludes sale items</p>
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
                                <p>Spend minimal $100 get 50% off voucher code for your next order.</p>
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
                                <a href="javascript:void(0);" class="review_img">
                                    <img src="{{ asset('assets/frontend/images/review-1.jpg') }}" alt="Review" class="img-fluid" />
                                </a>
                                <div class="review_content">
                                    <div class="review_content_inner">
                                        <span><i class="fa-solid fa-quote-left"></i></span>
                                        <p class="desc">I was sceptical at first, but wow! the material, the design, everything is amazing, I’ll definitely be ordering more!</p>
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
                                <a href="javascript:void(0);" class="review_img">
                                    <img src="{{ asset('assets/frontend/images/review-2.jpg') }}" alt="Review" class="img-fluid" />
                                </a>
                                <div class="review_content">
                                    <div class="review_content_inner">
                                        <span><i class="fa-solid fa-quote-left"></i></span>
                                        <p class="desc">Absolutely love this denim jacket! the fit is perfect, and it goes with everything, a must-have staple for every wardrobe!</p>
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
                                <a href="javascript:void(0);" class="review_img">
                                    <img src="{{ asset('assets/frontend/images/review-1.jpg') }}" alt="Review" class="img-fluid" />
                                </a>
                                <div class="review_content">
                                    <div class="review_content_inner">
                                        <span><i class="fa-solid fa-quote-left"></i></span>
                                        <p class="desc">I was sceptical at first, but wow! the material, the design, everything is amazing, I’ll definitely be ordering more!</p>
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
                        <h2>Ways to earn with <b class="ffs">vsipl</b></h2>
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

            <section class="email_sec bg-theme py-5">
                <div class="container py-lg-4">
                    <div class="cusheading_row text-center pb-4">
                        <h5 class="subheading text-white mb-1 fw-light ffs">Any questions?</h5>
                        <h2 class="text-white">Send us an <b class="text-white ffs">email</b></h2>
                    </div>
                    <div class="cusform">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control rounded-0" id="name" placeholder="Full Name">
                                        <label for="name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-floating">
                                        <input type="email" class="form-control rounded-0" id="email" placeholder="Email Address">
                                        <label for="email">Email address</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control rounded-0" id="phone" placeholder="Enter Phone Number">
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control rounded-0" id="subject" placeholder="Enter Subject">
                                        <label for="subject">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-12 my-3">
                                    <div class="form-floating">
                                        <textarea class="form-control rounded-0" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Comments</label>
                                    </div>
                                </div>
                                <div class="submit_btn text-center pt-2">
                                    <button type="submit" class="btn btn-dark py-3 px-5 text-uppercase rounded-0">Send Questions <i class="fa-solid fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </form>
                        <p class="text-center mb-0 pt-5">This site is protected by reCAPTCHA and the Google <a href="privacy-policy.html" class="text-decoration-underline">Privacy Policy</a> and <a href="terms-and-conditions.html" class="text-decoration-underline">Terms of Service</a> apply.</p>
                    </div>
                </div>
            </section>

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
                                <p>Need to contact us? Send us an e-mail at support@thevsipl.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</div>       
@endsection