@component('mail::message')
# Hello {{ $machineRequest->user->name }},

Your machine request has been completed. You may view the details by clicking the button below.

@component('mail::button', ['url' => route('machine_request.completed', ['machineRequest' => $machineRequest->id])])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
