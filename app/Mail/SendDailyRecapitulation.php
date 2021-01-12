<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDailyRecapitulation extends Mailable
{
    use Queueable, SerializesModels;

    public $data = NULL;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        /* Initialize the array variable by the variable passed by the object creation of the class. */
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.daily_recapitulation')->with('data', $this->data);
    }
}
