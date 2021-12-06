@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => 'https://www.mclinkphil.com/'])
McLink Copy Services Phil Inc
@endcomponent
@endslot

{{-- Body --}}
# Hello {{ $machineRequest->technician->name }},

You have machine request from {{ $machineRequest->user->name }}. Click the button below to view details

@component('mail::button', ['url' => route('machine_request.request_details', ['machineRequest' => $machineRequest->id])])
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
