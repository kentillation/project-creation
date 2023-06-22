<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Student_Acc_Creation_Receipt_Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $studentaccount_receipt;

    public function __construct($studentaccount_receipt)
    {
        $this->studentaccount_receipt = $studentaccount_receipt;
    }

    public function build ()
    {
        return $this->view('emails.student_account_creation_receipt_email')
            ->with([
                'student_id' => $this->studentaccount_receipt->student_id,
                // 'first_name' => $this->studentaccount_receipt->first_name,
                // 'middle_name' => $this->studentaccount_receipt->middle_name,
                // 'last_name' => $this->studentaccount_receipt->last_name,
                // 'phone' => $this->studentaccount_receipt->phone,
                'email' => $this->studentaccount_receipt->email,
                'password' => $this->studentaccount_receipt->password
                //Add more variables if needed
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
