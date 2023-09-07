<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Models\Bank;
use App\Models\Banker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AddBankerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bank, $banker, $password;

    /**
     * UserInvitationJob constructor.
     * @param $data
     */
    public function __construct(Bank $bank, Banker $banker, string $password)
    {
        $this->bank = $bank;
        $this->banker = $banker;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subject = $this->bank->name . ' Audit Confirmation Invite.';
        $heading = 'Audit Confirmation Invite';
        $body = $this->bank->name ." Has created a profile for you on Audit Confirmation Platform.
            Here is a default password created for your login access
            <br/> <strong>" . $this->password ."</strong>
            <br/><br/><b><a href=".config('app.url').">Start Now</a></b><br />
            If the button doesn't work, copy and paste the URL in your browser's address bar: <br /> <br />
            <br/><br/>Reach out to Techmozzo Support if you have any complaints or enquiries. <br/><br/> Thanks.";
        Mail::to($this->banker->email)->send(new SendMail($this->banker->name(), $subject, $heading, $body));
    }
}
