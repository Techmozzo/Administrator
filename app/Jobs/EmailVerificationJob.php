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

class EmailVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $banker;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($banker)
    {
        $this->banker = $banker;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subject = 'Verification Notification';
        $heading = 'Email Verification';
        $body = "Kindly click the link below to verify your email address.
        <br/><br/><b><a href=" . config('app.url') . "/" . encrypt_helper($this->banker->id) . "/email-verification >Click To Verify</a></b><br />
        <br/><br/>Reach out to Ea-Auditor Support if you have any complaints or enquiries.
        <br/><br/>Thanks";
        Mail::to($this->banker->email)->send(new SendMail($this->banker->name(), $subject, $heading, $body));
    }
}
