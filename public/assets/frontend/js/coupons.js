// Coupon functions for both cart and checkout pages
function applyCouponFromCart() {
    const couponCode = document.getElementById('coupon_code').value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    
    if (!couponCode) {
        alert('Please enter a coupon code.');
        return;
    }
    
    fetch('/coupon/apply', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            coupon_code: couponCode
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showCouponMessage(data.message, 'success');
            // Reload page to show updated totals
            setTimeout(() => {
                location.reload();
            }, 1500);
        } else {
            showCouponMessage(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showCouponMessage('Something went wrong. Please try again.', 'error');
    });
}

function applyCoupon() {
    const couponCode = document.querySelector('input[name="coupon_code"]').value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    
    if (!couponCode) {
        alert('Please enter a coupon code.');
        return;
    }
    
    fetch('/coupon/apply', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            coupon_code: couponCode
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showCouponMessage(data.message, 'success');
            // Reload page to show updated totals
            setTimeout(() => {
                location.reload();
            }, 1500);
        } else {
            showCouponMessage(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showCouponMessage('Something went wrong. Please try again.', 'error');
    });
}

function removeCoupon() {
    if (!confirm('Are you sure you want to remove this coupon?')) {
        return;
    }
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    
    fetch('/coupon/remove', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showCouponMessage(data.message, 'success');
            // Reload page to show updated totals
            setTimeout(() => {
                location.reload();
            }, 1500);
        } else {
            showCouponMessage(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showCouponMessage('Something went wrong. Please try again.', 'error');
    });
}

function showCouponMessage(message, type) {
    // Remove existing messages
    const existingMessages = document.querySelectorAll('.coupon-message');
    existingMessages.forEach(msg => msg.remove());
    
    // Create new message
    const messageDiv = document.createElement('div');
    messageDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} coupon-message mt-2`;
    messageDiv.textContent = message;
    
    // Insert in appropriate location
    const couponSection = document.querySelector('.actions_inner') || 
                         document.querySelector('.cart_totals') || 
                         document.getElementById('couponForm');
    
    if (couponSection) {
        couponSection.parentNode.insertBefore(messageDiv, couponSection.nextSibling);
    }
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (messageDiv.parentNode) {
            messageDiv.remove();
        }
    }, 5000);
}

// Initialize coupon functionality
document.addEventListener('DOMContentLoaded', function() {
    // Update the coupon form in cart to use AJAX instead of form submission
    const couponForm = document.querySelector('.coupon');
    if (couponForm) {
        const applyButton = couponForm.querySelector('button[name="apply_coupon"]');
        if (applyButton) {
            applyButton.addEventListener('click', function(e) {
                e.preventDefault();
                applyCouponFromCart();
            });
        }
    }

    // Checkout coupon form
    const checkoutCouponForm = document.getElementById('couponForm');
    if (checkoutCouponForm) {
        checkoutCouponForm.addEventListener('submit', function(e) {
            e.preventDefault();
            applyCoupon();
        });
    }
});