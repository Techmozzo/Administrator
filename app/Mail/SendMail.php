<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $subject, $heading, $body, $attachment;

    /**
     * SendEmail constructor.
     * @param $name
     * @param $subject
     * @param $heading
     * @param $body
     * @param $attachment
     */
    public function __construct($name, $subject, $heading, $body, $attachment = null)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->heading = $heading;
        $this->body = $body;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from('support@Ea-Administrator.com', 'Ea-Administrator')->subject($this->subject)->view('mail.template');
        if (isset($this->attachment)) {
            $mimeType = pathinfo($this->attachment, PATHINFO_EXTENSION);
            $email->attach(
                $this->attachment,
                [
                    'as' => 'attachment.' . $mimeType,
                    'mime' => 'application/' . $mimeType
                ]
            );
        }
        return $email;
    }
}
