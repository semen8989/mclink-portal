<?php

namespace App\Listeners;

use App\Traits\EmailLoggerTrait;
use Illuminate\Support\Facades\Mail;
use App\Events\TwoFactorTokenGenerated;
use App\Mail\SentGeneratedTwoFactorMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewTokenGeneratedMail
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
    public function handle(TwoFactorTokenGenerated $event)
    {
        $user = $event->user;
        $token = $event->token;

        $email = $user->email;
        $subject = __('label.auth.email.otp_sent.subject');
        
        try { 
            Mail::to($email)
                ->queue(new SentGeneratedTwoFactorMail($user, $token));

            $this->writeEmailLog('info', $email, $subject);
        } catch(\Exception $e) {
            $this->writeEmailLog('warning', $email, $subject, $e->getMessage());
        }
    }
}
