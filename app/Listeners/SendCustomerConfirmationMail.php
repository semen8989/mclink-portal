<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\AcknowledgementFormSigned;
use App\Mail\AcknowledgmentFormSubmitted;
use App\Traits\ServiceReportEmailLoggerTrait;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCustomerConfirmationMail
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
     * @param  AcknowledgementFormSigned  $event
     * @return void
     */
    public function handle(AcknowledgementFormSigned $event)
    {
        $serviceReport = $event->serviceReport;
        $email = $serviceReport->user->email;
        $subject = __('label.service_report.email.submitted.plain_subject');

        try {
            Mail::to($email)
                ->queue(new AcknowledgmentFormSubmitted($serviceReport));

            $this->writeLog('info', $serviceReport, $subject);
        } catch(\Exception $e) {
            $this->writeLog('warning', $serviceReport, $subject, $e->getMessage());
        }
    }
}
