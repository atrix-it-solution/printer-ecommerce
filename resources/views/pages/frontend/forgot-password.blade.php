@extends('layouts.frontend.master')

@section('title', 'Forgot Password')

@section('content')
<div class="bodyWrapper flex-grow-1 login-register-page">
    <!-- ========== Start Page heading ========== -->
    <section class="subheader py-5" style="background-image: url('/assets/frontend/images/account_bg.jpg');">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-md-6 text-white">
                    <h1 class="text-dark">Forgot your password?</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Page heading ========== -->

    <!-- ========== Start Forgot Password - Step 1: Email ========== -->
    <section class="login-register-area section-space my-5" id="emailSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-register-content w-75 mx-auto py-5">
                        <div class="login-register-title mb-30">
                            <h2>Reset Password</h2>
                            <p>Enter your email address to receive an OTP for password reset.</p>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif


                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="cusform">
                            <form method="POST" action="{{ route('password.email') }}" id="emailForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <div class="form-floating">
                                            <input type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" 
                                                   id="email" name="email" placeholder="Email Address" 
                                                   value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email">Email address</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 my-2 d-flex justify-content-between">
                                        <a href="/login-register" class="text-decoration-underline">Back to Login</a>
                                    </div>
                                    <div class="submit_btn pt-3">
                                        <button type="submit" class="btn btn-dark py-3 px-5 text-uppercase rounded-0">
                                            Send OTP <i class="fa-solid fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Forgot Password - Step 1 ========== -->

    <!-- ========== Start OTP Verification - Step 2: OTP ========== -->
    <section class="login-register-area section-space my-5 d-none" id="otpSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-register-content w-75 mx-auto py-5">
                        <div class="login-register-title mb-30">
                            <h2>Enter OTP</h2>
                            <p>We've sent a 4-digit OTP to your email. Please enter it below.</p>
                            <!-- <div class="alert alert-info">
                                <small><i class="fa-solid fa-clock me-1"></i> OTP will expire in: <span id="otpTimer">10:00</span></small>
                            </div> -->
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="cusform">
                            <form method="POST" action="{{ route('password.verify.otp') }}" id="otpForm">
                                @csrf
                                <input type="hidden" name="email" id="otpEmail" value="{{ session('email') }}">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="d-flex justify-content-between gap-2">
                                            <input type="text" class="form-control rounded-0 text-center otp-input" 
                                                   name="otp1" maxlength="1" required autocomplete="off" pattern="[0-9]">
                                            <input type="text" class="form-control rounded-0 text-center otp-input" 
                                                   name="otp2" maxlength="1" required autocomplete="off" pattern="[0-9]">
                                            <input type="text" class="form-control rounded-0 text-center otp-input" 
                                                   name="otp3" maxlength="1" required autocomplete="off" pattern="[0-9]">
                                            <input type="text" class="form-control rounded-0 text-center otp-input" 
                                                   name="otp4" maxlength="1" required autocomplete="off" pattern="[0-9]">
                                        </div>
                                        <div class="text-center mt-2">
                                            <small class="text-muted" id="resendOtp">
                                                Didn't receive OTP? 
                                                <a href="javascript:void(0)" onclick="resendOTP()" id="resendLink" class="cursor-pointer">Resend</a>
                                                <span id="resendTimer" class="text-danger"></span>
                                            </small>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 my-2 d-flex justify-content-between">
                                        <a href="javascript:void(0)" onclick="showEmailSection()" class="text-decoration-underline">Back to Email</a>
                                    </div>
                                    <div class="submit_btn pt-3">
                                        <button type="submit" class="btn btn-dark py-3 px-5 text-uppercase rounded-0">
                                            Verify OTP <i class="fa-solid fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End OTP Verification - Step 2 ========== -->

    <!-- ========== Start Reset Password - Step 3: New Password ========== -->
    <section class="login-register-area section-space my-5 d-none" id="passwordSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-register-content w-75 mx-auto py-5">
                        <div class="login-register-title mb-30">
                            <h2>Enter New Password</h2>
                            <p>Create your new password. Make sure it's strong and secure.</p>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="cusform">
                            <form method="POST" action="{{ route('password.update') }}" id="passwordForm">
                                @csrf
                                <input type="hidden" name="email" id="passwordEmail" value="{{ session('email') }}">
                                <input type="hidden" name="token" id="passwordToken" value="{{ session('token') }}">
                                
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <div class="form-floating">
                                            <input type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" 
                                                   id="new_password" name="password" placeholder="New Password" 
                                                   required autocomplete="new-password">
                                            <label for="new_password">New Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-floating">
                                            <input type="password" class="form-control rounded-0 @error('password_confirmation') is-invalid @enderror" 
                                                   id="confirm_password" name="password_confirmation" 
                                                   placeholder="Confirm Password" required autocomplete="new-password">
                                            <label for="confirm_password">Confirm Password</label>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="submit_btn pt-3">
                                        <button type="submit" class="btn btn-dark py-3 px-5 text-uppercase rounded-0">
                                            Reset Password <i class="fa-solid fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Reset Password - Step 3 ========== -->
</div>

<script>
    // Pass PHP session data to JavaScript
    const otpSentEmail = @json(session('otp_sent') ? session('email') : null);
    const otpVerifiedEmail = @json(session('otp_verified') ? session('email') : null);
    const otpVerifiedToken = @json(session('otp_verified') ? session('token') : null);
    const resendOtpUrl = @json(route('password.resend.otp'));

    
</script>
@endsection

@section('script')
<script src="{{ asset('assets/frontend/js/forgot-password.js') }}"></script>
@endsection