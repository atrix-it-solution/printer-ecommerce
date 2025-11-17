// Wishlist functionality
class WishlistManager {
    constructor() {
        this.initialized = false;
        this.routes = {
            toggle: '',
            check: '',
            data: ''
        };
        this.getRoutes();
    }

    getRoutes() {
        const routeElement = document.getElementById('app-routes');
        if (routeElement) {
            this.routes = {
                toggle: routeElement.dataset.wishlistToggle || '',
                check: routeElement.dataset.wishlistCheck || '',
                data: routeElement.dataset.wishlistData || ''
            };
        }
    }

    init() {
        if (this.initialized) return;
        
        this.initializeWishlistIcons();
        this.loadWishlistCount();
        this.initialized = true;
    }

  initializeWishlistIcons() {
    // Use event delegation instead of individual event listeners
    document.addEventListener('click', (e) => {
        let icon = e.target.closest('.wishlist-toggle'); // Change const to let

        if (!icon) {
            icon = e.target.closest('.remove-from-wishlist');
        }

        if (icon) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = icon.getAttribute('data-product-id');
            const productTitle = icon.getAttribute('data-product-title');
            
            this.toggleWishlist(productId, productTitle, icon);
        }
    });

    // Initialize tooltips for all wishlist icons
    const wishlistIcons = document.querySelectorAll('.wishlist-toggle, .remove-from-wishlist');
    wishlistIcons.forEach(icon => {
        const productId = icon.getAttribute('data-product-id');
        this.checkWishlistState(productId, icon);
    });
}
    
    toggleWishlist(productId, productTitle, icon) {
    if (!icon || !this.routes.toggle) {
        // console.error('Wishlist icon element not found or route not defined');
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    // console.log('Toggling wishlist for product:', productId);

    fetch(this.routes.toggle, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => {
        // console.log('Response status:', response.status);
        
        if (response.status === 401) {
            // User not authenticated, redirect to login
            return response.json().then(data => {
                if (data.redirect) {
                    this.redirectToLogin(data.login_url, productId);
                    
                }
                throw new Error(data.message);
            });
        }
        
        if (!response.ok) {
            // Get more detailed error information
            return response.text().then(text => {
                console.error('Server response:', text);
                throw new Error(`Server error: ${response.status} ${response.statusText}`);
            });
        }
        return response.json();
    })
    .then(data => {
        // console.log('Toggle response:', data);
        
        if (data.success) {
            const isOnWishlistPage = window.location.pathname.includes('wishlist');
                
                if (isOnWishlistPage && !data.is_in_wishlist) {
                    // On wishlist page and item was removed - remove from DOM
                    this.removeFromWishlist(productId, productTitle, icon);
                } else {
                    this.updateAllWishlistIcons(productId, data.is_in_wishlist);
                    this.updateWishlistCount(data.wishlist_count);
                    this.showWishlistToast(data.message, data.is_in_wishlist);
                }
        } else {
            throw new Error(data.message || 'Failed to update wishlist');
        }
    })
    .catch(error => {
        // console.error('Toggle wishlist error:', error);
        if (!error.message.includes('redirect')) {
            this.showWishlistToast('Failed to update wishlist: ' + error.message, false);
        }
    });
}

    redirectToLogin(loginUrl, productId) {
        // Store the product ID in sessionStorage to add to wishlist after login
        sessionStorage.setItem('pending_wishlist_product', productId);
        
        // Show confirmation message
        // if (confirm('Please login to add items to your wishlist. Redirect to login page?')) {
        //     window.location.href = loginUrl;
        // }
    }

    // Check for pending wishlist items after page load
    checkPendingWishlist() {
        const pendingProductId = sessionStorage.getItem('pending_wishlist_product');
        if (pendingProductId && this.isUserLoggedIn()) {
            // User just logged in, add the pending product to wishlist
            this.addPendingWishlistItem(pendingProductId);
            sessionStorage.removeItem('pending_wishlist_product');
        }
    }

    isUserLoggedIn() {
        // Check if user is logged in (you might need to adjust this based on your auth system)
        return document.querySelector('meta[name="user-authenticated"]')?.getAttribute('content') === 'true';
    }

    addPendingWishlistItem(productId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        fetch(this.routes.toggle, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.updateAllWishlistIcons(productId, data.is_in_wishlist);
                this.updateWishlistCount(data.wishlist_count);
                this.showWishlistToast('Product added to your wishlist!', true);
            }
        })
        .catch(error => {
            console.error('Error adding pending wishlist item:', error);
        });
    }

    init() {
        if (this.initialized) return;
        
        this.initializeWishlistIcons();
        this.loadWishlistCount();
        this.checkPendingWishlist(); // Check for pending items
        this.initialized = true;
    }


    updateAllWishlistIcons(productId, isInWishlist) {
        // Find ALL icons for this product across the page
        const allIcons = document.querySelectorAll(`
            .wishlist-toggle[data-product-id="${productId}"],
            .remove-from-wishlist[data-product-id="${productId}"]
        `);
        
        allIcons.forEach(icon => {
            this.updateWishlistIcon(icon, isInWishlist);
            this.updateWishlistTooltip(icon, isInWishlist);
        });
    }

   updateWishlistIcon(icon, isInWishlist) {
        if (!icon) return;

        // For wishlist page, we use trash icon, so don't change it
        if (icon.classList.contains('remove-from-wishlist')) {
            return; // Keep the trash icon as is
        }   
        
        // Get the SVG element or the icon element
        const heartSvg = icon.querySelector('svg');
        const heartIcon = heartSvg || icon.querySelector('i');
        
        if (!heartIcon) {
            console.warn('No heart icon found in element:', icon);
            return;
        }

        if (isInWishlist) {
            if (heartIcon.tagName === 'svg') {
                heartIcon.setAttribute('class', 'svg-inline--fa fa-solid fa-heart');
            } else if (heartIcon.tagName === 'I') {
                heartIcon.className = 'fa-solid fa-heart';
            }
            icon.classList.add('active');
        } else {
            if (heartIcon.tagName === 'svg') {
                heartIcon.setAttribute('class', 'svg-inline--fa fa-regular fa-heart');
            } else if (heartIcon.tagName === 'I') {
                heartIcon.className = 'fa-regular fa-heart';
            }
            heartIcon.style.color = ''; 
            icon.classList.remove('active');
        }
    }
    updateWishlistTooltip(icon, isInWishlist) {
    if (!icon) return;

    const tooltip = bootstrap.Tooltip.getInstance(icon);
    
    // For wishlist page with trash icons, disable tooltip
    if (icon.classList.contains('remove-from-wishlist')) {
        if (tooltip) {
            tooltip.dispose(); // Remove the tooltip entirely
        }
        return;
    }
    
    // For heart icons on other pages, show tooltip
    if (tooltip) {
        tooltip.setContent({ '.tooltip-inner': isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' });
    }
}

    updateWishlistCount(count) {
        const wishlistCountElements = document.querySelectorAll('.wishlist-count, .header-wishlist .count');
        wishlistCountElements.forEach(element => {
            if (element) {
                element.textContent = count;
                if (count > 0) {
                    element.style.display = 'inline';
                } else {
                    element.style.display = 'none';
                }
            }
        });
    }

    checkWishlistState(productId, icon) {
        if (!icon || !this.routes.check) {
            // console.log('No icon or route for checkWishlistState');
            return;
        }

        // console.log('Checking wishlist state for product:', productId, 'Icon element:', icon);

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        fetch(this.routes.check, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId
            })
        })
        .then(response => {
            // console.log('Check wishlist response status:', response.status);
            
            if (!response.ok) {
                return response.text().then(text => {
                    console.error('Check wishlist server response:', text);
                    throw new Error(`Server error: ${response.status} ${response.statusText}`);
                });
            }
            return response.json();
        })
        .then(data => {
            // console.log('Check wishlist response:', data);
            
            if (data.success) {
                this.updateWishlistIcon(icon, data.is_in_wishlist);
                this.updateWishlistTooltip(icon, data.is_in_wishlist);
            } else {
                console.warn('Check wishlist returned success: false', data);
                this.updateWishlistIcon(icon, false);
            }
        })
        .catch(error => {
            console.error('Error checking wishlist state:', error);
            this.updateWishlistIcon(icon, false);
        });
    }

    showWishlistToast(message, isAdded) {
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-bg-${isAdded ? 'success' : 'info'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');
        
        const iconClass = isAdded ? 'fa-heart' : 'fa-heart-crack';
        
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center">
                    <i class="fas ${iconClass} me-2"></i>
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        `;
        
        // Add to toast container
        let toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(toastContainer);
        }
        
        toastContainer.appendChild(toast);
        
        // Initialize and show toast
        const bsToast = new bootstrap.Toast(toast, {
            autohide: true,
            delay: 3000
        });
        bsToast.show();
        
        // Remove toast from DOM after hide
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    loadWishlistCount() {
    if (!this.routes.data) {
        console.error('Wishlist data route not defined');
        return;
    }

    // console.log('Loading wishlist count from:', this.routes.data);

    fetch(this.routes.data, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        // console.log('Wishlist count response status:', response.status);
        
        if (!response.ok) {
            return response.text().then(text => {
                console.error('Wishlist count server response:', text);
                throw new Error(`Server error: ${response.status} ${response.statusText}`);
            });
        }
        return response.json();
    })
    .then(data => {
        // console.log('Wishlist count data:', data);
        this.updateWishlistCount(data.wishlist_count);
    })
    .catch(error => {
        console.error('Error loading wishlist count:', error);
        this.updateWishlistCount(0); // Set to 0 on error
    });
    }

    // Method to refresh all wishlist icons (useful after AJAX content loads)
    refreshAllIcons() {
        const allIcons = document.querySelectorAll('.wishlist-toggle');
        allIcons.forEach(icon => {
            const productId = icon.getAttribute('data-product-id');
            this.checkWishlistState(productId, icon);
        });
    }




removeFromWishlist(productId, productTitle, icon, wishlistCount) {
    // console.log('Removing from wishlist for product:', productId);

    // Remove the entire product card from DOM
    const productCard = document.getElementById(`wishlistItem-${productId}`);
    if (productCard) {
        productCard.remove();
    }
    
    // Use the count from server response instead of calculating
    this.updateWishlistCount(wishlistCount);
    this.showWishlistToast('Product removed from wishlist!', false);
    
    // Check if wishlist is now empty
    const remainingItems = document.querySelectorAll('[id^="wishlistItem-"]').length;
    if (remainingItems === 0) {
        this.showEmptyWishlistState();
    }
}
// removeFromWishlist(productId, productTitle, icon) {
//     // console.log('Removing from wishlist for product:', productId);

//     // Remove the entire product card from DOM
//     const productCard = document.getElementById(`wishlistItem-${productId}`);
//     if (productCard) {
//         productCard.remove();
//     }
    
//     // Update the count from the DOM instead of calling getWishlistCount()
//     const currentCount = parseInt(document.getElementById('wishlistCount').textContent) || 0;
//     const newCount = Math.max(0, currentCount - 1);
    
//     this.updateWishlistCount(newCount);
//     this.showWishlistToast('Product removed from wishlist!', false);
    
//     // Check if wishlist is now empty
//     const remainingItems = document.querySelectorAll('[id^="wishlistItem-"]').length;
//     if (remainingItems === 0) {
//         this.showEmptyWishlistState();
//     }
// }

showEmptyWishlistState() {
        const wishlistContainer = document.getElementById('wishlistItemsContainer');
        const wishlistActions = document.querySelector('.wishlist-actions');
        
        if (wishlistContainer) {
            wishlistContainer.innerHTML = `
                <div class="empty-wishlist text-center py-5">
                    <div class="empty-icon mb-4">
                        <i class="fa fa-heart fa-4x text-muted"></i>
                    </div>
                    <h3 class="text-muted mb-3">Your wishlist is empty</h3>
                    <p class="text-muted mb-4">You haven't added any products to your wishlist yet.</p>
                    <a href="/shop" class="btn btn-dark btn-lg">
                        <i class="fa fa-shopping-bag me-2"></i>Start Shopping
                    </a>
                </div>
            `;
        }
        
        if (wishlistActions) {
            wishlistActions.remove();
        }
    }

// Update the toggleWishlist method to handle removal specifically
toggleWishlist(productId, productTitle, icon) {
    if (!icon || !this.routes.toggle) {
        console.error('Wishlist icon element not found or route not defined');
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    // console.log('Toggling wishlist for product:', productId);

    fetch(this.routes.toggle, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => {
        // console.log('Response status:', response.status);
        
        if (response.status === 401) {
            return response.json().then(data => {
                if (data.redirect) {
                    this.redirectToLogin(data.login_url, productId);
                }
                throw new Error(data.message);
            });
        }
        
        if (!response.ok) {
            return response.text().then(text => {
                console.error('Server response:', text);
                throw new Error(`Server error: ${response.status} ${response.statusText}`);
            });
        }
        return response.json();
    })
    .then(data => {
        // console.log('Toggle response:', data);
        
        if (data.success) {
            // Check if we're on the wishlist page
            const isOnWishlistPage = window.location.pathname.includes('wishlist');
            
            if (isOnWishlistPage && !data.is_in_wishlist) {
                // On wishlist page and item was removed - remove from DOM
                this.removeFromWishlist(productId, productTitle, icon, data.wishlist_count);
            } else {
                // On other pages or item was added - just update icon and count
                this.updateAllWishlistIcons(productId, data.is_in_wishlist);
                this.updateWishlistCount(data.wishlist_count);
                this.showWishlistToast(data.message, data.is_in_wishlist);
            }
        } else {
            throw new Error(data.message || 'Failed to update wishlist');
        }
    })
    .catch(error => {
        console.error('Toggle wishlist error:', error);
        if (!error.message.includes('redirect')) {
            this.showWishlistToast('Failed to update wishlist: ' + error.message, false);
        }
    });
}
}






// Create global instance
window.wishlistManager = new WishlistManager();

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    window.wishlistManager.init();
});