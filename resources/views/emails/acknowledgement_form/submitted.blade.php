@component('mail::message')
# Hi {{ $serviceReport->user->name }},

The customer already submitted the signed service report form. You can click the button to view the details.

@component('mail::button', ['url' => route('service.form.show', [$serviceReport->csr_no])])
View Service Report Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
