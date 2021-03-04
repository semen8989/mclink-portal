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

            Log::info('The Service Report Customer Acknowledgement email to ' . $email .
                ' was successfully sent.');
        } catch(\Exception $e) {
            Log::warning('There is a problem in sending the Service Report Customer Acknowledgement email to ' . 
                $email . '. The error given was: ' . $e->getMessage());
        }
    }
}
