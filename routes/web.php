<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BankController;

Route::get('/', function () {
    return view('login');
});

// Route to show the signup form
Route::get('signup', [SignupController::class, 'showForm'])->name('signup.form');

// Route to handle the signup form submission and create a new user
Route::post('signup', [SignupController::class, 'store'])->name('signup.store');

// Route to show the login form
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');

// Route to handle the login form submission and authenticate the user
Route::post('login', [LoginController::class, 'login'])->name('login');

// Route to handle the user logout action
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Route to show the home page, only accessible to authenticated users
Route::get('home', [BankController::class, 'index'])
    ->name('home')
    ->middleware('auth'); // Apply the auth middleware


// Route for viewing the deposit form and processing deposit
Route::get('deposit', [BankController::class, 'showDepositForm'])
    ->name('deposit.form')
    ->middleware('auth');

Route::post('deposit', [BankController::class, 'deposit'])
    ->name('deposit')
    ->middleware('auth');


// Route for viewing the withdraw form and processing withdrawal
Route::get('withdraw', [BankController::class, 'showWithdrawForm'])
    ->name('withdraw.form')
    ->middleware('auth');

Route::post('withdraw', [BankController::class, 'withdraw'])
    ->name('withdraw')
    ->middleware('auth');


// Route for viewing the transfer form and processing transfer
Route::get('transfer', [BankController::class, 'showTransferForm'])
    ->name('transfer.form')
    ->middleware('auth');

Route::post('transfer', [BankController::class, 'transfer'])
    ->name('transfer')
    ->middleware('auth');


// Route for viewing the bank statement
Route::get('statement', [BankController::class, 'showStatement'])->name('statement');