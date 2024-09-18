<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Services\Mail\MailtrapService;


class WebMessages extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailtrapService;

    public function __construct( $mailtrapService)
    {
        $this->mailtrapService = $mailtrapService;
    }

    public function index()
    {
        $emails = $this->mailtrapService->fetchEmails();
        return view('emails.index', compact('emails'));
    }
    public function build()
    {
        return $this->subject('Test Email')
                    ->view('emails.test');
    }
    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Web Messages',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
