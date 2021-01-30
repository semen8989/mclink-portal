@component('mail::message')
# Hi {{ $serviceReport->user->name }},

Follow the link to sign the acknowledgment form.

@component('mail::button', ['url' => route('service.form.acknowledgment', ['uuid' => $serviceReport->id])])
View Details and Sign
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
