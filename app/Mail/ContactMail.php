<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;
    /**
     * Create a new message instance.
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

     /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->from(env('APP_MAIL'))
            ->subject('Your Soccer Spotlight contact query has been sent successfully.')
            ->view('mail.contact-mail')
            ->with('order', $this->contact);

    }
}
