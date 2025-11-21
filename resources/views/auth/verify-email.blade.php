@extends('layouts.frontend.master')

@section('title', 'Verify Email')

@section('content')
<div class="bodyWrapper flex-grow-1">
    <section class="subheader py-5">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-md-6 text-white">
                    <h1>Verify Your Email</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="verification-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body p-5 text-center">
                            <div class="verification-icon mb-4">
                                <i class="fa-solid fa-envelope-circle-check text-primary" style="font-size: 80px;"></i>
                            </div>
                            
                            <h2 class="mb-3">Verify Your Email Address</h2>
                            
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    A new verification link has been sent to your email address.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <p class="text-muted mb-4">
                                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                            </p>

                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-paper-plane me-2"></i>Resend Verification Email
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection