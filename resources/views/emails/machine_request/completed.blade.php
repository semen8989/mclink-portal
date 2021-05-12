@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => 'https://www.mclinkphil.com/'])
McLink Copy Services Phil Inc
@endcomponent
@endslot

{{-- Body --}}
# Hello {{ $machineRequest->user->name }},

Your machine request has been completed. You may view the details by clicking the button below.

@component('mail::button', ['url' => route('machine_request.completed', ['machineRequest' => $machineRequest->id])])
View Details
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
