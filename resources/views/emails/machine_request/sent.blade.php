@component('mail::message')
# Introduction

You have machine request from {Insert Name Here}, Please review the details and confirm by clicking the button below.

@component('mail::button', ['url' => ''])
Review and Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
