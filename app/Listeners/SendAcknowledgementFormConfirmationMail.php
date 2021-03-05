<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Events\AcknowledgementFormSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ServiceFormSentConfirmationMail;

class SendAcknowledgementFormConfirmationMail
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
     * @param  object  $event
     * @return void
     */
    public function handle(AcknowledgementFormSent $event)
    {
        $serviceReport = $event->serviceReport;
        $email = $serviceReport->user->email;

        try {
            Mail::to($email)
                ->queue(new ServiceFormSentConfirmationMail($serviceReport));

            Log::info(__('label.service_report.email.log.general.success', [
                'subject' => __('label.service_report.email.confirm.plain_subject'), 
                'email' => $email
            ]));
        } catch(\Exception $e) {
            Log::warning(__('label.service_report.email.log.general.fail', [
                'subject' => __('label.service_report.email.confirm.plain_subject'), 
                'email' => $email,
                'error' => $e->getMessage()
            ]));
        }
    }
}
