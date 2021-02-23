@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url') . 'service-forms'])
            {{ env('MAIL_SERVICE_REPORT_COMPANY', config('app.name')) }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

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
            © {{ date('Y') }} {{ env('MAIL_SERVICE_REPORT_COMPANY', config('app.name')) }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
