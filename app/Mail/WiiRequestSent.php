<?php

namespace App\Mail;

use App\Models\Wii;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WiiRequestSent extends Mailable
{
    use Queueable, SerializesModels;

    public $wii;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Wii $wii)
    {
        $this->wii = $wii;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.wii.sent')
                    ->subject('Wii Request From '.$this->wii->user->name);
    }
}
