<?php

namespace App\Events;

use App\Models\ServiceReport;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AcknowledgementFormSigned
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The service report instance.
     *
     * @var \App\Models\ServiceReport
     */
    public $serviceReport;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ServiceReport $serviceReport)
    {
        $this->serviceReport = $serviceReport;
    }
}
