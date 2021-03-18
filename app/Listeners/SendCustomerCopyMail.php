<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\AcknowledgementFormSigned;
use App\Mail\ServiceReportCopyReceivedMail;
use App\Traits\ServiceReportEmailLoggerTrait;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCustomerCopyMail
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
    public function handle(AcknowledgementFormSigned $event)
    {
        $serviceReport = $event->serviceReport;
        $email = $serviceReport->customer->email;
        $subject = __('label.service_report.email.receipt.plain_subject');

        try {
            Mail::to($email)
                ->queue(new ServiceReportCopyReceivedMail($serviceReport));

            $this->writeLog('info', $serviceReport, $subject);
        } catch(\Exception $e) {
            $this->writeLog('warning', $serviceReport, $subject, $e->getMessage());
        }   
    }
}
