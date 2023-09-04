<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\VerificationJob;
use App\Models\Auditor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

class AuditorController extends Controller
{

    public function destroy($id)
    {
        $data = ['success' => 'User deleted successfully'];
        try {
            $user = Auditor::find(decrypt_helper($id));
            DB::beginTransaction();
            $user->profile()->forceDelete();
            $user->address()->forceDelete();
            $user->transactions()->delete();
            $user->accounts()->delete();
            $result = $user->forceDelete($id);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
        if (!$result) {
            $data = ['error' => 'Unable to delete user'];
        }
        return response()->json($data);
    }


    public function block($id)
    {
        $data = ['success' => 'Auditor blocked successfully'];
        try {
            $auditor = Auditor::find($this->decrypt_helper($id));
            if ($auditor->is_blocked) {
                $result = $auditor->update(['is_blocked' => 0]);
            } else {
                $result = $auditor->update(['is_blocked' => 1]);
            }
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
        if (!$result) {
            $data = ['error' => 'Unable to Block Auditor'];
        }
        return response()->json($data);
    }

    public function index()
    {
        $user = auth()->user();
        $users = User::with('profile')->where('role_id', '!=', 1)->latest()->get();
        return view('admin.users.index', compact('users', 'user'));
    }

    public function verify($id)
    {
        $user = User::with('profile')->where('id', $id)->first();
        $user->update(['verified' => 1]);
        VerificationJob::dispatch('Successful', $user);
        return back()->with('success', $user->profile->first_name . ' ' . $user->profile->last_name . ' is now verified.');
    }


    public function unverify($id)
    {
        $user = User::with('profile')->where('id', $id)->first();
        $user->update(['verified' => 2, 'identification' => null]);
        VerificationJob::dispatch('Unsuccessful', $user);
        return back()->with('success', $user->profile->first_name . ' ' . $user->profile->last_name . ' is now unverified.');
    }
}
