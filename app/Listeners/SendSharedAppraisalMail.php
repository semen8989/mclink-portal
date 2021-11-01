<?php

namespace App\Listeners;

use App\Events\AppraisalCreated;
use App\Traits\EmailLoggerTrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\SharedAppraisalNotifMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSharedAppraisalMail
{
    use EmailLoggerTrait;
    
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
    public function handle(AppraisalCreated $event)
    {
        $appraisal = $event->appraisal;

        foreach ($appraisal->sharedUsers as $sharedUser) {
            $email = $sharedUser->email;
            $subject = __('label.e_appraisal_my_record.email.new_sent.plain_subject');

            try {     
                Mail::to($email)
                    ->queue(new SharedAppraisalNotifMail($appraisal, $sharedUser));
    
                $this->writeEmailLog('info', $email, $subject);
            } catch(\Exception $e) {
                $this->writeEmailLog('warning', $email, $subject, $e->getMessage());
            }
        }
    }
}
