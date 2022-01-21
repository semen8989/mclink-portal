<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecruitmentNextInterviewer extends Mailable
{
    use Queueable, SerializesModels;

    public $recruitmentData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recruitmentData)
    {
        $this->recruitmentData = $recruitmentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.recruitment.next_interview')
                    ->subject('Next Interview');
    }
}
