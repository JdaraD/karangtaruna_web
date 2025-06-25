<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class PengajuanMasuk extends Mailable
{
    use Queueable, SerializesModels;

    public $pengajuan;
    public $kami;
    public function __construct($pengajuan, $kami)
    {
        $this->pengajuan = $pengajuan;
        $this->kami = $kami;
    }

    public function build()
    {
        $email = $this->subject('Pengajuan Kegiatan Baru')
            ->view('emails.pengajuan')
            ->with([
                'pengajuan' => $this->pengajuan,
                'kami' => $this->kami,
            ]);

        if ($this->pengajuan->file_path && Storage::disk('public')->exists($this->pengajuan->file_path)) {
            $mime = mime_content_type(Storage::disk('public')->path($this->pengajuan->file_path));

            $email->attachFromStorageDisk(
                'public',
                $this->pengajuan->file_path,
                basename($this->pengajuan->file_path),
                [
                    'mime' => $mime,
                ]
            );
        }

        return $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan Masuk',
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
