// public/assets/frontend/js/cart-manager.js
class CartManager {
    constructor() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        this.init();
    }

    init() {
        this.bindGlobalEvents();
        this.loadCartCount();
    }

    bindGlobalEvents() {
        // Global event delegation for all add-to-cart buttons
        document.addEventListener('click', (e) => {
            const addToCartBtn = e.target.closest('.add-to-cart');
            if (addToCartBtn) {
                e.preventDefault();
                e.stopPropagation();
                this.handleAddToCart(addToCartBtn);
            }
        });

        // Handle form submissions for add to cart
        document.addEventListener('submit', (e) => {
            const form = e.target;
            if (form.id === 'addToCartForm' || form.classList.contains('add-to-cart-form')) {
                e.preventDefault();
                this.handleAddToCartForm(form);
            }
        });
    }

    async handleAddToCart(button) {
        const productId = button.getAttribute('data-product-id');
        const productTitle = button.getAttribute('data-product-title');
        const productPrice = button.getAttribute('data-product-price');
        const productImage = button.getAttribute('data-product-image');
        const productSlug = button.getAttribute('data-product-slug');
        
        await this.addToCart(productId, 1, productTitle, productPrice, productImage, productSlug, button);
    }

    async handleAddToCartForm(form) {
        const formData = new FormData(form);
        const productId = formData.get('product_id');
        const quantity = formData.get('quantity') || 1;
        
        const button = form.querySelector('button[type="submit"]');
        const productTitle = button?.getAttribute('data-product-title') || 
                           form.querySelector('[data-product-title]')?.getAttribute('data-product-title') || 
                           'Product';
        
        await this.addToCart(productId, quantity, productTitle, null, null, null, button);
    }

    async addToCart(productId, quantity, productTitle, productPrice, productImage, productSlug, button) {
        // Show loading state
        this.showButtonLoading(button, true);

        try {
            const response = await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: parseInt(quantity)
                })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'Network response was not ok');
            }

            if (data.success) {
                // Update cart count
                this.updateCartCount(data.cart_count);
                
                // Show success message
                this.showToast('success', `${productTitle} has been added to your cart.`, true);
                
                // Handle button state for form submissions
                if (button && button.closest('form')) {
                    this.handleFormSuccess(button);
                } else {
                    // Reset regular button after delay
                    setTimeout(() => {
                        this.showButtonLoading(button, false);
                    }, 2000);
                }
            } else {
                throw new Error(data.message || 'Failed to add product to cart');
            }

        } catch (error) {
            console.error('Cart Error:', error);
            this.showToast('error', 'Failed to add product to cart. Please try again.');
            this.showButtonLoading(button, false);
        }
    }

    showButtonLoading(button, isLoading) {
        if (!button) return;

        if (isLoading) {
            const originalText = button.innerHTML;
            button.setAttribute('data-original-html', originalText);
            button.innerHTML = `
                <span class="btn-text">Adding...</span>
                <div class="spinner-border spinner-border-sm ms-2" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            `;
            button.disabled = true;
        } else {
            const originalHtml = button.getAttribute('data-original-html');
            if (originalHtml) {
                button.innerHTML = originalHtml;
                button.removeAttribute('data-original-html');
            }
            button.disabled = false;
        }
    }

    handleFormSuccess(button) {
        if (!button) return;
        
        const form = button.closest('form');
        const btnText = button.querySelector('.btn-text');
        const spinner = button.querySelector('.spinner-border');
        
        if (btnText) btnText.textContent = 'View Cart';
        if (spinner) spinner.classList.add('d-none');
        
        button.classList.remove('btn-dark', 'btn-primary');
        button.classList.add('btn-success');
        button.type = 'button';
        button.onclick = () => {
            window.location.href = '/cart';
        };
        
        // Reset form quantity if exists
        const quantityInput = form.querySelector('input[name="quantity"]');
        if (quantityInput) {
            quantityInput.value = 1;
        }
    }

    updateCartCount(count) {
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

    async loadCartCount() {
        try {
            const response = await fetch('/cart/data', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const data = await response.json();
                this.updateCartCount(data.cart_count);
            }
        } catch (error) {
            console.error('Error loading cart count:', error);
        }
    }

    showToast(type, message, showViewCart = false) {
        // Create toast element
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
                        <a href="/cart" class="btn btn-light btn-sm small text-nowrap">View Cart</a>
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
            delay: showViewCart ? 5000 : 3000
        });
        bsToast.show();
        
        // Remove toast from DOM after hide
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    // Method to remove item from cart
    async removeFromCart(itemId) {
        try {
            const response = await fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    item_id: itemId
                })
            });

            const data = await response.json();

            if (data.success) {
                this.updateCartCount(data.cart_count);
                this.showToast('success', 'Item removed from cart');
                return true;
            } else {
                throw new Error(data.message || 'Failed to remove item');
            }
        } catch (error) {
            console.error('Error removing item:', error);
            this.showToast('error', 'Failed to remove item from cart');
            return false;
        }
    }

    // Method to update cart quantity
    async updateCartQuantity(itemId, quantity) {
        try {
            const response = await fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    item_id: itemId,
                    quantity: quantity
                })
            });

            const data = await response.json();

            if (data.success) {
                this.updateCartCount(data.cart_count);
                return data;
            } else {
                throw new Error(data.message || 'Failed to update quantity');
            }
        } catch (error) {
            console.error('Error updating quantity:', error);
            this.showToast('error', 'Failed to update quantity');
            throw error;
        }
    }
}

// Initialize cart manager
document.addEventListener('DOMContentLoaded', function() {
    window.cartManager = new CartManager();
});