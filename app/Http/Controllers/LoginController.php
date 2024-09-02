<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\AbcBankUser;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('login'); // Make sure this matches your Blade template path
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication passed, redirect to intended route or dashboard
            return redirect()->intended('home')->with('success', 'Login successful!');
        }

        // Authentication failed, redirect back with an error message
        return redirect()->route('login')->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Handle the logout request.
     */
    public function logout()
    {
        Auth::logout();

        // Clear session data
        Session::flush();

        return redirect()->route('login')->with('success', 'You have been logged out!');
    }
}
