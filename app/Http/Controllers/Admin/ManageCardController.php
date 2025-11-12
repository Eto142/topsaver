<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class ManageCardController extends Controller
{
    //

     public function UsersCards()
{
    $user_cards = \App\Models\Card::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('admin.manage_cards', compact('user_cards'));
}
}
