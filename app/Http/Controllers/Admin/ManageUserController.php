<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Credit;
use App\Models\Debit;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageUserController extends Controller
{
    public function ManageUsers()
    {
        $users = User::paginate(10);
        
        if (request()->ajax()) {
            return response()->json([
                'html' => view('admin.partials.users_table', ['users' => $users])->render(),
                'pagination' => $users->links()->render()
            ]);
        }
        
        return view('admin.manage_users', ['users' => $users]);
    }

    public function ShowUsers () {

        return view('admin.user_data');
    }





    public function userProfile($id)
{
    $user = DB::table('users')->where('id', $id)->first();

    $data = [
        'userProfile'       => $user,
        'credit_transfers'  => Transaction::where('user_id', $id)
                                    ->where('transaction_status', '1')
                                    ->where('transaction_type', 'Credit')
                                    ->sum('transaction_amount'),

        'debit_transfers'   => Transaction::where('user_id', $id)
                                    ->where('transaction_status', '1')
                                    ->where('transaction_type', 'Debit')
                                    ->sum('transaction_amount'),

        'user_deposits'     => Deposit::where('user_id', $id)
                                    ->where('status', '1')
                                    ->sum('amount'),
                                    

        'user_loans'        => Loan::where('user_id', $id)
                                    ->where('status', '1')
                                    ->sum('amount'),

        'user_credit'       => Credit::where('user_id', $id)
                                    ->where('status', '1')
                                    ->sum('amount'),

        'user_debit'        => Debit::where('user_id', $id)
                                    ->where('status', '1')
                                    ->sum('amount'),

        'loan'              => Loan::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),

        'user_deposits_list'=> Deposit::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),

          'user_transfers_list'=> Transfer::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),


        'user_loans_list'   => Loan::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),

         'user_cards_list'   => Card::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),

        'user_transactions' => Transaction::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),
    ];

    return view('admin.user_data', $data);
}



        public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();


        return back()->with('status', 'User deleted successfully');
}



public function clearAccount($id)
    {
        $user = User::find($id);
        if ($user) {

            // Delete related records (posts, comments, likes) associated with the user
            // $user->profits()->delete();
            $user->deposits()->delete();
             $user->credits()->delete();
            $user->debits()->delete();
            $user->loans()->delete();
            $user->transactions()->delete();
            // $user->earnings()->delete();
            // $user->withdrawals()->delete();

            return back()->with('status', 'Records deleted successfully');
        } else {
            return back()->with('status', 'User Not Found');
        }
    }


}
