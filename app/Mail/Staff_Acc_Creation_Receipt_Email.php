<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Staff_Acc_Creation_Receipt_Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $staffaccount_receipt;

    public function __construct($staffaccount_receipt)
    {
        $this->staffaccount_receipt = $staffaccount_receipt;
    }

    public function build ()
    {
        return $this->view('emails.staff_account_creation_receipt_email')
            ->with([
                'email' => $this->staffaccount_receipt->email,
                'username' => $this->staffaccount_receipt->username,
                'password' => $this->staffaccount_receipt->password,
            ])
            ->subject('Christian School EHR Account');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Christian School EHR Account',
        );
    }

    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
