<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{

    use Queueable, SerializesModels;
    public $name,$email,$subject,$comments;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject,$comments)
    {
        //
        $this->name=$name;
        $this->email=$email;
        $this->subject=$subject;
        $this->comments=$comments;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contact-email');
    }
}
