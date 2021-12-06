<?php

namespace App\Listeners;

use App\Mail\ServiceFormSent;
use Illuminate\Support\Facades\Mail;
use App\Events\AcknowledgementFormSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Traits\ServiceReportEmailLoggerTrait;

class SendAcknowledgementFormMail
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
     * @param  AcknowledgementFormSent  $event
     * @return void
     */
    public function handle(AcknowledgementFormSent $event)
    {
        $serviceReport = $event->serviceReport;
        $email = $serviceReport->customer->email;
        $subject = __('label.service_report.email.sent.plain_subject');

        try {
            Mail::to($email)
            ->queue(new ServiceFormSent($serviceReport));

            $this->writeLog('info', $serviceReport, $subject);
        } catch(\Exception $e) {
            $this->writeLog('warning', $serviceReport, $subject, $e->getMessage());
        }
    }
}
