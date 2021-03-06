@component('mail::message')
# {{ __('label.global.email.greeting') . ' ' . $serviceReport->user->name }},

{{ __('label.service_report.email.submitted.message') }}

@component('mail::button', ['url' => route('service.form.show', [$serviceReport->csr_no])])
{{ __('label.service_report.email.submitted.button.view_service_report') }}
@endcomponent

{{ __('label.global.email.closing') }},<br>
{{ config('app.mps_name') }}
@endcomponent
