@component('mail::message')
# {{ __('label.global.email.greeting') . ' ' . $serviceReport->user->name }},

{{ __('label.service_report.email.submitted.message') }}

@component('mail::button', ['url' => route('service-forms.show', [$serviceReport->csr_no])])
{{ __('label.service_report.email.submitted.button.view_service_report') }}
@endcomponent

{{ __('label.global.email.closing') }},<br>
{{ env('MAIL_SERVICE_REPORT_COMPANY', config('app.name')) }}
@endcomponent
