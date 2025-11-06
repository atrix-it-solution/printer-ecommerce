<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboardSettings\SettingsController;
use App\Http\Controllers\media\MediaController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;


Route::get('/', function () {
    return view('pages.frontend.home');
});

Route::get('/about', function () {
    return view('pages.frontend.about');
});
Route::get('/blog', function () {
    return view('pages.frontend.blog');
});
Route::get('/cart', function () {
    return view('pages.frontend.cart');
});
Route::get('/category', function () {
    return view('pages.frontend.category');
});
Route::get('/checkout', function () {
    return view('pages.frontend.checkout');
});
Route::get('/contact', function () {
    return view('pages.frontend.contact');
});
Route::get('/edit-account', function () {
    return view('pages.frontend.edit-account');
});
Route::get('/edit-address', function () {
    return view('pages.frontend.edit-address');
});
Route::get('/faq', function () {
    return view('pages.frontend.faq');
});
Route::get('/forgot-password', function () {
    return view('pages.frontend.forgot-password');
});
Route::get('/login-register', function () {
    return view('pages.frontend.login-register');
});
Route::get('/my-account', function () {
    return view('pages.frontend.my-account');
});
Route::get('/orders', function () {
    return view('pages.frontend.orders');
});
Route::get('/privacy-policy', function () {
    return view('pages.frontend.privacy-policy');
});
Route::get('/shop', function () {
    return view('pages.frontend.shop');
});
Route::get('/single-blog', function () {
    return view('pages.frontend.single-blog');
});
Route::get('/terms-and-conditions', function () {
    return view('pages.frontend.terms-and-conditions');
});
Route::get('/view-order', function () {
    return view('pages.frontend.view-order');
});
Route::get('/wishlist', function () {
    return view('pages.frontend.wishlist');
});
Route::get('/billing-address', function () {
    return view('pages.frontend.billing-address');
});
Route::get('/shipping-address', function () {
    return view('pages.frontend.shipping-address');
});


// Dashboard Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/productcategories', ProductCategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    
    // Settings Routes with more descriptive names
    Route::get('/settings', [SettingsController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('dashboard.settings.update');
    Route::delete('/settings/remove-image/{type}', [SettingsController::class, 'removeImage'])->name('dashboard.settings.removeImage');
});
// Media API Routes - For the media manager (JSON responses)
Route::prefix('api')->group(function () {
    Route::get('/media', [MediaController::class, 'getImages'])->name('api.media.getImages');
    Route::post('/media/upload', [MediaController::class, 'store'])->name('api.media.store');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('api.media.destroy');
});

// Regular media management page routes (HTML responses)
Route::prefix('admin')->group(function () {
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::get('/media/{media}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/media/{media}', [MediaController::class, 'update'])->name('media.update');
});