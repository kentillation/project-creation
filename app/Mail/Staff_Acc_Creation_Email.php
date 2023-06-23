<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Staff_Acc_Creation_Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $staffaccount;

    public function __construct($staffaccount)
    {
        $this->staffaccount = $staffaccount;
    }

    public function build ()
    {
        return $this->view('emails.staff_account_creation_email')
            ->with([
                'username' => $this->staffaccount->username,
                'password' => $this->staffaccount->password,
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
