<?php

namespace App\Events;

use App\Models\EmployeeAppraisal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AppraisalCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The employee appraisal instance.
     *
     * @var \App\Models\EmployeeAppraisal
     */
    public $appraisal;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EmployeeAppraisal $appraisal)
    {
        $this->appraisal = $appraisal;
    }
}
