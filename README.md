<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAppointmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $schedule_date;

    /**
     * Create a new message instance.
     */
    public function __construct($student, $schedule_date)
    {
        $this->student = $student;
        $this->schedule_date = $schedule_date;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.appointment',
            with: [
                'student' => $this->student,
                'schedule_date' => $this->schedule_date,
            ],
        );
    }

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
