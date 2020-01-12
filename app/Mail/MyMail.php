<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $tasks;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = Auth::user()->name ;
        return $this->subject('Mail From '.$user)->view('emails.myMail', compact('user'));
    }
}
