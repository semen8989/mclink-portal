<?php

namespace App\Mail;

use App\Models\ServiceReport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcknowledgmentFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The service report instance.
     *
     * @var \App\Models\ServiceReport
     */
    public $serviceReport;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ServiceReport $serviceReport)
    {
        $this->serviceReport = $serviceReport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.acknowledgement_form.submitted')
            ->subject('Service Report Customer Acknowledgement | MPS Solutions');
    }
}
