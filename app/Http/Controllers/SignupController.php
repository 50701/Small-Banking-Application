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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:abc_bank_users,email',
            'password' => 'required|string|min:8',
            'agreed_to_terms' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('signup.form')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Create a new user
        $user = AbcBankUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash the password
            'agreed_to_terms' => $request->input('agreed_to_terms'),
            'balance' => 0, // Default balance
        ]);

        // Optionally, log the user in
        // Auth::login($user);

        // Redirect to a desired page
        return redirect()->route('login.form')->with('success', 'Signup successful!');
    }
}
