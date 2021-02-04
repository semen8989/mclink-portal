@component('mail::message')
# Hi {{ $serviceReport->customer->name }},

Click the button to sign the acknowledgment form.

@component('mail::button', ['url' => route('service.form.acknowledgment.create', ['serviceReport' => $serviceReport->id])])
View Details and Sign
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
