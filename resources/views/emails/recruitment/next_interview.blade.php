@component('mail::message')
# Hello {{ $recruitmentData['interviewer'] }},

You have selected as next interviewer to applicant <b>{{ $recruitmentData['name'] }}</b>. Click the button below for more information about this applicant.

@component('mail::button', ['url' => route('recruitment.show',$recruitmentData['submission_id']) ])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
