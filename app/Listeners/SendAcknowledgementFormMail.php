<?php

namespace App\Listeners;

use App\Mail\ServiceFormSent;
use App\Models\ServiceReport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Events\AcknowledgementFormSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ServiceFormSentConfirmationMail;

class SendAcknowledgementFormMail
{
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

        try {
            Mail::to($email)
            ->queue(new ServiceFormSent($serviceReport));

            Log::info(__('label.service_report.email.log.general.success', [
                'subject' => __('label.service_report.email.sent.plain_subject'), 
                'email' => $email
            ]));
        } catch(\Exception $e) {
            Log::warning(__('label.service_report.email.log.general.fail', [
                'subject' => __('label.service_report.email.sent.plain_subject'), 
                'email' => $email,
                'error' => $e->getMessage()
            ]));
        }
    }
}
