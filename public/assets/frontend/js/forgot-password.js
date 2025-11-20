// public/assets/frontend/js/forgot-password.js

document.addEventListener('DOMContentLoaded', function() {
    const otpInputs = document.querySelectorAll('.otp-input');
    
    otpInputs.forEach((input, index) => {
        input.addEventListener('input', function(e) {
            // Only allow numbers
            this.value = this.value.replace(/[^0-9]/g, '');
            
            if (this.value.length === 1) {
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            }
        });
        
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && this.value === '') {
                if (index > 0) {
                    otpInputs[index - 1].focus();
                }
            }
        });
    });

    // Auto-show sections based on session
    if (typeof otpSentEmail !== 'undefined' && otpSentEmail) {
        document.getElementById('otpEmail').value = otpSentEmail;
        showOtpSection();
    }
    
    if (typeof otpVerifiedEmail !== 'undefined' && otpVerifiedEmail) {
        document.getElementById('passwordEmail').value = otpVerifiedEmail;
        document.getElementById('passwordToken').value = otpVerifiedToken;
        showPasswordSection();
    }
});

// Timer variables
let otpTimeLeft = 600; // 10 minutes in seconds
let resendTimeLeft = 60; // 60 seconds cooldown for resend
let otpTimerInterval, resendTimerInterval;

// Show/Hide sections
function showEmailSection() {
    document.getElementById('emailSection').classList.remove('d-none');
    document.getElementById('otpSection').classList.add('d-none');
    document.getElementById('passwordSection').classList.add('d-none');
    clearTimers();
}

function showOtpSection() {
    document.getElementById('emailSection').classList.add('d-none');
    document.getElementById('otpSection').classList.remove('d-none');
    document.getElementById('passwordSection').classList.add('d-none');
    
    // Reset and start timers
    otpTimeLeft = 600;
    resendTimeLeft = 60;
    startOTPTimer();
    startResendTimer();
}

function showPasswordSection() {
    document.getElementById('emailSection').classList.add('d-none');
    document.getElementById('otpSection').classList.add('d-none');
    document.getElementById('passwordSection').classList.remove('d-none');
    clearTimers();
}

function clearTimers() {
    if (otpTimerInterval) clearInterval(otpTimerInterval);
    if (resendTimerInterval) clearInterval(resendTimerInterval);
}

// OTP Expiry Timer
function startOTPTimer() {
    const timerElement = document.getElementById('otpTimer');
    if (!timerElement) return;
    
    otpTimerInterval = setInterval(() => {
        const minutes = Math.floor(otpTimeLeft / 60);
        const seconds = otpTimeLeft % 60;
        
        timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
        
        if (otpTimeLeft <= 0) {
            clearInterval(otpTimerInterval);
            timerElement.textContent = '00:00';
            timerElement.className = 'text-danger';
        }
        
        otpTimeLeft--;
    }, 1000);
}

// Resend Cooldown Timer
function startResendTimer() {
    const resendLink = document.getElementById('resendLink');
    const resendTimerElement = document.getElementById('resendTimer');
    
    if (!resendLink || !resendTimerElement) return;
    
    // Initially disable resend
    resendLink.style.pointerEvents = 'none';
    resendLink.style.color = 'gray';
    
    resendTimerInterval = setInterval(() => {
        if (resendTimeLeft > 0) {
            resendTimerElement.textContent = ` (${resendTimeLeft}s)`;
            resendTimeLeft--;
        } else {
            clearInterval(resendTimerInterval);
            resendTimerElement.textContent = '';
            resendLink.style.pointerEvents = 'auto';
            resendLink.style.color = '';
        }
    }, 1000);
}

// Resend OTP
function resendOTP() {
    const email = document.getElementById('otpEmail').value;
    const resendLink = document.getElementById('resendLink');
    const resendTimerElement = document.getElementById('resendTimer');
    
    if (!resendLink || !resendTimerElement) return;
    
    // Disable resend immediately
    resendLink.style.pointerEvents = 'none';
    resendLink.style.color = 'gray';
    resendTimeLeft = 60;
    
    fetch(resendOtpUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('OTP resent successfully!');
            // Reset OTP timer
            otpTimeLeft = 600;
            // Start resend timer again
            startResendTimer();
        } else {
            alert(data.message || 'Error resending OTP');
            // Re-enable resend on error
            resendLink.style.pointerEvents = 'auto';
            resendLink.style.color = '';
            resendTimerElement.textContent = '';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error resending OTP');
        // Re-enable resend on error
        resendLink.style.pointerEvents = 'auto';
        resendLink.style.color = '';
        resendTimerElement.textContent = '';
    });
}