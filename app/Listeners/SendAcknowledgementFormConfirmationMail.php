<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\AcknowledgementFormSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ServiceFormSentConfirmationMail;
use App\Traits\ServiceReportEmailLoggerTrait;

class SendAcknowledgementFormConfirmationMail
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
    public function handle(AcknowledgementFormSent $event)
    {
        $serviceReport = $event->serviceReport;
        $email = $serviceReport->user->email;
        $subject = __('label.service_report.email.confirm.plain_subject');

        try {
            Mail::to($email)
                ->queue(new ServiceFormSentConfirmationMail($serviceReport));

            $this->writeLog('info', $serviceReport, $subject);
        } catch(\Exception $e) {
            $this->writeLog('warning', $serviceReport, $subject, $e->getMessage());
        }
    }
}
