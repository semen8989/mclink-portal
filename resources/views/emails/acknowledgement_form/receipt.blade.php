@component('mail::message')
# {{ __('label.global.email.greeting') . ' ' . $serviceReport->customer->name }},

{{ __('label.service_report.email.receipt.message') }}

{{ __('label.global.email.closing') }},<br>
{{ config('app.name') }}
@endcomponent
