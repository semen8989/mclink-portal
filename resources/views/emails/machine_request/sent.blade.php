@component('mail::message')
# Hello {{ $machineRequest->technician->name }},

You have machine request from {{ $machineRequest->user->name }}. Click the button below to view details

@component('mail::button', ['url' => route('machine_request.request_details', ['machineRequest' => $machineRequest->id])])
Review Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
