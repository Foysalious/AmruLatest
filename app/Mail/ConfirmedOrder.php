<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmedOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $invoice;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $subject)
    {
        $this->invoice = $invoice;
        $this->subject($subject);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confirmedOrder',['invoice'=> $this->invoice]);
    }
}
