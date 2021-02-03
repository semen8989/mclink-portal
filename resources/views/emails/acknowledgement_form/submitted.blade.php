@component('mail::message')
# Hi {{ $serviceReport->user->name }},

Click the button to view the additional data that the customer submitted.

@component('mail::button', ['url' => route('service.form.index', [])])
View Service Report Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
