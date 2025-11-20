@extends('layouts.frontend.master')

@section('title', 'Wishlist')

@section('content')
<div class="bodyWrapper flex-grow-1">
    <section class="subheader py-5">
        <div class="container py-lg-5">
            <div class="row py-lg-4">
                <div class="col-md-6 text-white">
                    <h1>Wishlist</h1>
                    <p class="mb-0 fw-light">Your favorite products saved for later</p>
                </div>
                <div class="col-md-6 text-md-end text-white">
                    <div class="wishlist-summary">
                        <p class="mb-0">Items in wishlist: <strong id="wishlistCount">{{ count($wishlistItems) }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wishlist_sec py-5">
        <div class="container py-lg-5">
            @if(count($wishlistItems) > 0)
            <div class="row" id="wishlistItemsContainer">
                @foreach($wishlistItems as $item)
                <div class="col-sm-6 col-lg-4 col-xl-3 my-15" id="wishlistItem-{{ $item['product_id'] }}">
                    <div class="product_box" data-product-id="{{ $item['product_id'] }}">
                        <div class="product_img">
                            <a href="{{ route('product.show', $item['slug']) }}" >
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="img-fluid" />
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="img-fluid hover_img" />
                            </a>
                            <div class="cart_btn">
                                <button class="cusbtn cartbtn add-to-cart" 
                                        data-product-id="{{ $item['product_id'] }}"
                                        data-product-title="{{ $item['title'] }}"
                                        data-product-price="{{ $item['price'] }}"
                                        data-product-image="{{ $item['image'] }}"
                                        data-product-slug="{{ $item['slug'] }}">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                        <div class="product_meta">
                            @if(isset($item['sale_price']) && isset($item['regular_price']) && $item['sale_price'] < $item['regular_price'])
                                @php
                                    $discount = (($item['regular_price'] - $item['sale_price']) / $item['regular_price']) * 100;
                                @endphp
                                <div class="discount_percent">-{{ round($discount) }}%</div>
                            @endif
                            <div class="wishlist active">
                                <span class="remove-from-wishlist wishlist-toggle" 
                                      data-bs-toggle="tooltip" 
                                      data-bs-placement="top" 
                                      data-bs-custom-class="custom-tooltip" 
                                      data-bs-title="Remove From Wishlist"
                                      data-product-id="{{ $item['product_id'] }}"
                                      data-product-title="{{ $item['title'] }}">
                                    <i class="fa-solid fa-trash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="product_content">
                            <h4><a href="{{ route('product.show', $item['slug']) }}">{{ $item['title'] }}</a></h4>
                            <div class="price">
                                @if(isset($item['sale_price']) && isset($item['regular_price']) && $item['sale_price'] < $item['regular_price'])
                                    <del>₹{{ number_format($item['regular_price'], 2) }}</del>
                                    <ins>₹{{ number_format($item['sale_price'], 2) }}</ins>
                                @else
                                    <ins>₹{{ number_format($item['price'], 2) }}</ins>
                                @endif
                            </div>
                            <div class="rating">
                                <span class="fa-solid fa-star"></span>
                                <span class="fa-solid fa-star"></span>
                                <span class="fa-solid fa-star"></span>
                                <span class="fa-solid fa-star"></span>
                                <span class="fa-regular fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-wishlist text-center py-5">
                <div class="empty-icon mb-4">
                    <i class="fa fa-heart fa-4x text-muted"></i>
                </div>
                <h3 class="text-muted mb-3">Your wishlist is empty</h3>
                <p class="text-muted mb-4">You haven't added any products to your wishlist yet.</p>
                <a href="{{ route('shop') }}" class="btn btn-dark btn-lg">
                    <i class="fa fa-shopping-bag me-2"></i>Start Shopping
                </a>
            </div>
            @endif
        </div>
    </div>

    @if(count($wishlistItems) > 0)
    <div class="wishlist-actions py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{ route('shop') }}" class="btn btn-outline-dark me-3">
                        <i class="fa fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                    <button class="btn btn-danger" id="clear-wishlist">
                        <i class="fa fa-trash me-2"></i>Clear Wishlist
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <hr style="opacity: .1;">

    <section class="features_sec py-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon1.svg') }}" alt="Complimentary Shipping" class="img-fluid" />
                        </div>
                        <h4>Complimentary Shipping</h4>
                        <p>Free worldwide shipping and returns - customs and duties taxes included.</p>
                    </div>
                </div>
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon2.svg') }}" alt="Customer service" class="img-fluid" />
                        </div>
                        <h4>Customer service</h4>
                        <p>We are available from Monday-Friday to answer your questions.</p>
                    </div>
                </div>
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon3.svg') }}" alt="Secure payment" class="img-fluid" />
                        </div>
                        <h4>Secure payment</h4>
                        <p>Your payment information is processed securely.</p>
                    </div>
                </div>
                <div class="col-6 col-xl-3 my-3">
                    <div class="feature_box">
                        <div class="feature_icon">
                            <img src="{{ asset('assets/frontend/images/sicon4.svg') }}" alt="Contact us" class="img-fluid" />
                        </div>
                        <h4>Contact us</h4>
                        <p>Need to contact us? Send us an e-mail at support@proprintershop.us</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="toast-container position-fixed top-0 end-0 p-3"></div>

@endsection

@section('script')
<script src="{{ asset('assets/frontend/js/wishlist.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {


    // Clear entire wishlist
    document.getElementById('clear-wishlist')?.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear your entire wishlist?')) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            
            fetch('{{ route("wishlist.clear") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Clear the wishlist container
                    const container = document.getElementById('wishlistItemsContainer');
                    if (container) {
                        container.innerHTML = `
                            <div class="empty-wishlist text-center py-5">
                                <div class="empty-icon mb-4">
                                    <i class="fa fa-heart fa-4x text-muted"></i>
                                </div>
                                <h3 class="text-muted mb-3">Your wishlist is empty</h3>
                                <p class="text-muted mb-4">You haven't added any products to your wishlist yet.</p>
                                <a href="{{ route('shop') }}" class="btn btn-dark btn-lg">
                                    <i class="fa fa-shopping-bag me-2"></i>Start Shopping
                                </a>
                            </div>
                        `;
                    }
                    
                    // Remove wishlist actions
                    const actions = document.querySelector('.wishlist-actions');
                    if (actions) {
                        actions.remove();
                    }
                    
                    // Update count
                    document.getElementById('wishlistCount').textContent = '0';
                    if (window.wishlistManager) {
                        window.wishlistManager.updateWishlistCount(0);
                    }
                    
                    if (window.wishlistManager) {
                        window.wishlistManager.showWishlistToast(data.message, false);
                    }
                }
            })
            .catch(error => {
                console.error('Error clearing wishlist:', error);
                if (window.wishlistManager) {
                    window.wishlistManager.showWishlistToast('Failed to clear wishlist', false);
                }
            });
        }
    });

    // Add to cart from wishlist - ENHANCED VERSION
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = this.getAttribute('data-product-id');
            const productTitle = this.getAttribute('data-product-title');
            const productPrice = this.getAttribute('data-product-price');
            const productImage = this.getAttribute('data-product-image');
            const productSlug = this.getAttribute('data-product-slug');
            
            // console.log('Adding to cart from wishlist:', productId, productTitle);
            
            // Show loading state
            const originalText = this.textContent;
            this.textContent = 'Adding...';
            this.disabled = true;

            // Method 1: Use cart manager if available
            if (window.cartManager && typeof window.cartManager.addToCart === 'function') {
                // console.log('Using cart manager');
                window.cartManager.addToCart(productId, 1, {
                    title: productTitle,
                    price: productPrice,
                    image: productImage,
                    slug: productSlug
                });
                
                // Reset button after delay
                setTimeout(() => {
                    this.textContent = originalText;
                    this.disabled = false;
                }, 2000);
            } else {
                // Method 2: Direct API call as fallback
                // console.log('Using direct API call');
                addToCartDirect(productId, productTitle, this);
            }
        });
    });

    // Fallback function for adding to cart
    function addToCartDirect(productId, productTitle, button) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Show success message
                showCartToast('success', productTitle + ' has been added to your cart.', true);
                
                // Update cart count
                updateCartCount(data.cart_count);
            } else {
                throw new Error(data.message || 'Failed to add product to cart');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showCartToast('error', 'Failed to add product to cart');
        })
        .finally(() => {
            // Reset button
            button.textContent = 'Add to cart';
            button.disabled = false;
        });
    }

    function updateCartCount(count) {
        const cartCountElements = document.querySelectorAll('.cart-count, .header-cart .count, .cart-count-badge');
        cartCountElements.forEach(element => {
            if (element) {
                element.textContent = count;
                element.style.display = count > 0 ? 'inline' : 'none';
            }
        });
    }

    function showCartToast(type, message, showViewCart = false) {
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-bg-${type === 'success' ? 'success' : 'danger'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');
        
        let toastBody = '';
        if (showViewCart) {
            toastBody = `
                <div class="d-flex align-items-center">
                    <div class="toast-body flex-grow-1">
                        ${message}
                    </div>
                    <div class="me-2">
                        <a href="{{ route('cart.view') }}" class="btn btn-light btn-sm">View Cart</a>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;
        } else {
            toastBody = `
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;
        }
        
        toast.innerHTML = toastBody;
        
        let toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(toastContainer);
        }
        
        toastContainer.appendChild(toast);
        
        const bsToast = new bootstrap.Toast(toast, {
            autohide: true,
            delay: showViewCart ? 5000 : 3000
        });
        bsToast.show();
        
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    // Load initial cart count
    function loadCartCount() {
        fetch('{{ route("cart.data") }}', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            updateCartCount(data.cart_count);
        })
        .catch(error => {
            console.error('Error loading cart count:', error);
        });
    }

    // Load cart count on page load
    loadCartCount();
});
</script>
@endsection