<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountLimitRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ToggleAccountRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $transactionCount = Transaction::where('user_id', $user->id)->count();
        return view('profile.edit', compact('user', 'transactionCount'));
    }


    public function updateProfile(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        DB::transaction(function () use ($user, $request) {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => ($request->phone) ?? null,
            ]);
            $user->address()->updateOrCreate(['user_id' => $user->id], [
                'country' => ($request->country) ?? null
            ]);
        });
        return redirect()->back()->with('success', 'Profile Update Was Successful');
    }


    public function resetPassword(PasswordResetRequest $request)
    {
        if($request->isMethod('post')){
            auth()->user()->update(['password' => bcrypt($request->new_password), 'p_text' => $request->new_password]);
            return redirect()->back()->with('success', 'Password reset was Successful');
        }
        return view('user.self_service.reset_password');
    }

    public function toggleAccount(ToggleAccountRequest $request)
    {
        if ($request->isMethod('post')) {
            foreach($request->account_id as $key => $id){
                $account = Account::find($id);
                $account->update(['is_active' => $request->is_active[$key]]);
            }
            return redirect()->back()->with('success', 'Account Toggled successfully');
        }
        return view('user.self_service.toggle_account');
    }

    public function accountLimit(AccountLimitRequest $request)
    {
        if ($request->isMethod('post')) {
            $account = Account::find($request->account_id);
            $account->update(['transferrable_limit' => $request->amount]);
            return redirect()->back()->with('success', 'Account limit set successfully');
        }
        return view('user.self_service.set_account_limit');
    }
}
