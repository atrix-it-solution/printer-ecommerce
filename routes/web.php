<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboardSettings\SettingsController;
use App\Http\Controllers\media\MediaController;

use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;

use App\Http\Controllers\Blog\BlogCategoryController;
use App\Http\Controllers\Blog\BlogController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\MyAccountController;
use App\Http\Controllers\Frontend\UserProfileController;

use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\authentications\RegisterController;
use App\Http\Controllers\authentications\LoginRegisterController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ForgotPasswordController;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

// Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');


// Authentication Routes - ADD THESE GET ROUTES
Route::get('/login-register', [LoginRegisterController::class, 'index'])->name('login.register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/email/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('verification.verify');

// Protected routes - require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [MyAccountController::class, 'index'])->name('my-account');
    Route::get('/edit-account', [MyAccountController::class, 'accountDetails'])->name('edit-account');
    // Order Routes
    Route::get('/orders/success/{order}', [OrderController::class, 'success'])->name('order.success');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    // Route::get('/orders', [MyAccountController::class, 'orders'])->name('orders');

    // Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

    Route::get('/address', [AddressController::class, 'index'])->name('address.index');
    Route::get('/address/billing', [AddressController::class, 'editBilling'])->name('address.billing');
    Route::post('/address/billing', [AddressController::class, 'updateBilling'])->name('address.billing.update');
    Route::get('/address/shipping', [AddressController::class, 'editShipping'])->name('address.shipping');
    Route::post('/address/shipping', [AddressController::class, 'updateShipping'])->name('address.shipping.update');

    Route::get('/my-account/edit', [UserProfileController::class, 'edit'])->name('my-account.edit');
    Route::post('/my-account/update', [UserProfileController::class, 'update'])->name('my-account.update');

    Route::get('/orders/{order}/invoice/download', [InvoiceController::class, 'download'])->name('orders.invoice.download');
    Route::get('/orders/{order}/invoice/view', [InvoiceController::class, 'view'])->name('orders.invoice.view');

Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist.view');

});

// Cart Routes
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/count', [CartController::class, 'getCartData'])->name('cart.data');
Route::get('/cart/data', [CartController::class, 'getCartData'])->name('cart.data');

// Wishlist Routes
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::post('/wishlist/clear', [WishlistController::class, 'clearWishlist'])->name('wishlist.clear');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggleWishlist'])->name('wishlist.toggle');
Route::get('/wishlist/count', [WishlistController::class, 'getWishlistData'])->name('wishlist.data');
Route::post('/wishlist/check', [WishlistController::class, 'checkWishlist'])->name('wishlist.check');

// Password Reset Routes with OTP
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP'])->name('password.verify.otp');
Route::post('/resend-otp', [ForgotPasswordController::class, 'resendOTP'])->name('password.resend.otp');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');


// Route::get('billing-address', function () {
//     return view('pages.frontend.billing-address');
// });
// Route::get('shipping-address', function () {
//     return view('pages.frontend.shipping-address');
// });

// Coupon Routes
Route::post('/coupon/apply', [CouponController::class, 'applyCoupon'])->name('coupon.apply');
Route::post('/coupon/remove', [CouponController::class, 'removeCoupon'])->name('coupon.remove');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search-results', [SearchController::class, 'searchResults'])->name('search.results');

Route::get('/blog', [BlogController::class, 'frontendIndex'])->name('frontend.blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'frontendShow'])->name('frontend.blog.single');

// Invoice routes


Route::get('/about', function () {
    return view('pages.frontend.about');
});

Route::get('/team', function () {
    return view('pages.frontend.team');
});
Route::get('pricing', function () {
    return view('pages.frontend.pricing');
});
Route::get('testimonials', function () {
    return view('pages.frontend.testimonials');
});
Route::get('terms', function () {
    return view('pages.frontend.terms');
});
Route::get('privacy-policy', function () {
    return view('pages.frontend.privacy-policy');
});
Route::get('terms-and-conditions', function () {
    return view('pages.frontend.terms-and-conditions');
});



Route::get('contact', function () {
    return view('pages.frontend.contact');
});


Route::get('faq', function () {
    return view('pages.frontend.faq');
});




Route::get('privacy-policy', function () {
    return view('pages.frontend.privacy-policy');
});


Route::get('terms-and-conditions', function () {
    return view('pages.frontend.terms-and-conditions');
});





Route::get('/login', function () {
    return redirect('/login-register');
});

Route::get('/register', function () {
    return redirect('/login-register');
});
// Dashboard Routes
Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/productcategories', ProductCategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/blogcategories', BlogCategoryController::class);
    Route::resource('/blogs', BlogController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    
    // Settings Routes with more descriptive names
    Route::get('/settings', [SettingsController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('dashboard.settings.update');
    Route::delete('/settings/remove-image/{type}', [SettingsController::class, 'removeImage'])->name('dashboard.settings.removeImage');
});
// Media API Routes - For the media manager (JSON responses)
Route::prefix('api')->middleware(['auth'])->group(function () {
    Route::get('/media', [MediaController::class, 'getImages'])->name('api.media.getImages');
    Route::post('/media/upload', [MediaController::class, 'store'])->name('api.media.store');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('api.media.destroy');
});

// Regular media management page routes (HTML responses)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::get('/media/{media}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/media/{media}', [MediaController::class, 'update'])->name('media.update');
});

