@extends('layouts.frontend.master')

@section('title', 'Edit Account')

@section('content')
<div class="bodyWrapper flex-grow-1">
    @include('partials.subheader-myaccount')

    <section class="myaccount_sec py-5">
        <div class="container">
            <div class="row gx-lg-5">
                @include('partials.my-account-sidebar')
                <div class="col-lg-9 my-2">
                    <div class="account_right_side">
                        <div class="profile_page">
                            <h2 class="acc_heading pb-3">Edit Profile</h2>
                            
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
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

                            <div class="account_form">
                                <form action="{{ route('my-account.update') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" name="name" id="name" 
                                                   value="{{ old('name', $user->name) }}" placeholder="Full Name" required>
                                        </div>
                                        
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="displayname">Display Name</label>
                                            <input type="text" class="form-control" name="displayname" id="displayname" 
                                                   value="{{ old('displayname', $user->display_name) }}" placeholder="Display Name">
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" 
                                                   value="{{ $user->email }}" readonly>
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="phonenumber">Phone Number</label>
                                            <input type="text" class="form-control" name="phonenumber" id="phonenumber" 
                                                   value="{{ old('phonenumber', $user->phone) }}" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">
                                            <label for="dob">DOB</label>
                                            <input type="date" class="form-control" name="dob" id="dob" 
                                                   value="{{ old('dob', $user->date_of_birth) }}">
                                        </div>
                                        <div class="form-group col-lg-6 mb-3 pb-2">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ (old('gender', $user->gender) == 'Male') ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ (old('gender', $user->gender) == 'Female') ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ (old('gender', $user->gender) == 'Other') ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>

                                        <legend class="fs-6 col-lg-12 text-uppercase opacity-75">Password Change</legend>
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="cpassword">Current Password (Leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control" name="current_password" id="cpassword" placeholder="Current Password">
                                        </div>
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="new_password">New Password (Leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                        </div>
                                        <div class="form-group col-lg-12 mb-3">
                                            <label for="confirm_new_password">Confirm New Password</label>
                                            <input type="password" class="form-control" name="new_password_confirmation" id="confirm_new_password" placeholder="Confirm New Password">
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value="Subscribe to our Newsletter" id="newsletter" name="newsletter" 
                                                       {{ (old('newsletter', $user->newsletter_subscription ? 'Subscribe to our Newsletter' : '') == 'Subscribe to our Newsletter') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="newsletter">Subscribe to our Newsletter</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value="Unsubscribe from our Newsletter" id="unsub_newsletter" name="newsletter" 
                                                       {{ (old('newsletter', $user->newsletter_subscription ? 'Unsubscribe from our Newsletter' : '') == 'Unsubscribe from our Newsletter') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="unsub_newsletter">Unsubscribe from our Newsletter</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value="Receive Order Updates" id="receive_order" name="newsletter" 
                                                       {{ (old('newsletter', $user->receive_order_updates ? 'Receive Order Updates' : '') == 'Receive Order Updates') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="receive_order">Receive Order Updates</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit_btn pt-4">
                                        <button type="submit" class="btn btn-dark py-3 text-uppercase px-5">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.features_sec')
</div>
@endsection