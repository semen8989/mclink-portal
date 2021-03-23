@component('mail::message')
# Hello {{ $machineRequest->technician->name }},

You have machine request from {{ $machineRequest->user->name }}. Click this button below to view details

@component('mail::button', ['url' => route('machine_request.show', ['machineRequest' => $machineRequest->id])])
Review Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
