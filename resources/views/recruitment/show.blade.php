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
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['17']['answer'])) ? $details['17']['answer'] : '---' }}
                </p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">ID No. / Passport No.</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['18']['answer'])) ? $details['18']['answer'] : '---' }}
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
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['20']['answer'])) ? $details['20']['answer'] : '---' }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Country of Birth</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['21']['answer'])) ? $details['21']['answer'] : '---' }}
                </p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Nationality</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['22']['answer'])) ? $details['22']['answer'] : '---' }}
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
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['26']['answer'])) ? $details['26']['answer'] : '---' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Home Address</p>
                <p class="guest-form-data mb-4">{{ $details['27']['answer'] }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Mailing Address</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['128']['answer'])) ? $details['128']['answer'] : '---' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Email</p>
                <p class="guest-form-data mb-4">{{ $details['28']['answer'] }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Home Telephone</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['29']['prettyFormat'])) ? $details['29']['prettyFormat'] : '---' }}
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
                    <td class="font-weight-bold">{{ $details['33']['answer']['Bahasa Melayu'] == "Basic" ? '✓' : '' }}
                    </td>
                    <td class="font-weight-bold">{{ $details['33']['answer']['Bahasa Melayu'] == "Fluent" ? '✓' : '' }}
                    </td>
                    <td class="font-weight-bold">{{ $details['33']['answer']['Bahasa Melayu'] == "N/A" ? '✓' : '' }}
                    </td>
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
                    <td class="font-weight-bold">{{ $details['34']['answer']['Bahasa Melayu'] == "Basic" ? '✓' : '' }}
                    </td>
                    <td class="font-weight-bold">{{ $details['34']['answer']['Bahasa Melayu'] == "Fluent" ? '✓' : '' }}
                    </td>
                    <td class="font-weight-bold">{{ $details['34']['answer']['Bahasa Melayu'] == "N/A" ? '✓' : '' }}
                    </td>
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
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['37']['answer'])) ? $details['37']['answer'] : '---' }}
                </p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Age</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['38']['answer'])) ? $details['38']['answer'] : '---' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">ID No. / Password No.</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['39']['answer'])) ? $details['39']['answer'] : '---' }}
                </p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Occupation</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['40']['answer'])) ? $details['40']['answer'] : '---' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Contact Number</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['41']['answer'])) ? $details['41']['answer'] : '---' }}
                </p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Employer</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['42']['answer'])) ? $details['42']['answer'] : '---' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Number of Children</p>
                <p class="guest-form-data mb-4">
                    {{ (!empty($details['43']['answer'])) ? $details['43']['answer'] : '---' }}
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
                <th scope="col">Name</th>
                <th scope="col">Institution</th>
                <th scope="col">Role/Position</th>
                <th scope="col">Key responsibilities</th>
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
    <div class="px-4">6. Membership Details (Are you affiliated to any institution / association / organisation
        /charity?)</div>
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
        <p class="guest-form-label font-weight-bold mb-1">Employment History (1 of 5)</p>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>Period of Employment</th>
                    <td>{{$details['62']['answer'] }}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ $details['61']['answer'] }}</td>
                </tr>
                <tr>
                    <th>Position Held</th>
                    <td>{{ $details['63']['answer'] }}</td>
                </tr>
                <tr>
                    <th>Basic Monthly Salary</th>
                    <td>{{ $details['64']['answer'] }}</td>
                </tr>
                <tr>
                    <th>Reason for Leaving</th>
                    <td>{{ $details['65']['answer'] }}</td>
                </tr>
                <tr>
                    <th>Responsibilities</th>
                    <td>{!! $details['66']['answer'] !!}</td>
                </tr>
                <tr>
                    <th>What did you enjoy most while working in this company</th>
                    <td>{{ (!empty($details['67']['answer'])) ? $details['67']['answer'] : '---' }}</td>
                </tr>
            </tbody>
        </table>
        <p class="guest-form-label font-weight-bold mb-1">Employment History (2 of 5)</p>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>Period of Employment</th>
                    <td>{{ (!empty($details['70']['answer'])) ? $details['70']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ (!empty($details['71']['answer'])) ? $details['71']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Position Held</th>
                    <td>{{ (!empty($details['72']['answer'])) ? $details['72']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Basic Monthly Salary</th>
                    <td>{{ (!empty($details['73']['answer'])) ? $details['73']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Reason for Leaving</th>
                    <td>{{ (!empty($details['74']['answer'])) ? $details['74']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Responsibilities</th>
                    <td>
                        @if(!empty($details['75']['answer']))
                            {!! $details['75']['answer'] !!}
                        @else
                            ---
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>What did you enjoy most while working in this company</th>
                    <td>{{ (!empty($details['76']['answer'])) ? $details['76']['answer'] : '---' }}</td>
                </tr>
            </tbody>
        </table>
        <p class="guest-form-label font-weight-bold mb-1">Employment History (3 of 5)</p>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>Period of Employment</th>
                    <td>{{ (!empty($details['78']['answer'])) ? $details['78']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ (!empty($details['79']['answer'])) ? $details['79']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Position Held</th>
                    <td>{{ (!empty($details['80']['answer'])) ? $details['80']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Basic Monthly Salary</th>
                    <td>{{ (!empty($details['81']['answer'])) ? $details['81']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Reason for Leaving</th>
                    <td>{{ (!empty($details['82']['answer'])) ? $details['82']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Responsibilities</th>
                    <td>
                        @if(!empty($details['83']['answer']))
                            {!! $details['83']['answer'] !!}
                        @else
                            ---
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>What did you enjoy most while working in this company</th>
                    <td>{{ (!empty($details['84']['answer'])) ? $details['84']['answer'] : '---' }}</td>
                </tr>
            </tbody>
        </table>
        <p class="guest-form-label font-weight-bold mb-1">Employment History (4 of 5)</p>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>Period of Employment</th>
                    <td>{{ (!empty($details['88']['answer'])) ? $details['88']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ (!empty($details['89']['answer'])) ? $details['89']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Position Held</th>
                    <td>{{ (!empty($details['90']['answer'])) ? $details['90']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Basic Monthly Salary</th>
                    <td>{{ (!empty($details['91']['answer'])) ? $details['91']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Reason for Leaving</th>
                    <td>{{ (!empty($details['92']['answer'])) ? $details['92']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Responsibilities</th>
                    <td>
                        @if(!empty($details['93']['answer']))
                            {!! $details['93']['answer'] !!}
                        @else
                            ---
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>What did you enjoy most while working in this company</th>
                    <td>{{ (!empty($details['94']['answer'])) ? $details['94']['answer'] : '---' }}</td>
                </tr>
            </tbody>
        </table>
        <p class="guest-form-label font-weight-bold mb-1">Employment History (5 of 5)</p>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>Period of Employment</th>
                    <td>{{ (!empty($details['133']['answer'])) ? $details['133']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ (!empty($details['134']['answer'])) ? $details['134']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Position Held</th>
                    <td>{{ (!empty($details['135']['answer'])) ? $details['135']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Basic Monthly Salary</th>
                    <td>{{ (!empty($details['136']['answer'])) ? $details['136']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Reason for Leaving</th>
                    <td>{{ (!empty($details['137']['answer'])) ? $details['137']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th>Responsibilities</th>
                    <td>
                        @if(!empty($details['138']['answer']))
                            {!! $details['138']['answer'] !!}
                        @else
                            ---
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>What did you enjoy most while working in this company</th>
                    <td>{{ (!empty($details['139']['answer'])) ? $details['139']['answer'] : '---' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mb-3">
    <div class="px-4">10. References</div>
    <hr class="mt-3 mb-0">

    <div class="card-body">
        <p class="guest-form-label font-weight-bold mb-1">References</p>
        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Contact no.</th>
                <th scope="col">Occupation</th>
                <th scope="col">Company Name</th>
            </tr>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['1'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['1'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['1'],2) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['1'],3) }}</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['2'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['2'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['2'],2) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['97']['answer']['2'],3) }}</td>
                </tr>
            </tbody>
        </table>

        <p class="guest-form-label font-weight-bold mb-1">Person to contact in-case of emergencies</p>
        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Contact no.</th>
                <th scope="col">relationship</th>
            </tr>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $Recruitment->trimAndExplode($details['98']['answer']['1.'],0) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['98']['answer']['1.'],1) }}</td>
                    <td>{{ $Recruitment->trimAndExplode($details['98']['answer']['1.'],2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mb-3">
    <div class="px-4">11. Other Information</div>
    <hr class="mt-3 mb-0">

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">If yes, please specify</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1. Have you suffered, or are suffering from any medical condition, illness, disease, mental illness, substance dependence or physical impairment?</th>
                    <td>{{ (!empty($details['125']['answer'])) ? $details['125']['answer'] : '---' }}</td>
                    <td>{{ (!empty($details['126']['answer'])) ? $details['126']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">2a. Do you have any existing criminal records?</th>
                    <td>{{ (!empty($details['104']['answer'])) ? $details['104']['answer'] : '---' }}</td>
                    <td>{{ (!empty($details['103']['answer'])) ? $details['103']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">2b. Have you been charged with any offence in a court of law or in any other country for which the outcome is pending (excluding parking offences)?</th>
                    <td>{{ (!empty($details['105']['answer'])) ? $details['105']['answer'] : '---' }}</td>
                    <td>{{ (!empty($details['106']['answer'])) ? $details['106']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">3. Have you been charged with any offence in a court of law or in any other country for which the outcome is pending (excluding parking offences)?</th>
                    <td>{{ (!empty($details['107']['answer'])) ? $details['107']['answer'] : '---' }}</td>
                    <td>{{ (!empty($details['108']['answer'])) ? $details['108']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">4. Are you aware of being under any current police investigations or in any other country following allegations made against you?</th>
                    <td>{{ (!empty($details['109']['answer'])) ? $details['109']['answer'] : '---' }}</td>
                    <td>{{ (!empty($details['110']['answer'])) ? $details['110']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">5. Have you been or are you under any financial embarrassment i.e. (a) an undischarged bankrupt, (b) a judgement debtor, (c) have unsecured debts and liabilities of more than 3 months of last-drawn pay, (d) have signed a promissory note or an acknowledgement of indebtedness?</th>
                    <td>{{ (!empty($details['111']['answer'])) ? $details['111']['answer'] : '---' }}</td>
                    <td>{{ (!empty($details['112']['answer'])) ? $details['112']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">6. Has your employment ever been terminated as a result of misconduct of service?</th>
                    <td>{{ (!empty($details['113']['answer'])) ? $details['113']['answer'] : '---' }}</td>
                    <td>{{ (!empty($details['114']['answer'])) ? $details['114']['answer'] : '---' }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">7. In the event where you have successfully passed the job interview(s) and received a job offer from us, when is the earliest date that you will be available to start work?</th>
                    <td>{{ (!empty($details['115']['prettyFormat'])) ? $details['115']['prettyFormat'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">8. What is your personal strength?</th>
                    <td>{{ (!empty($details['116']['answer'])) ? $details['116']['answer'] : '---' }}</td>
                </tr>
                <tr>
                    <th scope="row">9. List your hobbies</th>
                    <td>{{ (!empty($details['117']['answer'])) ? $details['117']['answer'] : '---' }}</td>
                </tr>
            </tbody>
        </table>
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
