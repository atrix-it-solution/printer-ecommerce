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
                                    <div class="account_form">
                                        <form action="">
                                            <div class="row">
                                                <div class="form-group col-lg-6 mb-3">
                                                    <label for="fname">First Name</label>
                                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="" value="Rajat">
                                                </div>
                                                <div class="form-group col-lg-6 mb-3">
                                                    <label for="lname">Last Name</label>
                                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="" value="Bansal">
                                                </div>
                                                <div class="form-group col-lg-12 mb-3">
                                                    <label for="displayname">Display Name</label>
                                                    <input type="text" class="form-control" name="displayname" id="displayname" placeholder="" value="Rajat">
                                                </div>
                                                <div class="form-group col-lg-6 mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="" value="rk891811@gmail.com" readonly="">
                                                </div>
                                                <div class="form-group col-lg-6 mb-3">
                                                    <label for="phonenumber">Phone Number</label>
                                                    <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="" value="+91-98765-43210">
                                                </div>
                                                <div class="form-group col-lg-6 mb-3">
                                                    <label for="dob">DOB</label>
                                                    <input type="date" class="form-control" name="dob" id="dob" placeholder="" value="">
                                                </div>
                                                <div class="form-group col-lg-6 mb-3 pb-2">
                                                    <label for="gender">Gender</label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>

                                                <legend class="fs-6 col-lg-12 text-uppercase opacity-75">Password Change</legend>
                                                <div class="form-group col-lg-12 mb-3">
                                                    <label for="cpassword">Current Password (Leace blank to leave unchanged)</label>
                                                    <input type="password" class="form-control" name="current_password" id="cpassword" placeholder="" value="">
                                                </div>
                                                <div class="form-group col-lg-12 mb-3">
                                                    <label for="new_password">New Password (Leace blank to leave unchanged)</label>
                                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="" value="">
                                                </div>
                                                <div class="form-group col-lg-12 mb-3">
                                                    <label for="confirm_new_password">Confirm New Password</label>
                                                    <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="" value="">
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" value="Subscribe to our Newsletter" id="newsletter" name="newsletter" required="">
                                                        <label class="form-check-label" for="newsletter">Subscribe to our Newsletter</label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" value="Unsubscribe from our Newsletter" id="unsub_newsletter" name="newsletter" required="">
                                                        <label class="form-check-label" for="unsub_newsletter">Unsubscribe from our Newsletter</label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" value="Receive Order Updates" id="receive_order" name="newsletter" required="">
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