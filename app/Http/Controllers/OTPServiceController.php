<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OTPServiceController extends Controller
{
    public function generateOTP($email)
    {
        $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
        
        // Store OTP in cache for 10 minutes
        Cache::put('password_reset_otp_' . $email, $otp, 600); // 10 minutes
        
        return $otp;
    }
    
    public function verifyOTP($email, $otp)
    {
        $cacheKey = 'password_reset_otp_' . $email;
        $storedOTP = Cache::get($cacheKey);
        
        if (!$storedOTP) {
            return ['success' => false, 'message' => 'OTP has expired. Please request a new one.'];
        }
        
        if ($storedOTP === $otp) {
            // Clear OTP after successful verification
            Cache::forget($cacheKey);
            return ['success' => true, 'message' => 'OTP verified successfully!'];
        }
        
        return ['success' => false, 'message' => 'Invalid OTP. Please try again.'];
    }
    
    public function sendOTPEmail($email, $otp)
{
    try {
        // Send actual email
        Mail::send('emails.password-reset-otp', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)
                    ->subject('Your Password Reset OTP - Pro Printer Shop');
        });

        // Check if email was actually sent
        if (count(Mail::failures()) > 0) {
            \Log::error('OTP Email failed to send to: ' . $email);
            return false;
        }

        // Log success and show demo OTP for testing
        \Log::info("OTP sent successfully to {$email}: {$otp}");
        session()->flash('debug_otp', $otp); // For testing purposes
        
        return true;
        
    } catch (\Exception $e) {
        \Log::error('OTP Email Error for ' . $email . ': ' . $e->getMessage());
        
        // Even if email fails, you might want to show OTP for development
        if (app()->environment('local')) {
            session()->flash('debug_otp', $otp);
            session()->flash('email_error', 'Email sending failed: ' . $e->getMessage());
            return true; // Allow continuation in development
        }
        
        return false;
    }
}
    
    /**
     * Check if OTP exists and is valid
     */
    public function checkOTPExists($email)
    {
        return Cache::has('password_reset_otp_' . $email);
    }
}