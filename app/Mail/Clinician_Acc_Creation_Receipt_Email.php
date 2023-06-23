<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Clinician_Acc_Creation_Receipt_Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $clinicianaccount_receipt;

    public function __construct($clinicianaccount_receipt)
    {
        $this->clinicianaccount_receipt = $clinicianaccount_receipt;
    }

    public function build ()
    {
        return $this->view('emails.clinician_account_creation_receipt_email')
            ->with([
                'email' => $this->clinicianaccount_receipt->email,
                'username' => $this->clinicianaccount_receipt->username,
                'password' => $this->clinicianaccount_receipt->password,
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
