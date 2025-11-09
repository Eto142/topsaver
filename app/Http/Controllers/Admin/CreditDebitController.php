<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TransactionNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Credit;
use App\Models\Debit;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Mail\CreditEmail;
use Illuminate\Http\Request;

class CreditDebitController extends Controller
{
    //






// public function creditdebitUser(Request $request)
// {
//     $validated = $request->validate([
//         'id' => 'required|integer',
//         'amount' => 'required|numeric|min:0',
//         'type' => 'required|in:credit,debit',
//         'description' => 'nullable|string',
//         'name' => 'required|string',
//         'email' => 'required|email',
//         'balance' => 'required|numeric',
//         'a_number' => 'required|string',
//         'currency' => 'required|string',
//     ]);

//     $ref = rand(10000000, 99999999);
//     $date = Carbon::now();
//     $amount = $request->amount;
//     $transactionType = ucfirst($request->type); // "Credit" or "Debit"

//     // Save to Credit or Debit model
//     if ($request->type === 'credit') {
//         $record = new \App\Models\Credit();
//         $newBalance = $request->balance + $amount;
//     } else {
//         $record = new \App\Models\Debit();
//         $newBalance = $request->balance - $amount;
//     }

//     $record->user_id = $request->id;
//     $record->amount = $amount;
//     $record->description = $request->description ?? '';
//     $record->status = 1;
//     $record->save();

//     // Save transaction
//     $transaction = new \App\Models\Transaction();
//     $transaction->user_id = $request->id;
//     $transaction->transaction_id = $record->id;
//     $transaction->transaction_ref = "CD" . $ref;
//     $transaction->transaction_type = $transactionType;
//     $transaction->transaction = $transactionType;
//     $transaction->transaction_amount = $amount;
//     $transaction->transaction_description = $transactionType . ' transaction';
//     $transaction->transaction_status = 1;
//     $transaction->save();

//     // Prepare data for email
//     $mailData = [
//         'type' => $transactionType,
//         'name' => $request->name,
//         'amount' => $amount,
//         'balance' => $newBalance,
//         'date' => $date->format('Y-m-d H:i:s'),
//         'a_number' => $request->a_number,
//         'currency' => $request->currency,
//         'description' => $request->description ?? '',
//     ];

//     // Send email notification
//     Mail::to($request->email)->send(new TransactionNotification($mailData));

//     return back()->with('success', "{$transactionType} successful and notification sent.");
// }


// public function creditUser(Request $request)
// {
//     $ref = rand(12344994, 76503737);

//     $credit = new Credit;
//     $credit->user_id = $request->id;
//     $credit->amount = (float) $request->amount;
//     $credit->description = $request->description;
//     $credit->status = 1;
//     $credit->save();

//     $transaction = new Transaction;
//     $transaction->user_id = $request->id;
//     $transaction->transaction_id = $credit->id;
//     $transaction->transaction_ref = "CD" . $ref;
//     $transaction->transaction_type = "Credit";
//     $transaction->transaction = "Credit";
//     $transaction->transaction_amount = (float) $request->amount;
//     $transaction->transaction_description = "Credit transaction";
//     $transaction->transaction_status = 1;
//     $transaction->save();

//     $full_name = $request->name;
//     $email = $request->email;
//     $amount = (float) $request->amount;
//     $date = Carbon::now();
//     $balance = (float) $request->balance + $amount;
//     $description = $request->description;
//     $a_number = $request->a_number;
//     $currency = $request->currency;

//     $user = [
//         'account_number' => $a_number,
//         'account_name' => $full_name,
//         'full_name' => $full_name,
//         'description' => $description,
//         'amount' => $amount,
//         'date' => $date,
//         'balance' => $balance,
//         'currency' => $currency,
//         'ref' => "CD" . $ref,
//     ];

//     Mail::to($email)->send(new CreditEmail($user));

//     return back()->with('status', 'User account credited successfully');
// }



public function creditUser(Request $request)
{
    $ref = rand(12344994, 76503737);

    // Create credit record
    $credit = new Credit;
    $credit->user_id = $request->id;
    $credit->amount = (float) $request->amount;
    $credit->description = $request->description;
    $credit->status = 1;
    $credit->save();

    // Create transaction record
    $transaction = new Transaction;
    $transaction->user_id = $request->id;
    $transaction->transaction_id = $credit->id;
    $transaction->transaction_ref = "CD" . $ref;
    $transaction->transaction_type = "Credit";
    $transaction->transaction = "Credit";
    $transaction->transaction_amount = (float) $request->amount;
    $transaction->transaction_description = "Credit transaction";
    $transaction->transaction_status = 1;
    $transaction->save();

    // Get user full name from first_name and last_name
    $user = [
        'account_number' => $request->account_number,
        'full_name' => $request->first_name . ' ' . $request->last_name, // combine first & last name
        'description' => $request->description,
        'amount' => (float) $request->amount,
        'date' => Carbon::now(),
        'balance' => (float) $request->balance + (float) $request->amount,
        'currency' => $request->currency,
        'ref' => "CD" . $ref,
    ];

    // Send credit notification email
    Mail::to($request->email)->send(new CreditEmail($user));

    return back()->with('status', 'User account credited successfully');
}



public function debitUser(Request $request)
{
    // Use correct order in rand()
    $ref = rand(12344994, 76503737);

    // Create new debit record
    $debit = new Debit;
    $debit->user_id = $request->id;
    $debit->amount = (float) $request->amount;
    $debit->description = $request->description;
    $debit->status = 1;
    $debit->save();

    // Record the transaction
    $transaction = new Transaction;
    $transaction->user_id = $request->id;
    $transaction->transaction_id = $debit->id;
    $transaction->transaction_ref = "DB" . $ref;
    $transaction->transaction_type = "Debit";
    $transaction->transaction = "Debit";
    $transaction->transaction_amount = (float) $request->amount;
    $transaction->transaction_description = "Debit Transaction";
    $transaction->transaction_status = 1;
    $transaction->save();

    // Prepare user data for mail
    $full_name = $request->name;
    $email = $request->email;
    $amount = (float) $request->amount;
    $date = Carbon::now();

    // Safely calculate balance
    $balance = (float) $request->balance - $amount;

    $description = $request->description;
    $a_number = $request->a_number;
    $currency = $request->currency;

    $user = [
        'account_number' => $a_number,
        'account_name' => $full_name,
        'full_name' => $full_name,
        'description' => $description,
        'amount' => $amount,
        'date' => $date,
        'balance' => $balance,
        'currency' => $currency,
        'ref' => "DB" . $ref,
    ];

    Mail::to($email)->send(new DebitEmail($user));

    return back()->with('status', 'User account debited successfully');
}


}
