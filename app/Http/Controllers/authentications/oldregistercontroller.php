<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
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
                ->route('login.register') // Use named route
                ->withErrors($validator, 'register')
                ->withInput()
                ->with('active_tab', 'register'); // Add this to activate register tab
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer', 
        ]);

        Auth::login($user);

        // Redirect to intended URL or home page
        return redirect()->intended('/')->with('success', 'Registration successful! Welcome to our store.');
    }
    
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ], [], [
    //         'name' => 'register_name',
    //         'email' => 'register_email',
    //         'phone' => 'register_phone',
    //         'password' => 'register_password'
    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator, 'register')->withInput();
    //     }

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'password' => Hash::make($request->password),
    //         'role' => 'customer', 
    //     ]);

    //     Auth::login($user);

    //     return redirect('/')->with('success', 'Registration successful! Welcome to our store.');
    // }
}
