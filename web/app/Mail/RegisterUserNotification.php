<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUserNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $UserInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Info)
    {
        $this->UserInfo = $Info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_adduser_layout')
                    ->subject('Welcome to WebABLLS of TIS');
    }
}
