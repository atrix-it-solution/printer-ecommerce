<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|unique:pending_users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('login.register')
                ->withErrors($validator, 'register')
                ->withInput()
                ->with('active_tab', 'register');
        }

        try {
            // Create pending user (NOT actual user yet)
            $verificationToken = PendingUser::generateVerificationToken();
            
            $pendingUser = PendingUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => 'customer',
                'verification_token' => $verificationToken,
                'token_created_at' => now(),
            ]);

            Log::info('Pending user created', [
                'email' => $pendingUser->email,
                'token' => $verificationToken
            ]);

            // Send verification email
            $verificationUrl = route('verification.verify', ['token' => $verificationToken]);
            
            Mail::to($pendingUser->email)->send(new EmailVerificationMail($pendingUser, $verificationUrl));

            Log::info('Verification email sent to: ' . $pendingUser->email);

            return redirect()->route('login.register')
                ->with('success', 'Your account has been created! We\'ve sent a confirmation link to your email. Please verify your email to activate your account.')
                ->with('active_tab', 'login');

        } catch (\Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());

            return redirect()->route('login.register')
                ->with('error', 'Registration failed. Please try again.')
                ->with('active_tab', 'register')
                ->withInput();
        }
    }

    /**
     * Verify email and create actual user
     */
    public function verifyEmail($token)
    {
        try {
            $pendingUser = PendingUser::where('verification_token', $token)->first();

            if (!$pendingUser) {
                return redirect()->route('login.register')
                    ->with('error', 'Invalid verification link.')
                    ->with('active_tab', 'login');
            }

            if ($pendingUser->isTokenExpired()) {
                $pendingUser->delete();
                return redirect()->route('login.register')
                    ->with('error', 'Verification link has expired. Please register again.')
                    ->with('active_tab', 'login');
            }

            // Create actual user
            $user = User::create([
                'name' => $pendingUser->name,
                'email' => $pendingUser->email,
                'phone' => $pendingUser->phone,
                'password' => $pendingUser->password,
                'role' => $pendingUser->role,
                'email_verified_at' => now(), // Mark as verified immediately
            ]);

            Log::info('User verified and created', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            // Delete pending user
            $pendingUser->delete();

            return redirect()->route('login.register')
                ->with('success', 'Your email has been verified successfully! You can now login to your account.')
                ->with('active_tab', 'login');

        } catch (\Exception $e) {
            Log::error('Email verification failed: ' . $e->getMessage());

            return redirect()->route('login.register')
                ->with('error', 'Verification failed. Please try again.')
                ->with('active_tab', 'login');
        }
    }
}