<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalCodeUpdated;

class WithdrawalController extends Controller
{
    //


public function updateWithdrawalCode(Request $request)
{
    // Validate the request
    $request->validate([
        'id' => 'required|exists:users,id',
        'withdrawal_code' => 'required|numeric', // TAC code
    ]);

    // Find the user
    $user = User::findOrFail($request->id);

    // Update the withdrawal_code
    $user->withdrawal_code = $request->withdrawal_code;
    $user->save();

    // Send email to the user
    Mail::to($user->email)->send(new WithdrawalCodeUpdated($user));

    return back()->with('status', 'Foreign Code updated and email sent to ' . $user->first_name);
}

}
