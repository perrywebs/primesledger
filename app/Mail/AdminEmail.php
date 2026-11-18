<?php

namespace App\Mail;

use App\Support\EmailContent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $safeMessage;

    public function __construct(
        public string $heading,
        public string $messageBody,
        string $subject
    ) {
        $this->subject = $subject;
        $this->safeMessage = EmailContent::sanitize($messageBody);
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->subject);
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.admin_email',
            text: 'mail.admin_email_text',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
