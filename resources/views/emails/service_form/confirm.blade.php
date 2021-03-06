@component('mail::message')
# {{ __('label.global.email.greeting') . ' ' . $serviceReport->user->name }},

{{ __('label.service_report.email.confirm.message') }}

@component('mail::button', ['url' => route('service.form.show', [$serviceReport->csr_no])])
{{ __('label.service_report.email.confirm.button.view_status') }}
@endcomponent

{{ __('label.global.email.closing') }},<br>
{{ config('app.mps_name') }}
@endcomponent
