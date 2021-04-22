<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $email;
    protected $message;
    protected $key;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$key)
    {
        $this->name = $name;
        $this->email = $email;
        $this->key = $key;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->view('emails.ActivationMail')->with([
            'key'=>$this->key,
        ]);
    }
}
