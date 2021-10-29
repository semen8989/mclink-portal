@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.mclink_ph_url')])
{{ config('app.mclink_ph_name') }}
@endcomponent
@endslot

{{-- Body --}}
# {{ __('label.global.email.greeting') . ' ' . $sharedUser->name }},

{{ __('label.e_appraisal_my_record.email.new_sent.message', ['sender' => $appraisal->user->name, 'employee' => $appraisal->employee->name]) }}

@component('mail::button', ['url' => route('appraisal.my.record.new.employee.show', ['newEmployee' => $appraisal->id])])
{{ __('label.e_appraisal_my_record.email.new_sent.button.view_details') }}
@endcomponent

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
