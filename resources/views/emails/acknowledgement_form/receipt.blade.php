@component('mail::message')
# Hi {{ $serviceReport->customer->name }},

Thank you for submitting the signed acknowledgment form. Attached is your copy of service report in PDF format.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
