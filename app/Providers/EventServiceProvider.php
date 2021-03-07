<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\AcknowledgementFormSent;
use App\Listeners\SendCustomerCopyMail;
use App\Events\AcknowledgementFormSigned;
use App\Listeners\SendAcknowledgementFormMail;
use App\Listeners\SendCustomerConfirmationMail;
use App\Listeners\SendAcknowledgementFormConfirmationMail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AcknowledgementFormSent::class => [
            SendAcknowledgementFormMail::class,
            SendAcknowledgementFormConfirmationMail::class,
        ],
        AcknowledgementFormSigned::class => [
            SendCustomerCopyMail::class,
            SendCustomerConfirmationMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
