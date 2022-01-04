<?php

namespace App\Mail;

use App\Models\SalesLead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SalesLeadCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $salesLead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SalesLead $salesLead)
    {
        $this->salesLead = $salesLead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sales_lead.created')
                    ->subject('New Sales Lead Created');
    }
}
