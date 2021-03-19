@component('mail::message')
# Hello {{ $machineRequest->technician->name }},

You have machine request from {{ $machineRequest->user->name }}. Please review the details and confirm by clicking the button below.

@component('mail::button', ['url' => route('machine_request.confirm', ['machineRequest' => $machineRequest->id])])
Review and Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
