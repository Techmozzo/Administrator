<?php

namespace App\Http\Controllers;

use App\Models\RequestPayment;

class RequestPaymentController extends Controller
{
    public function history(){
        $user = auth()->user();
        $transactions = RequestPayment::with('account')->where([['user_id', $user->id], ['show', 1]])->get();
        return view('user.accounts.transaction_history', compact('user', 'transactions'));
    }
}
