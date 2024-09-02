<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AbcBankUser;
use App\Models\AbcBankStatement;

class BankController extends Controller
{
    // Show the Home Page
    public function index()
    {
        // Get the currently logged-in user
        $user = Auth::user();
        return view('home', [
            'currentUser' => $user,
        ]);
    }

    // Show the deposit form
    public function showDepositForm()
    {
        return view('deposit');
    }

    // Process the deposit
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $amount = $request->input('amount');

        // Update user's balance
        $user->balance += $amount;
        $user->save();

        // Record the deposit in abc_bank_statements
        $user->statements()->create([
            'amount' => $amount,
            'type' => 'credit',
            'details' => 'Deposit',
            'balance' => $user->balance,
        ]);

        return redirect()->route('deposit')->with('success', 'Deposit successful!');
    }



    // Show the withdraw form
    public function showWithdrawForm()
    {
        return view('withdraw');
    }

    // Process the withdrawal
    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $amount = $request->input('amount');

        if ($user->balance >= $amount) {
            // Update user's balance
            $user->balance -= $amount;
            $user->save();

            // Record the withdrawal in abc_bank_statements
            $user->statements()->create([
                'amount' => $amount,
                'type' => 'debit',
                'details' => 'Withdrawal',
                'balance' => $user->balance,
            ]);

            return redirect()->route('withdraw')->with('success', 'Withdrawal successful!');
        }

        return back()->withErrors(['Insufficient balance for this withdrawal.'])->withInput();
    }



    // Show the transfer form
    public function showTransferForm()
    {
        return view('transfer');
    }

    // Process the transfer
    public function transfer(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'recipient_email' => 'required|email|exists:abc_bank_users,email',
        ]);

        $user = Auth::user();
        $amount = $request->input('amount');
        $recipientEmail = $request->input('recipient_email');

        // Check if the recipient email is the same as the user's email
        if ($user->email === $recipientEmail) {
            return back()->withErrors(['You cannot transfer money to your own account.'])->withInput();
        }

        // Find the recipient by email
        $recipient = AbcBankUser::where('email', $recipientEmail)->first();

        // Check if the user has enough balance for the transfer
        if ($user->balance >= $amount) {
            // Update sender's balance
            $user->balance -= $amount;
            $user->save();

            // Update recipient's balance
            $recipient->balance += $amount;
            $recipient->save();

            // Record the transfer in abc_bank_statements for the sender
            $user->statements()->create([
                'amount' => $amount,
                'type' => 'debit',
                'details' => 'Transfer to ' . $recipient->email,
                'balance' => $user->balance,
                'related_user_id' => $recipient->id,
            ]);

            // Record the transfer in abc_bank_statements for the recipient
            $recipient->statements()->create([
                'amount' => $amount,
                'type' => 'credit',
                'details' => 'Transfer from ' . $user->email,
                'balance' => $recipient->balance,
                'related_user_id' => $user->id,
            ]);

            return redirect()->route('transfer')->with('success', 'Transfer successful!');
        }

        // Return error if insufficient balance
        return back()->withErrors(['Insufficient balance for this transfer.'])->withInput();
    }



    // Show the statement
    public function showStatement()
    {
        $user = Auth::user();
        
        // Fetch all statements involving the current user
        $statements = AbcBankStatement::where('user_id', $user->id)
            //->orWhere('related_user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->paginate(5);

        return view('statement', compact('statements'));
    }

}
