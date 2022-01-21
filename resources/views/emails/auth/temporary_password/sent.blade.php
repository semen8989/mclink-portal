@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.mclink_ph_url')])
{{ config('app.mclink_ph_name') }}
@endcomponent
@endslot

{{-- Body --}}
# {{ __('label.global.email.greeting') . ' ' . $user->name }},

<h2>{{ __('label.auth.email.password_sent.message_header') }}</h2>

{{ __('label.auth.email.password_sent.message_subheader') }}<br>
{{ $password }} 

{{ __('label.auth.email.password_sent.message_notice') }}

{{ __('label.global.email.closing') }},<br>
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
© {{ date('Y') . ' ' . config('app.mclink_ph_name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent