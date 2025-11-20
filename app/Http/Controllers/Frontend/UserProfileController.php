<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('pages.frontend.edit-account', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'displayname' => 'nullable|string|max:255',
            'phonenumber' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update user information
        $user->update([
            'name' => $request->name,
            'display_name' => $request->displayname,
            'phone' => $request->phonenumber,
            'date_of_birth' => $request->dob,
            'gender' => $request->gender,
            'newsletter_subscription' => $request->newsletter === 'Subscribe to our Newsletter',
            'receive_order_updates' => $request->newsletter === 'Receive Order Updates',
        ]);

        // Handle password change - FIXED THIS PART
        if ($request->filled('current_password') && $request->filled('new_password')) {
            // Check if current password is correct
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()
                    ->withErrors(['current_password' => 'Current password is incorrect'])
                    ->withInput();
            }

            // Update the password
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            
            // Log the user out and redirect to login page
            Auth::logout();
            return redirect()->route('login')
                ->with('success', 'Password updated successfully! Please login with your new password.');
        }

        return redirect()->route('my-account.edit')
            ->with('success', 'Profile updated successfully!');
    }
}