@extends('layouts.frontend.master')

@section('title', 'Contact Us')

@section('content')
        <div class="bodyWrapper flex-grow-1 login-register-page">
            <!-- ========== Start Page heading ========== -->
            <section class="subheader py-5" style="background-image: url('/assets/frontend/images/account_bg.jpg');">
                <div class="container py-lg-5">
                    <div class="row">
                        <div class="col-md-6 text-white">
                            <h1 class="text-dark">Login/Register</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ========== End Page heading ========== -->

            <!-- ========== Start Login Register ========== -->
            <section class="login-register-area section-space my-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 login-register-border">
                            <div class="login-register-content w-75 mx-auto py-5">
                                <div class="login-register-title mb-30">
                                    <h2>Login</h2>
                                    <p>Welcome back! Please enter your username and password to login.</p>
                                </div>
                                <div class="cusform">
                                    <form action="">
                                        <div class="row">
                                            
                                            <div class="col-md-12 my-2">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control rounded-0" id="email" placeholder="Email Address">
                                                    <label for="email">Email address</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-2">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control rounded-0" id="password" placeholder="Enter Password">
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-2 d-flex justify-content-between">
                                                    <div class="remember-me-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                    </div>
                                                    <a href="/forgot-password" class=" text-decoration-underline">Forgot your password?</a>
                                            </div>
                                           
                                           
                                            <div class="submit_btn pt-3">
                                                <button type="submit" class="btn btn-dark py-3 px-5 text-uppercase rounded-0">Login<i class="fa-solid fa-arrow-right ms-2"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-register-content w-75 mx-auto py-5">
                                    <div class="login-register-title mb-30">
                                        <h2>Register</h2>
                                        <p>Create new account today to reap the benefits of a personalized shopping experience. </p>
                                    </div>
                                
                                    <div class="cusform">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-12 my-2">
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
                                                <div class="col-md-12 my-2">
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control rounded-0" id="user-password" placeholder="Password">
                                                        <label for="user-password">Password</label>
                                                    </div>
                                                </div>
                                               <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a class=" text-primary" href="/privacy-policy">privacy policy.</a></p>
                                                <div class="submit_btn  pt-3">
                                                    <button type="submit" class="btn btn-dark py-3 px-5 text-uppercase rounded-0">Register <i class="fa-solid fa-arrow-right ms-2"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ========== End Login Register ========== -->
        </div>
        @endsection