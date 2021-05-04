@extends('layout.master')

@inject('Recruitment', 'App\Http\Controllers\RecruitmentController')

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
                    <th scope="row">1</th>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['1'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['1'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['1'],2) }}</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['2'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['2'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['2'],2) }}</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['3'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['3'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['3'],2) }}</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['4'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['4'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['4'],2) }}</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['5'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['5'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['44']['answer']['5'],2) }}</td>
                </tr>
            </tbody>
        </table>
    <p class="guest-form-label font-weight-bold mb-1">Other relatives in similar industry/sector as Mclink</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">Date of birth(dd/mm/yy)</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Employer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['1'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['1'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['1'],2) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['1'],3) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['1'],4) }}</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['2'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['2'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['2'],2) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['2'],3) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['2'],4) }}</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['3'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['3'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['3'],2) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['3'],3) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['3'],4) }}</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['4'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['4'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['4'],2) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['4'],3) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['4'],4) }}</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['5'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['5'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['5'],2) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['5'],3) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['45']['answer']['5'],4) }}</td>
                </tr>
            </tbody>
        </table>
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
        <tbody>
            <tr>
                <th scope="row">Elementary</th>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">Secondary</th>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Secondary'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Secondary'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Secondary'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Secondary'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">Vocational</th>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">University/College</th>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">Post-Graduate</th>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">Other</th>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Other'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Other'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Other'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Other'],3) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<hr class="mb-3">
<div class="px-4">5. Extra-Curricular Activities/Community Service</div>
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
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['1'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['1'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['1'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['1'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['2'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['2'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['2'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['2'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['3'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['3'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['3'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['3'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['4'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['4'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['4'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['4'],3) }}</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['5'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['5'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['5'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['50']['answer']['5'],3) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<hr class="mb-3">
<div class="px-4">6. Membership Details (Are you affiliated to any institution / association / organisation /charity?)</div>
<hr class="mt-3 mb-0">

<div class="card-body">
    <table class="table table-bordered table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Organisation name</th>
            <th scope="col">Role/Position</th>
            <th scope="col">Key/Responsibilities</th>
        </tr>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['1'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['1'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['1'],2) }}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['2'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['2'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['2'],2) }}</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['3'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['3'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['52']['answer']['3'],2) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<hr class="mb-3">
<div class="px-4">7. Educational Background</div>
<hr class="mt-3 mb-0">

<div class="card-body">
    <table class="table table-bordered table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Course</th>
            <th scope="col">School/Institution</th>
            <th scope="col">From(dd/mm/yy)</th>
            <th scope="col">To(dd/mm/yy)</th>
            <th scope="col">Qualification obtained</th>
        </tr>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['1'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['1'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['1'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['1'],3) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['1'],4) }}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['2'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['2'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['2'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['2'],3) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['2'],4) }}</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['3'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['3'],1) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['3'],2) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['3'],3) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['54']['answer']['3'],4) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<hr class="mb-3">
<div class="px-4">8. Other relevant skills</div>
<hr class="mt-3 mb-0">

<div class="card-body">
    <table class="table table-bordered table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Skill</th>
            <th scope="col">Description</th>
        </tr>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['1'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['1'],1) }}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['2'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['2'],1) }}</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['3'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['3'],1) }}</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['4'],0) }}</td>
                <td>{{ $Recruitment->trimAndExplode($details['56']['answer']['4'],1) }}</td>
            </tr>
        </tbody>
    </table>
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
