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

            Log::info('The Service Report Acknowledgment Form email to ' . $email .
                ' was successfully sent.');
        } catch(\Exception $e) {
            Log::warning('There is a problem in sending the Service Report Acknowledgment Form email to ' . 
                $email . '. The error given was: ' . $e->getMessage());
                
        }
    }
}
