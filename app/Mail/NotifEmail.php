<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subjek, $konten;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subjek, $konten)
    {
        //
        $this->subjek = $subjek;
        $this->konten = $konten;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), env('MAIL_NAME'))
                    ->subject($this->subjek)
                    ->view('isi-email', $this->konten);
    }
}
