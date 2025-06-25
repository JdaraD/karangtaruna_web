<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BantuanMasuk extends Mailable
{
    use Queueable, SerializesModels;

    public $bantuan;
    public $kami;
    public function __construct($bantuan, $kami)
    {
        $this->bantuan = $bantuan;
        $this->kami = $kami;
    }

    public function build()
    {
        $email = $this->subject('Pengajuan Bantuan Baru')
                    ->view('emails.bantuan')
                    ->with([
                        'bantuan' => $this->bantuan,
                        'kami' => $this->kami,
                    ]);

        return $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bantuan Masuk',
        );
    }

    /**
     * Get the message content definition.
     */
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
