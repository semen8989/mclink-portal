<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\EmployeeAppraisal;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SharedAppraisalNotifMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appraisal;
    public $sharedUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmployeeAppraisal $appraisal, User $sharedUser)
    {
        $this->appraisal = $appraisal;
        $this->sharedUser = $sharedUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.e_appraisal.sent')
            ->subject(__('label.e_appraisal_my_record.email.new_sent.subject'));
    }
}
