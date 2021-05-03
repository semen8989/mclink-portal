@extends('layout.master')

@section('content')
<div class="card-header">1. Personal Particulars</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Name</p>
            <p class="guest-form-data mb-4">
                {{ $details['15']['answer']['first'] ." ". $details['15']['answer']['last'] }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Gender</p>
            <p class="guest-form-data mb-4">{{ $details['16']['answer'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Religion</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['17']['answer'])) ? $details['17']['answer'] : '---' }}
            </p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">ID No. / Passport No.</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['18']['answer'])) ? $details['18']['answer'] : '---' }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Date of Birth</p>
            <p class="guest-form-data mb-4">
                {{ (!empty($details['19']['prettyFormat'])) ? $details['19']['prettyFormat'] : '---' }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Age</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['20']['answer'])) ? $details['20']['answer'] : '---' }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Country of Birth</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['21']['answer'])) ? $details['21']['answer'] : '---' }}
            </p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Nationality</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['22']['answer'])) ? $details['22']['answer'] : '---' }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Permanent Residence</p>
            <p class="guest-form-data mb-4">{{ $details['24']['answer'] }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Marital Status</p>
            <p class="guest-form-data mb-4">{{ $details['25']['answer'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Driving License</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['26']['answer'])) ? $details['26']['answer'] : '---' }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Home Address</p>
            <p class="guest-form-data mb-4">{{ $details['27']['answer'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Mailing Address</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['128']['answer'])) ? $details['128']['answer'] : '---' }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Email</p>
            <p class="guest-form-data mb-4">{{ $details['28']['answer'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Home Telephone</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['29']['prettyFormat'])) ? $details['29']['prettyFormat'] : '---' }}
            </p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Mobile Phone</p>
            <p class="guest-form-data mb-4">{{ $details['30']['prettyFormat'] }}</p>
        </div>
    </div>
</div>

<hr class="mb-3">
<div class="px-4">2. Languages / Dialects Proficiency</div>
<hr class="mt-3 mb-0">

<div class="card-body">
    <p class="guest-form-label font-weight-bold mb-1">A. Written</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Basic</th>
                <th scope="col">Fluent</th>
                <th scope="col">N/A</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">English</th>
                <td class="font-weight-bold">{{ $details['33']['answer']['English'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['English'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['English'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Mandarin</th>
                <td class="font-weight-bold">{{ $details['33']['answer']['Mandarin'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Mandarin'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Mandarin'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Tagalog</th>
                <td class="font-weight-bold">{{ $details['33']['answer']['Tagalog'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Tagalog'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Tagalog'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Bahasa Melayu</th>
                <td class="font-weight-bold">{{ $details['33']['answer']['Bahasa Melayu'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Bahasa Melayu'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Bahasa Melayu'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Others</th>
                <td class="font-weight-bold">{{ $details['33']['answer']['Others'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Others'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['33']['answer']['Others'] == "N/A" ? '✓' : '' }}</td>
            </tr>
        </tbody>
    </table>
    <p class="guest-form-label font-weight-bold mb-1">B. Spoken</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Basic</th>
                <th scope="col">Fluent</th>
                <th scope="col">N/A</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">English</th>
                <td class="font-weight-bold">{{ $details['34']['answer']['English'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['English'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['English'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Mandarin</th>
                <td class="font-weight-bold">{{ $details['34']['answer']['Mandarin'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Mandarin'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Mandarin'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Tagalog</th>
                <td class="font-weight-bold">{{ $details['34']['answer']['Tagalog'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Tagalog'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Tagalog'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Bahasa Melayu</th>
                <td class="font-weight-bold">{{ $details['34']['answer']['Bahasa Melayu'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Bahasa Melayu'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Bahasa Melayu'] == "N/A" ? '✓' : '' }}</td>
            </tr>
            <tr>
                <th scope="row">Others</th>
                <td class="font-weight-bold">{{ $details['34']['answer']['Others'] == "Basic" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Others'] == "Fluent" ? '✓' : '' }}</td>
                <td class="font-weight-bold">{{ $details['34']['answer']['Others'] == "N/A" ? '✓' : '' }}</td>
            </tr>
        </tbody>
    </table>
</div>

<hr class="mb-3">
<div class="px-4">3. Family Particulars</div>
<hr class="mt-3 mb-0">

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Name of Spouse</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['37']['answer'])) ? $details['37']['answer'] : '---' }}
            </p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Age</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['38']['answer'])) ? $details['38']['answer'] : '---' }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">ID No. / Password No.</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['39']['answer'])) ? $details['39']['answer'] : '---' }}
            </p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Occupation</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['40']['answer'])) ? $details['40']['answer'] : '---' }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Contact Number</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['41']['answer'])) ? $details['41']['answer'] : '---' }}
            </p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Employer</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['42']['answer'])) ? $details['42']['answer'] : '---' }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Number of Children</p>
            <p class="guest-form-data mb-4">{{ (!empty($details['43']['answer'])) ? $details['43']['answer'] : '---' }}
            </p>
        </div>
    </div>
    <p class="guest-form-label font-weight-bold mb-1">Children</p>
    @if(ctype_alpha($details['44']['answer']))
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of Birth</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    @else
        ---
    @endif
</div>

<hr class="mb-3">
<div class="px-4">4. Educational Details</div>
<hr class="mt-3 mb-0">

<div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col"></th>
                <th scope="col">Name of School/Institution (fill in where applicable)</th>
                <th scope="col">From(mm/dd/yy)</th>
                <th scope="col">To(mm/dd/yy)</th>
                <th scope="col">Highest Qualification Obtained</th>
            </tr>
            @php
                $trim_data = trim($details['48']['answer']['Elementary'],'[]');
                $element = explode(",",$trim_data);
            @endphp
            <tbody>
                <tr>
                    <th scope="row">Elementary</th>
                    <td>{{ trim($element[0],'""') }}</td>
                    <td>{{ trim($element[1],'""') }}</td>
                    <td>{{ trim($element[2],'""') }}</td>
                    <td>{{ trim($element[3],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">Secondary</th>
                    
                </tr>
                <tr>
                    <th scope="row">Vocational</th>
                    
                </tr>
                <tr>
                    <th scope="row">University/College</th>
                    
                </tr>
                <tr>
                    <th scope="row">Post-Graduate</th>
                </tr>
                <tr>
                    <th scope="row">Other</th>
                </tr>
            </tbody>
        </table>

</div>

<hr class="mb-3">
<div class="px-4">5. Extra-Curricular Activities/Community Service</div>
<hr class="mt-3 mb-0">

<div class="card-body">
   
</div>

<hr class="mb-3">
<div class="px-4">6. Membership Details</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<hr class="mb-3">
<div class="px-4">7. Educational Background</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<hr class="mb-3">
<div class="px-4">8. Other relevant skills</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<hr class="mb-3">
<div class="px-4">9. Employment History (5 Most Recent Employment)</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<hr class="mb-3">
<div class="px-4">10. References</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<hr class="mb-3">
<div class="px-4">11. Other Information</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<hr class="mb-3">
<div class="px-4">13. Upload files</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<hr class="mb-3">
<div class="px-4">14. Declaration</div>
<hr class="mt-3 mb-0">

<div class="card-body">

</div>

<div class="card-footer text-right">
    <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('recruitment.index') }}">
        <svg class="c-icon">
            <use xlink:href="http://mclink-portal.test/assets/icons/sprites/free.svg#cil-arrow-circle-left"></use>
        </svg>
        Back
    </a>
</div>
@stop
