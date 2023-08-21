<?php

namespace App\Jobs;

use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class VerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $status, $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($status, $user)
    {
        $this->status = $status;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $name = $this->user->name();
        $subject = 'Verification Notification';
        $heading = 'Account Verification';
        $body = 'This is to notify you that your account verification was ' . $this->status . '.
        <br/><br/>Reach out to Ea-Administrator Support if you have any complaints or enquiries.
        <br/><br/>Thanks';
        Mail::to($this->user->email)->send(new SendMail($name, $subject, $heading, $body));
    }
}
