<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboardSettings\SettingsController;
use App\Http\Controllers\media\MediaController;



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
Route::get('/terms-and-conditions', function () {
    return view('pages.frontend.terms-and-conditions');
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



// Dashboard Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
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