<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Credit;
use App\Models\Debit;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Transaction;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    //
    public function Crypto(){

            // Load the dashboard view
     $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
    $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
    $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    // $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
     $data['user_transfer']= Transfer::where('user_id',Auth::user()->id)->sum('amount');
    $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['balance'] = $data['credit_transfers'] - $data['debit_transfers'];
    
        return view('user.crypto', $data);
    }




     public function Paypal(){

           // Load the dashboard view
     $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
    $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
    $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    // $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
     $data['user_transfer']= Transfer::where('user_id',Auth::user()->id)->sum('amount');
    $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['balance'] = $data['credit_transfers'] - $data['debit_transfers'];
    
        return view('user.paypal', $data);
    }
}
