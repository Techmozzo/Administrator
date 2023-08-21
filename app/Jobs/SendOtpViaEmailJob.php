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

class SendOtpViaEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $otp;

    /**
     * ForgotPasswordJob constructor.
     * @param $user
     * @param $otp
     */
    public function __construct($user, $otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subject = 'Ea-Administrator';
        $heading = 'Ea-Administrator Authorization Token ';
        $body = $this->messageBody();
        Mail::to($this->user->email)->send(new SendMail($this->user->name(), $subject, $heading, $body));
    }

    private  function messageBody()
    {

        return "You are receiving this email because we received a senstive action on your account.
                    <br/><br/>Please use the OTP below to continue the process.
                    <br/><br/><b>$this->otp</b>
                    <br/><br/>If you did not request such action, no further action is required.
                    <br/><br/>Reach out to Ea-Administrator Support if you have any complaints or enquiries.
                    <br/><br/>Thanks";
    }
}
