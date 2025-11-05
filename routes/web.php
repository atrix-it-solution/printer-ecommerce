<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('pages.frontend.home');
});
Route::get('/about', function () {
    return view('pages.frontend.about');
});
Route::get('/contact', function () {
    return view('pages.frontend.contact');
});
Route::get('/services', function () {
    return view('pages.frontend.services');
});
Route::get('/blog', function () {
    return view('pages.frontend.blog');
});
Route::get('/blog-details', function () {
    return view('pages.frontend.blog-details');
});
Route::get('/portfolio', function () {
    return view('pages.frontend.portfolio');
});
Route::get('/portfolio-details', function () {
    return view('pages.frontend.portfolio-details');
});
Route::get('/team', function () {
    return view('pages.frontend.team');
});
Route::get('/faq', function () {
    return view('pages.frontend.faq');
});
Route::get('/pricing', function () {
    return view('pages.frontend.pricing');
});
Route::get('/testimonials', function () {
    return view('pages.frontend.testimonials');
});
Route::get('/terms', function () {
    return view('pages.frontend.terms');
});
Route::get('/privacy-policy', function () {
    return view('pages.frontend.privacy-policy');
});
Route::get('/login', function () {
    return view('pages.frontend.login');
});
Route::get('/register', function () {
    return view('pages.frontend.register');
});
Route::get('/shop', function () {
    return view('pages.frontend.shop');
});
Route::get('/category', function () {
    return view('pages.frontend.category');
});