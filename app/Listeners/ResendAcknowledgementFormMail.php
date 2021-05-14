<?php

namespace App\Listeners;

use App\Mail\ServiceFormSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UnsignedServiceReportFound;
use App\Traits\ServiceReportEmailLoggerTrait;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResendAcknowledgementFormMail
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
     * @param  UnsignedServiceReportFound  $event
     * @return void
     */
    public function handle(UnsignedServiceReportFound $event)
    {
        $serviceReport = $event->serviceReport;
        $email = $serviceReport->customer->email;
        $subject = __('label.service_report.email.resend.plain_subject');

        try {
            Mail::to($email)
                ->queue(new ServiceFormSent($serviceReport));
            
            $this->writeLog('info', $serviceReport, $subject);
        } catch(\Exception $e) {
            $this->writeLog('warning', $serviceReport, $subject, $e->getMessage());
        }
    }
}
