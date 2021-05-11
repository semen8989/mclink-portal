@component('mail::message')
# Hello Kelvin,

Applicant <b>{{ $recruitmentData['name'] }}</b> has been selected for the final interview. Click the button below for more information about this applicant.

@component('mail::button', ['url' => route('recruitment.show',$recruitmentData['submission_id']) ])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
