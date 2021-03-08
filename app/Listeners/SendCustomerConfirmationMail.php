<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\AcknowledgementFormSigned;
use App\Mail\AcknowledgmentFormSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCustomerConfirmationMail
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
     * @param  AcknowledgementFormSigned  $event
     * @return void
     */
    public function handle(AcknowledgementFormSigned $event)
    {
        $serviceReport = $event->serviceReport;
        $email = $serviceReport->user->email;

        try {
            Mail::to($email)
                ->queue(new AcknowledgmentFormSubmitted($serviceReport));

            Log::info(__('label.service_report.email.log.general.success', [
                'subject' => __('label.service_report.email.submitted.plain_subject'), 
                'email' => $email
            ]));
        } catch(\Exception $e) {
            Log::warning(__('label.service_report.email.log.general.fail', [
                'subject' => __('label.service_report.email.submitted.plain_subject'), 
                'email' => $email,
                'error' => $e->getMessage()
            ]));  
        }
    }
}
