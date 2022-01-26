@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => 'https://www.mclinkphil.com/'])
McLink Copy Services Phil Inc
@endcomponent
@endslot

{{-- Body --}}
# Hello {{ $salesLead->salesManagerUser->name }},

New Sales Lead created by {{ $salesLead->createdByUser->name }} and you selected as assigner of this lead. Click the button below to view full details.
 
@component('mail::button', ['url' => route('sales_lead.show', ['salesLead' => $salesLead->id])])
Review Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{ config('app.name') }}
@endcomponent
@endslot
@endcomponent