<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $new_order;
    public $dishes;
    public $currentDate;
    public $restaurant;

    /**
     * Create a new message instance.
     */
    public function __construct($new_order, $dishes, $currentDate, $restaurant)
    {
        $this->new_order = $new_order;
        $this->dishes = $dishes;
        $this->currentDate = $currentDate;
        $this->restaurant = $restaurant;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Conferma Ordine Deliveboo',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'mail.OrderConfirmation',
    //     );
    // }
    public function build()
    {
        return $this->from('no-reply@deliveboo.it')
                    ->markdown('mail.OrderConfirmation');
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
