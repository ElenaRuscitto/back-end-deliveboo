<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderReceivedNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $new_order;
    public $dishes;
    public $currentDateTime;
    /**
     * Create a new message instance.
     */
    public function __construct($new_order, $dishes, $currentDateTime)
    {
        $this->new_order = $new_order;
        $this->dishes = $dishes;
        $this->currentDateTime = $currentDateTime;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hai un nuovo ordine su Deliveboo!',
        );
    }
    public function build()
    {
        return $this->from('no-reply@deliveboo.it')
                    ->markdown('mail.OrderReceivedNotification');
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
