<?php

namespace App\Listeners;

use App\Traits\EmailLoggerTrait;
use App\Events\NewAccountCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\SentGeneratedPasswordMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTemporaryPasswordMail
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
    public function handle(NewAccountCreated $event)
    {
        $user = $event->user;
        $password = $event->password;

        $email = $user->email;
        $subject = __('label.auth.email.password_sent.subject');
        
        try { 
            Mail::to($email)
                ->queue(new SentGeneratedPasswordMail($user, $password));

            $this->writeEmailLog('info', $email, $subject);
        } catch(\Exception $e) {
            $this->writeEmailLog('warning', $email, $subject, $e->getMessage());
        }
    }
}
