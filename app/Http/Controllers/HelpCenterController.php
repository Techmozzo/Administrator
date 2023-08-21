<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Jobs\EmailJob;

class HelpCenterController extends Controller
{
    public function __invoke(EmailRequest $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $file = (!empty($request->attachment)) ? storeFileLocally('email', $request->attachment) : null;
            $data = $request->except('attachment') + ['attachment' => $file];
            EmailJob::dispatch($data , $user);
            return redirect()->back()->with(['user' => $user, 'success' => 'Message sent successfully.']);
        }
        return view('user.messages.index', compact('user'));
    }
}
