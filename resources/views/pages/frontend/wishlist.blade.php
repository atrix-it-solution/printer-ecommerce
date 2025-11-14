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
                <div class="col-sm-6 col-lg-4 col-xl-3 my-15">
                    <div class="product_box" data-product-id="{{ $item['product_id'] }}">
                        <div class="product_img">
                            <a href="{{ route('product.show', $item['slug']) }}" >
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="img-fluid" />
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="img-fluid hover_img" />
                            </a>
                            <div class="cart_btn">
                                <button class="cusbtn cartbtn add-to-cart-from-wishlist" 
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
                                <span class="remove-from-wishlist" 
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
                        <p>Need to contact us? Send us an e-mail at support@printhelp.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="toast-container position-fixed top-0 end-0 p-3"></div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Remove from wishlist functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-from-wishlist')) {
            e.preventDefault();
            const icon = e.target.closest('.remove-from-wishlist');
            const productId = icon.getAttribute('data-product-id');
            const productTitle = icon.getAttribute('data-product-title');
            const productBox = icon.closest('.product_box');
            
            removeFromWishlist(productId, productTitle, productBox);
        }
    });

    // Add to cart from wishlist
    document.addEventListener('click', function(e) {
        if (e.target.closest('.add-to-cart-from-wishlist')) {
            e.preventDefault();
            const button = e.target.closest('.add-to-cart-from-wishlist');
            const productId = button.getAttribute('data-product-id');
            const productTitle = button.getAttribute('data-product-title');
            const productPrice = button.getAttribute('data-product-price');
            const productImage = button.getAttribute('data-product-image');
            const productSlug = button.getAttribute('data-product-slug');
            
            addToCartFromWishlist(productId, productTitle, productPrice, productImage, productSlug, button);
        }
    });

    // Clear entire wishlist
    document.getElementById('clear-wishlist')?.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear your entire wishlist? This action cannot be undone.')) {
            clearWishlist();
        }
    });

    async function removeFromWishlist(productId, productTitle, element) {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            const response = await fetch('{{ route("wishlist.remove") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    product_id: productId
                })
            });

            const data = await response.json();

            if (data.success) {
                // Add removal animation
                element.style.transition = 'all 0.3s ease';
                element.style.opacity = '0';
                element.style.transform = 'scale(0.8)';
                
                setTimeout(() => {
                    element.remove();
                    
                    // Update wishlist count
                    updateWishlistCount(data.wishlist_count);
                    
                    // Update header wishlist count if function exists
                    if (window.wishlistManager && typeof window.wishlistManager.updateWishlistCount === 'function') {
                        window.wishlistManager.updateWishlistCount(data.wishlist_count);
                    }
                    
                    // Check if wishlist is now empty
                    const remainingItems = document.querySelectorAll('.product_box');
                    if (remainingItems.length === 0) {
                        showEmptyWishlistState();
                    }
                    
                    // Show success message
                    showToast('success', `"${productTitle}" has been removed from your wishlist.`);
                }, 300);
                
            } else {
                throw new Error(data.message || 'Failed to remove from wishlist');
            }
        } catch (error) {
            console.error('Error:', error);
            showToast('error', 'Failed to remove item from wishlist. Please try again.');
        }
    }

    async function addToCartFromWishlist(productId, productTitle, productPrice, productImage, productSlug, button) {
        // Show loading state
        const originalText = button.textContent;
        button.textContent = 'Adding...';
        button.disabled = true;

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const response = await fetch('{{ route("cart.add") }}', {
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
            });

            const data = await response.json();

            if (data.success) {
                // Update cart count using cart manager if available
                if (window.cartManager && typeof window.cartManager.updateCartCount === 'function') {
                    window.cartManager.updateCartCount(data.cart_count);
                } else {
                    // Fallback: update cart count manually
                    updateCartCount(data.cart_count);
                }
                
                // Show success message
                showToast('success', `"${productTitle}" has been added to your cart!`, true);
                
                // Reset button after delay
                setTimeout(() => {
                    button.textContent = originalText;
                    button.disabled = false;
                }, 2000);
            } else {
                throw new Error(data.message || 'Failed to add product to cart');
            }
        } catch (error) {
            console.error('Error:', error);
            showToast('error', 'Failed to add product to cart. Please try again.');
            button.textContent = originalText;
            button.disabled = false;
        }
    }

    async function clearWishlist() {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Create a clear all endpoint or remove all items individually
            const wishlistItems = document.querySelectorAll('.product_box');
            const totalItems = wishlistItems.length;
            let removedCount = 0;
            
            // Show loading state
            const clearBtn = document.getElementById('clear-wishlist');
            const originalText = clearBtn.innerHTML;
            clearBtn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Clearing...';
            clearBtn.disabled = true;
            
            // Remove all items
            for (const item of wishlistItems) {
                const productId = item.getAttribute('data-product-id');
                
                try {
                    const response = await fetch('{{ route("wishlist.remove") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            product_id: productId
                        })
                    });
                    
                    const data = await response.json();
                    removedCount++;
                    
                    // Update progress
                    clearBtn.innerHTML = `<i class="fa fa-spinner fa-spin me-2"></i>Clearing... (${removedCount}/${totalItems})`;
                    
                    // Remove item with animation
                    item.style.transition = 'all 0.3s ease';
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    
                    setTimeout(() => {
                        item.remove();
                    }, 300);
                    
                } catch (error) {
                    console.error(`Error removing item ${productId}:`, error);
                }
            }
            
            // After all items are removed
            setTimeout(() => {
                // Update wishlist count to 0
                updateWishlistCount(0);
                
                // Update header wishlist count
                if (window.wishlistManager && typeof window.wishlistManager.updateWishlistCount === 'function') {
                    window.wishlistManager.updateWishlistCount(0);
                }
                
                // Show empty state
                showEmptyWishlistState();
                
                // Reset button
                clearBtn.innerHTML = originalText;
                clearBtn.disabled = false;
                
                // Hide the clear button and actions section
                document.querySelector('.wishlist-actions').style.display = 'none';
                
                showToast('success', 'Your wishlist has been cleared successfully.');
                
            }, 500);
            
        } catch (error) {
            console.error('Error clearing wishlist:', error);
            showToast('error', 'Failed to clear wishlist. Please try again.');
            
            // Reset button on error
            const clearBtn = document.getElementById('clear-wishlist');
            clearBtn.innerHTML = '<i class="fa fa-trash me-2"></i>Clear Wishlist';
            clearBtn.disabled = false;
        }
    }

    function updateWishlistCount(count) {
        // Update the wishlist count display
        const countElement = document.getElementById('wishlistCount');
        if (countElement) {
            countElement.textContent = count;
        }
        
        // Update any other wishlist count elements on the page
        document.querySelectorAll('.wishlist-count').forEach(element => {
            element.textContent = count;
        });
    }

    function updateCartCount(count) {
        // Update cart count in header
        const cartCountElements = document.querySelectorAll('.cart-count-badge, .header-cart .count, .cart-count');
        cartCountElements.forEach(element => {
            element.textContent = count;
            if (count > 0) {
                element.style.display = 'inline';
            } else {
                element.style.display = 'none';
            }
        });
    }

    function showEmptyWishlistState() {
        const container = document.querySelector('.wishlist_sec .container');
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

    function showToast(type, message, showViewCart = false) {
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-bg-${type === 'success' ? 'success' : 'danger'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');
        
        let toastBody = '';
        if (showViewCart) {
            toastBody = `
                <div class="d-flex align-items-center">
                    <div class="toast-body flex-grow-1 small">
                        ${message}
                    </div>
                    <div class="me-2">
                        <a href="{{ route('cart.view') }}" class="btn btn-light btn-sm small text-nowrap">View Cart</a>
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
        
        const toastContainer = document.getElementById('toastContainer');
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
});
</script>
@endsection