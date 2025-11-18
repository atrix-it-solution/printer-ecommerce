@extends('layouts.frontend.master')

@section('title', 'Account')

@section('content')
        <div class="bodyWrapper flex-grow-1">
           @include('partials.subheader-myaccount')

            <section class="myaccount_sec py-5">
                <div class="container">
                    <div class="row gx-lg-5">
                       @include('partials.my-account-sidebar')
                        <div class="col-lg-9 my-2">
                            <div class="account_right_side">
                                <div class="dashboard_page">
                                    <p>Hello <strong class="username">{{ $user->name }}</strong> (not <strong class="username">{{ $user->name }}</strong>? <a href="#" class="text-decoration-underline">Log out</a>)</p>
                                    <p>From your account dashboard you can view your <a href="#" class="text-decoration-underline">recent orders</a>, manage your <a href="#" class="text-decoration-underline">shipping and billing addresses</a>, and <a href="#" class="text-decoration-underline">edit your password and account details.</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

    @include('partials.features_sec')

        </div>
@endsection 