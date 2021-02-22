@component('mail::message')
# {{ __('label.global.email.greeting') . ' ' . $serviceReport->customer->name }},

{{ __('label.service_report.email.sent.message') }}

@component('mail::button', ['url' => route('service-form.acknowledgment.sign', ['serviceReport' => $serviceReport->id])])
{{ __('label.service_report.email.sent.button.view_details') }}
@endcomponent

{{ __('label.global.email.closing') }},<br>
{{ env('MAIL_SERVICE_REPORT_COMPANY', config('app.name')) }}
@endcomponent
