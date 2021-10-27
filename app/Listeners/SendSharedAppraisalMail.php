<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\AcknowledgementFormSent;
use App\Events\AppraisalCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ServiceFormSentConfirmationMail;
use App\Traits\ServiceReportEmailLoggerTrait;

class SendSharedAppraisalMail
{
    use ServiceReportEmailLoggerTrait;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AppraisalCreated $event)
    {
        $appraisal = $event->appraisal;
        dd($appraisal->users());
        $email = $appraisal->user->email;
        $subject = __('label.service_report.email.confirm.plain_subject');

        try {
            // Mail::to($email)
            //     ->queue(new ServiceFormSentConfirmationMail($appraisal));

            $this->writeLog('info', $appraisal, $subject);
        } catch(\Exception $e) {
            $this->writeLog('warning', $appraisal, $subject, $e->getMessage());
        }
    }
}
