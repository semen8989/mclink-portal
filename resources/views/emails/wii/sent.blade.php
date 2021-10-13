@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => 'https://www.mclinkphil.com/'])
McLink Copy Services Phil Inc
@endcomponent
@endslot

{{-- Body --}}
# Hello,

{{ $wii->user->name }} has requested new Wii. Click the button below to view details

@component('mail::button', ['url' => route('wii.show', ['wii' => $wii->id])])
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
