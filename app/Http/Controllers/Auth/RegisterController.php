<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
 use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }



// public function register(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'phone' => 'required|string|max:255',
//         'dob' => 'required|string|max:255',
//         'account_type' => 'required|string|max:255',
//         'transaction_pin' => 'required|string|max:255',
//         'country' => 'required|string|max:255',
//         'currency' => 'required|string|max:255',
//         'password' => 'required|string|min:8|confirmed',
//     ]);

//     // Generate a unique account number
//     do {
//         $accountNumber = 'ACCT-' . mt_rand(1000000000, 9999999999);
//     } while (User::where('account_number', $accountNumber)->exists());

//     $user = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'phone' => $request->phone,
//         'dob' => $request->dob,
//         'country' => $request->country,
//         'currency' => $request->currency,
//         'account_type' => $request->account_type,
//         'transaction_pin' => $request->transaction_pin,
//         'password' => Hash::make($request->password),
//         'show_password' => $request->password,
//         'account_number' => $accountNumber,
//     ]);

//     // Send welcome email
//     Mail::to($user->email)->send(new WelcomeMail($user));

//     auth()->login($user);

//     return redirect('login')->with('success', 'Registration successful! Please check your email for account details.');
// }



public function register(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|max:255',
        'dob' => 'required|string|max:255',
        'account_type' => 'required|string|max:255',
        'transaction_pin' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'currency' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
        // Next of Kin validation
        'kin_full_name' => 'required|string|max:255',
        'kin_relationship' => 'required|string|max:255',
        'kin_phone' => 'required|string|max:255',
        'kin_email' => 'nullable|string|email|max:255',
        'kin_address' => 'required|string|max:500',
        'referral_source' => 'nullable|string|max:255',
    ]);

    // Generate a unique account number
    do {
        $accountNumber = 'ACCT-' . mt_rand(1000000000, 9999999999);
    } while (User::where('account_number', $accountNumber)->exists());

    $user = User::create([
         'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'gender' => $request->gender,
        'email' => $request->email,
        'phone' => $request->phone,
        'dob' => $request->dob,
        'country' => $request->country,
        'currency' => $request->currency,
        'account_type' => $request->account_type,
        'transaction_pin' => $request->transaction_pin,
        'password' => Hash::make($request->password),
        'show_password' => $request->password,
        'account_number' => $accountNumber,
        // Next of Kin fields
        'kin_full_name' => $request->kin_full_name,
        'kin_relationship' => $request->kin_relationship,
        'kin_phone' => $request->kin_phone,
        'kin_email' => $request->kin_email,
        'kin_address' => $request->kin_address,
        // Referral source
        'referral_source' => $request->referral_source,
    ]);

    // Send welcome email
    Mail::to($user->email)->send(new WelcomeMail($user));

    auth()->login($user);

    return redirect('login')->with('success', 'Registration successful! Please check your email for account details.');
}


}

