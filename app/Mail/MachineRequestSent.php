<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\MachineRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MachineRequestSent extends Mailable
{
    use Queueable, SerializesModels;

    public $machineRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MachineRequest $machineRequest)
    {
        $this->machineRequest = $machineRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.machine_request.sent')
                    ->subject('Machine Request');
    }
}
