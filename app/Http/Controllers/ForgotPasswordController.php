<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OTPServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    protected $otpService;

    public function __construct()
    {
        $this->otpService = new OTPServiceController();
    }

    public function showLinkRequestForm()
    {
        return view('pages.frontend.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'We can\'t find a user with that email address.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->email;
        
        // Check if user exists
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'We can\'t find a user with that email address.'])
                ->withInput();
        }
        
        // Rate limiting: Check if OTP was recently sent
        $lastOTPSent = \Illuminate\Support\Facades\Cache::get('last_otp_sent_' . $email);
        if ($lastOTPSent && (time() - $lastOTPSent) < 60) { // 60 seconds cooldown
            $waitTime = 60 - (time() - $lastOTPSent);
            return redirect()->back()
                ->withErrors(['email' => "Please wait {$waitTime} seconds before requesting a new OTP."])
                ->withInput();
        }
        
        // Generate and send OTP
        $otp = $this->otpService->generateOTP($email);
        $sent = $this->otpService->sendOTPEmail($email, $otp);

        if ($sent) {
            // Record when OTP was sent
            \Illuminate\Support\Facades\Cache::put('last_otp_sent_' . $email, time(), 60);
            
            return redirect()->back()
                ->with([
                    'success' => 'OTP sent to your email! It will expire in 10 minutes.', 
                    'otp_sent' => true, 
                    'email' => $email,
                    'otp_timestamp' => time()
                ]);
        } else {
            return redirect()->back()
                ->withErrors(['email' => 'Failed to send OTP. Please try again.'])
                ->withInput();
        }
    }

    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp1' => 'required|digits:1',
            'otp2' => 'required|digits:1',
            'otp3' => 'required|digits:1',
            'otp4' => 'required|digits:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->email;
        $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;

        // Check if user exists
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'User not found.'])
                ->withInput();
        }

        $verificationResult = $this->otpService->verifyOTP($email, $otp);
        
        if ($verificationResult['success']) {
            // Generate a token for password reset
            $token = Str::random(60);
            
            // Store token in cache for 1 hour
            \Illuminate\Support\Facades\Cache::put('password_reset_token_' . $email, $token, 3600);
            
            // Clear OTP timestamp
            \Illuminate\Support\Facades\Cache::forget('last_otp_sent_' . $email);
            
            return redirect()->back()
                ->with([
                    'success' => 'OTP verified successfully!', 
                    'otp_verified' => true, 
                    'email' => $email, 
                    'token' => $token
                ]);
        }

        return redirect()->back()
            ->withErrors(['otp' => $verificationResult['message']])
            ->withInput();
    }

    public function resendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Invalid email address.'], 400);
        }

        $email = $request->email;
        
        // Check if user exists
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 400);
        }
        
        // Rate limiting for resend
        $lastOTPSent = \Illuminate\Support\Facades\Cache::get('last_otp_sent_' . $email);
        if ($lastOTPSent && (time() - $lastOTPSent) < 60) {
            $waitTime = 60 - (time() - $lastOTPSent);
            return response()->json([
                'success' => false, 
                'message' => "Please wait {$waitTime} seconds before requesting a new OTP."
            ], 400);
        }
        
        // Generate and send new OTP
        $otp = $this->otpService->generateOTP($email);
        $sent = $this->otpService->sendOTPEmail($email, $otp);

        if ($sent) {
            // Update timestamp
            \Illuminate\Support\Facades\Cache::put('last_otp_sent_' . $email, time(), 60);
            
            return response()->json([
                'success' => true, 
                'message' => 'OTP resent successfully!',
                'otp_timestamp' => time()
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to resend OTP.'], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if user exists
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'User not found.'])
                ->withInput();
        }

        // Verify token
        $storedToken = \Illuminate\Support\Facades\Cache::get('password_reset_token_' . $request->email);
        
        if (!$storedToken || $storedToken !== $request->token) {
            return redirect()->back()
                ->withErrors(['token' => 'Invalid or expired token. Please restart the password reset process.'])
                ->withInput();
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Clear all cache entries
        \Illuminate\Support\Facades\Cache::forget('password_reset_token_' . $request->email);
        \Illuminate\Support\Facades\Cache::forget('password_reset_otp_' . $request->email);
        \Illuminate\Support\Facades\Cache::forget('last_otp_sent_' . $request->email);

        return redirect()->route('login')
            ->with('success', 'Password reset successfully! Please login with your new password.');
    }
}