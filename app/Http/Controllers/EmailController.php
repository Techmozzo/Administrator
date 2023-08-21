<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Jobs\EmailJob;
use App\Models\User;
use App\Traits\HashId;

class EmailController extends Controller
{
    use HashId;

    public function create($id)
    {
        $user = User::find($this->decrypt($id));
        return view('admin.email.create', compact('user'));
    }

    public function send(EmailRequest $request)
    {
        $user = User::where('email', $request->to)->first();
        $file = (!empty($request->attachment)) ? storeFileLocally('email', $request->attachment) : null;
        $data = $request->except('attachment') + ['attachment' => $file];
        EmailJob::dispatch($data, $user, true);
        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
