<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConnectMessage extends Mailable
{
    use Queueable, SerializesModels;
    
    public $ContactInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Info)
    {
        $this->ContactInfo = $Info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {              
        return $this->view('contactus_layout')
                    ->subject($this->ContactInfo->get("Subject"));
    }
}
