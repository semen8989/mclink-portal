@component('mail::message')
# Introduction

Submission ID: {{ $recruitmentData['submission_id'] }}
Name: {{ $recruitmentData['name'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
