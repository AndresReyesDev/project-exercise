<?php

namespace App\Mail;

use App\Borrower;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BorrowerCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Borrower $borrower)
    {
        $this->borrower = $borrower;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Borrower Created')
            ->view('emails.notification')
            ->with([
                'borrower' => $this->borrower,
            ]);
    }
}
