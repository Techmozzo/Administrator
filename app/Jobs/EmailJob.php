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

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user, $data, $to;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($data, $user, $to = false)
    {
        $this->user = $user;
        $this->data = $data;
        $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $name = ($this->to) ? 'Admin' : $this->user->name();
        $recipientEmail = ($this->to) ? $this->user->email : 'support@Ea-Administrator.com';
        $subject = 'Ea-Administrator';
        $heading = $this->data['subject'];
        $body = $this->data['message'];
        $attachment = $this->data['attachment'] ?? null;
        if (!empty($this->data['copy'])) {
            $cc = ($this->to) ? 'support@Ea-Administrator.com' : $this->user->email;
            Mail::to($recipientEmail)->cc([$cc])->send(new SendMail($name, $subject, $heading, $body, $attachment));
        } else {
            Mail::to($recipientEmail)->send(new SendMail($name, $subject, $heading, $body, $attachment));
        };
    }
}
