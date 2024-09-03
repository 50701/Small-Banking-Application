<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\AbcBankUser;


class SignupController extends Controller
{
    // Show the signup form
    public function showForm()
    {
        return view('signup');
    }

    // Handle the signup form submission
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\'-]+$/',
            'email' => 'required|email|max:255|unique:abc_bank_users,email',
            'password' => [
                'required',
                'string',
                'min:8', // Minimum length of 8 characters
                'max:50', // Maximum length of 50 characters
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', // Regex for complexity
            ],
            'agreed_to_terms' => 'required|accepted',
        ], [
            'name.regex' => 'The name may only contain letters, spaces, apostrophes, and hyphens.',
            'password.regex' => 'The password must contain at least one number, one uppercase letter, and one lowercase letter.',
            'agreed_to_terms.accepted' => 'You must agree to the terms and conditions.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('signup.form')
                            ->withErrors($validator)
                            ->withInput($request->except('password')); // Avoid flashing the password back
        }

        // Sanitize and escape inputs
        $validatedData = $validator->validated();

        // Additional sanitization for name (if needed)
        $validatedData['name'] = filter_var($validatedData['name'], FILTER_SANITIZE_STRING);

        // Create a new user with sanitized and secure data
        $user = AbcBankUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Securely hash the password
            'agreed_to_terms' => $validatedData['agreed_to_terms'],
            'balance' => 0, // Default balance
        ]);

        // Optionally, log the user in
        // Auth::login($user);

        // Redirect to the login page with success message
        return redirect()->route('login.form')->with('success', 'Signup successful!');
    }
}
