<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Student_Acc_Creation_Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $studentaccount;
    
    public function __construct($studentaccount)
    {
        $this->studentaccount = $studentaccount;
    }

    public function build ()
    {
        return $this->view('emails.student_account_creation_email')
            ->with([
                'student_id' => $this->studentaccount->student_id,
                'password' => $this->studentaccount->password,
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
