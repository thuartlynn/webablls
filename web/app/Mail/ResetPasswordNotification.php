<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordNotification extends Mailable
{
    use Queueable, SerializesModels;
    
    public $ResetInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Info)
    {
        $this->ResetInfo = $Info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_setnew_layout')
                    ->subject('Set New Password');
    }
}
