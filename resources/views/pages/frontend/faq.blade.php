@extends('layouts.frontend.master')

@section('title', 'FAQ')

@section('content')
        <div class="bodyWrapper flex-grow-1">
            <section class="subheader py-5">
                <div class="container py-lg-5">
                    <div class="row py-lg-4">
                        <div class="col-md-6 text-white">
                            <h1>FAQ's</h1>
                            <p class="mb-0 fw-light">Get to know any questions of what values we provide and believe in</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="faq_sec py-5">
                <div class="container py-lg-5">
                    <div class="cusheading_row text-center pb-4">
                        <h5 class="subheading mb-1 text-theme fw-light ffs">Frequently Asked Questions</h5>
                        <h2 class="">Here are some common questions</h2>
                    </div>
                    <div class="row gx-lg-1 justify-content-between">
                        <div class="col-lg-5">
                            <div class="cusfaq">
                                <div class="accordion accordion-flush bg-transparent" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h5 class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">How long will shipping take?</h5>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">All orders are shipped within 12-36 hours from our warehouse in Bellingham WA.  Delivery times will depend on your shipping option but all orders are tracked from our facility to your door. </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">How do I know if my order is confirmed?</h5>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">This is an example of a response that you might give. It's good to be as thorough as possible in responses as that has a tendency to improve trust overall.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Can I change my shipping address after my order is placed?</h5>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">This is an example of a response that you might give. It's good to be as thorough as possible in responses as that has a tendency to improve trust overall.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="cusfaq">
                                <div class="accordion accordion-flush bg-transparent" id="accordionFlushExample1">
                                    <div class="accordion-item">
                                        <h5 class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">How long will shipping take?</h5>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body">All orders are shipped within 12-36 hours from our warehouse in Bellingham WA.  Delivery times will depend on your shipping option but all orders are tracked from our facility to your door. </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">How do I know if my order is confirmed?</h5>
                                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body">This is an example of a response that you might give. It's good to be as thorough as possible in responses as that has a tendency to improve trust overall.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">Can I change my shipping address after my order is placed?</h5>
                                        <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body">This is an example of a response that you might give. It's good to be as thorough as possible in responses as that has a tendency to improve trust overall.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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