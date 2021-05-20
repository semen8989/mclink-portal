@extends('layout.master')

@inject('Recruitment', 'App\Http\Controllers\RecruitmentController')

@section('content')
<div class="card-header">Applicant Information</div>
<div class="card-body">
    <table class="table table-striped table-bordered" style="table-layout: fixed;">
        <tbody>
            <tr>
                <th>Position Applying For</th>
                <td>{{ $details['11']['answer'] }}</td>
            </tr>
            <tr>
                <th>Expected Salary</th>
                <td>{{ $details['12']['answer'] }}</td>
            </tr>
        </tbody>
    </table>
    <div class="accordion" id="accordion" role="tablist">
        <div class="card mb-0">
            <div class="card-header" id="headingOne" role="tab">
                <h5 class="mb-0"><a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">1. Personal Particulars</a></h5>
            </div>
            <div class="collapse" id="collapseOne" role="tabpanel" aria-labelledby="headingOne"
                data-parent="#accordion">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">
                            {{ $details['15']['answer']['first'] ." ". $details['15']['answer']['last'] }}</dd>

                        <dt class="col-sm-3">Gender</dt>
                        <dd class="col-sm-9">{{ $details['16']['answer'] }}</dd>

                        <dt class="col-sm-3">Religion</dt>
                        <dd class="col-sm-9">{{ (!empty($details['17']['answer'])) ? $details['17']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">ID No. / Passport No.</dt>
                        <dd class="col-sm-9">{{ (!empty($details['18']['answer'])) ? $details['18']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Date of Birth(DD/MM/YYYY)</dt>
                        <dd class="col-sm-9">
                            {{ (!empty($details['19']['answer'])) ? $details['19']['prettyFormat'] : '---' }}</dd>

                        <dt class="col-sm-3">Age</dt>
                        <dd class="col-sm-9">{{ (!empty($details['20']['answer'])) ? $details['20']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Country of Birth</dt>
                        <dd class="col-sm-9">{{ (!empty($details['21']['answer'])) ? $details['21']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Nationality</dt>
                        <dd class="col-sm-9">{{ (!empty($details['22']['answer'])) ? $details['22']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Citizenship</dt>
                        <dd class="col-sm-9">{{ (!empty($details['23']['answer'])) ? $details['23']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Permanent Residence</dt>
                        <dd class="col-sm-9">{{ $details['24']['answer'] }}</dd>

                        <dt class="col-sm-3">Marital Status</dt>
                        <dd class="col-sm-9">
                            @if(!empty($details['25']['answer']['other']))
                            {{ $details['25']['answer']['other'] }}
                            @elseif(!empty($details['25']['answer']))
                            {{ $details['25']['answer'] }}
                            @else
                            ---
                            @endif
                        </dd>

                        <dt class="col-sm-3">Driving License</dt>
                        <dd class="col-sm-9">{{ (!empty($details['26']['answer'])) ? $details['26']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Home Address</dt>
                        <dd class="col-sm-9">{{ $details['27']['answer'] }}</dd>

                        <dt class="col-sm-3">Mailing Address</dt>
                        <dd class="col-sm-9">
                            {{ (!empty($details['128']['answer'])) ? $details['128']['answer'] : '---' }}</dd>

                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{{ $details['28']['answer'] }}</dd>

                        <dt class="col-sm-3">Home Telephone</dt>
                        <dd class="col-sm-9">
                            {{ (!empty($details['29']['prettyFormat'])) ? $details['29']['prettyFormat'] : '---' }}</dd>

                        <dt class="col-sm-3">Mobile Phone</dt>
                        <dd class="col-sm-9">{{ $details['30']['prettyFormat'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingTwo" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">2. Languages / Dialects Proficiency</a>
                </h5>
            </div>
            <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo"
                data-parent="#accordion">
                <div class="card-body">
                    <p class="guest-form-label font-weight-bold mb-1">A. Written</p>
                    <table class="table table-sm table-bordered table-striped">
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
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['English'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['English'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['English'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mandarin</th>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Mandarin'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Mandarin'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Mandarin'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tagalog</th>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Tagalog'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Tagalog'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Tagalog'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Bahasa Melayu</th>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Bahasa Melayu'] == "Basic" ? '✓' : '' }}
                                </td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Bahasa Melayu'] == "Fluent" ? '✓' : '' }}
                                </td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Bahasa Melayu'] == "N/A" ? '✓' : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Others</th>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Others'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Others'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['33']['answer']['Others'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="guest-form-label font-weight-bold mb-1">B. Spoken</p>
                    <table class="table table-sm table-bordered table-striped">
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
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['English'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['English'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['English'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mandarin</th>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Mandarin'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Mandarin'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Mandarin'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tagalog</th>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Tagalog'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Tagalog'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Tagalog'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Bahasa Melayu</th>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Bahasa Melayu'] == "Basic" ? '✓' : '' }}
                                </td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Bahasa Melayu'] == "Fluent" ? '✓' : '' }}
                                </td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Bahasa Melayu'] == "N/A" ? '✓' : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Others</th>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Others'] == "Basic" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Others'] == "Fluent" ? '✓' : '' }}</td>
                                <td class="font-weight-bold">
                                    {{ $details['34']['answer']['Others'] == "N/A" ? '✓' : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingThree" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">3. Family Particulars</a></h5>
            </div>
            <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree"
                data-parent="#accordion">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Name of Spouse</dt>
                        <dd class="col-sm-9">{{ (!empty($details['37']['answer'])) ? $details['37']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Age</dt>
                        <dd class="col-sm-9">{{ (!empty($details['38']['answer'])) ? $details['38']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">ID No. / Password No.</dt>
                        <dd class="col-sm-9">{{ (!empty($details['39']['answer'])) ? $details['39']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Occupation</dt>
                        <dd class="col-sm-9">{{ (!empty($details['40']['answer'])) ? $details['40']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Contact Number</dt>
                        <dd class="col-sm-9">{{ (!empty($details['41']['answer'])) ? $details['41']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Employer</dt>
                        <dd class="col-sm-9">{{ (!empty($details['42']['answer'])) ? $details['42']['answer'] : '---' }}
                        </dd>

                        <dt class="col-sm-3">Number of Children</dt>
                        <dd class="col-sm-9">{{ (!empty($details['43']['answer'])) ? $details['43']['answer'] : '---' }}
                        </dd>
                    </dl>
                    <p class="guest-form-label font-weight-bold mb-1">Children</p>
                    <table class="table table-sm table-bordered table-striped">
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
                    <p class="guest-form-label font-weight-bold mb-1">Other relatives in similar industry/sector as
                        Mclink</p>
                    <table class="table table-sm table-responsive-sm table-bordered table-striped">
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
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingFour" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false"
                        aria-controls="collapseFour">4. Educational Details</a></h5>
            </div>
            <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingFour"
                data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-sm table-responsive-sm table-bordered table-striped">
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
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],0) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],1) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],2) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Elementary'],3) }}
                                </td>
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
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],0) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],1) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],2) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Vocational'],3) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">University/College</th>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],0) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],1) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],2) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['University/College'],3) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Post-Graduate</th>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],0) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],1) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],2) }}
                                </td>
                                <td>{{ $Recruitment->trimAndExplode($details['48']['answer']['Post-Graduate'],3) }}
                                </td>
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
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingFive" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false"
                        aria-controls="collapseFive">5. Extra-Curricular Activities/Community
                        Service</a></h5>
            </div>
            <div class="collapse" id="collapseFive" role="tabpanel" aria-labelledby="headingFive"
                data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-sm table-responsive-sm table-bordered table-striped">
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
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingSix" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="false"
                        aria-controls="collapseSix">6. Membership Details (Are you affiliated
                        to any institution /
                        association / organisation /charity?)</a></h5>
            </div>
            <div class="collapse" id="collapseSix" role="tabpanel" aria-labelledby="headingSix"
                data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped">
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
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingSeven" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseSeven" aria-expanded="false"
                        aria-controls="collapseSeven">7. Educational Background</a></h5>
            </div>
            <div class="collapse" id="collapseSeven" role="tabpanel" aria-labelledby="headingSeven"
                data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-sm table-responsive-sm table-bordered table-striped">
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
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingEight" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseEight" aria-expanded="false"
                        aria-controls="collapseEight">8. Other relevant skills</a></h5>
            </div>
            <div class="collapse" id="collapseEight" role="tabpanel" aria-labelledby="headingEight"
                data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped">
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
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingNine" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseNine" aria-expanded="false"
                        aria-controls="collapseNine">9. Employment History (5 Most Recent
                        Employment)</a></h5>
            </div>
            <div class="collapse" id="collapseNine" role="tabpanel" aria-labelledby="headingNine"
                data-parent="#accordion">
                <div class="card-body">
                    <p class="guest-form-label font-weight-bold mb-1">Employment History (1 of 5)</p>
                    <table class="table table-sm table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Period of Employment</th>
                                <td>{{ (!empty($details['62']['answer'])) ? $details['62']['answer'] : '---' }}</td>
                            </tr>
                            <tr>
                                <th>Company Name</th>
                                <td>{{ (!empty($details['61']['answer'])) ? $details['61']['answer'] : '---' }}</td>
                            </tr>
                            <tr>
                                <th>Position Held</th>
                                <td>{{ (!empty($details['63']['answer'])) ? $details['63']['answer'] : '---' }}</td>
                            </tr>
                            <tr>
                                <th>Basic Monthly Salary</th>
                                <td>{{ (!empty($details['64']['answer'])) ? $details['64']['answer'] : '---' }}</td>
                            </tr>
                            <tr>
                                <th>Reason for Leaving</th>
                                <td>{{ (!empty($details['65']['answer'])) ? $details['65']['answer'] : '---' }}</td>
                            </tr>
                            <tr>
                                <th>Responsibilities</th>
                                <td>
                                    @if(!empty($details['66']['answer']))
                                    {!! $details['66']['answer'] !!}
                                    @else
                                    ---
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>What did you enjoy most while working in this company</th>
                                <td>{{ (!empty($details['67']['answer'])) ? $details['67']['answer'] : '---' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="guest-form-label font-weight-bold mb-1">Employment History (2 of 5)</p>
                    <table class="table table-sm table-striped table-bordered">
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
                    <table class="table table-sm table-striped table-bordered">
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
                    <table class="table table-sm table-striped table-bordered">
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
                    <table class="table table-sm table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Period of Employment</th>
                                <td>{{ (!empty($details['133']['answer'])) ? $details['133']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Company Name</th>
                                <td>{{ (!empty($details['134']['answer'])) ? $details['134']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Position Held</th>
                                <td>{{ (!empty($details['135']['answer'])) ? $details['135']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Basic Monthly Salary</th>
                                <td>{{ (!empty($details['136']['answer'])) ? $details['136']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Reason for Leaving</th>
                                <td>{{ (!empty($details['137']['answer'])) ? $details['137']['answer'] : '---' }}
                                </td>
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
                                <td>{{ (!empty($details['139']['answer'])) ? $details['139']['answer'] : '---' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingTen" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseTen" aria-expanded="false"
                        aria-controls="collapseTen">10. References</a></h5>
            </div>
            <div class="collapse" id="collapseTen" role="tabpanel" aria-labelledby="headingTen"
                data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped">
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
                    <table class="table table-sm table-bordered table-striped">
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
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingEleven" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseEleven"
                        aria-expanded="false" aria-controls="collapseEleven">11. Other Information</a></h5>
            </div>
            <div class="collapse" id="collapseEleven" role="tabpanel" aria-labelledby="headingEleven"
                data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">If yes, please specify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1. Have you suffered, or are suffering from any medical condition,
                                    illness, disease,
                                    mental illness, substance dependence or physical impairment?</th>
                                <td>{{ (!empty($details['125']['answer'])) ? $details['125']['answer'] : '---' }}
                                </td>
                                <td>{{ (!empty($details['126']['answer'])) ? $details['126']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2a. Do you have any existing criminal records?</th>
                                <td>{{ (!empty($details['104']['answer'])) ? $details['104']['answer'] : '---' }}
                                </td>
                                <td>{{ (!empty($details['103']['answer'])) ? $details['103']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2b. Have you been charged with any offence in a court of law or in
                                    any
                                    other country for
                                    which the outcome is pending (excluding parking offences)?</th>
                                <td>{{ (!empty($details['105']['answer'])) ? $details['105']['answer'] : '---' }}
                                </td>
                                <td>{{ (!empty($details['106']['answer'])) ? $details['106']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3. Have you been charged with any offence in a court of law or in
                                    any
                                    other country for
                                    which the outcome is pending (excluding parking offences)?</th>
                                <td>{{ (!empty($details['107']['answer'])) ? $details['107']['answer'] : '---' }}
                                </td>
                                <td>{{ (!empty($details['108']['answer'])) ? $details['108']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4. Are you aware of being under any current police investigations or
                                    in
                                    any other
                                    country following allegations made against you?</th>
                                <td>{{ (!empty($details['109']['answer'])) ? $details['109']['answer'] : '---' }}
                                </td>
                                <td>{{ (!empty($details['110']['answer'])) ? $details['110']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5. Have you been or are you under any financial embarrassment i.e.
                                    (a)
                                    an undischarged
                                    bankrupt, (b) a judgement debtor, (c) have unsecured debts and liabilities of
                                    more
                                    than 3 months of
                                    last-drawn pay, (d) have signed a promissory note or an acknowledgement of
                                    indebtedness?</th>
                                <td>{{ (!empty($details['111']['answer'])) ? $details['111']['answer'] : '---' }}
                                </td>
                                <td>{{ (!empty($details['112']['answer'])) ? $details['112']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6. Has your employment ever been terminated as a result of
                                    misconduct of
                                    service?</th>
                                <td>{{ (!empty($details['113']['answer'])) ? $details['113']['answer'] : '---' }}
                                </td>
                                <td>{{ (!empty($details['114']['answer'])) ? $details['114']['answer'] : '---' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">7. In the event where you have successfully passed the job
                                    interview(s)
                                    and received a
                                    job offer from us, when is the earliest date that you will be available to start
                                    work?</th>
                                <td>{{ (!empty($details['115']['prettyFormat'])) ? $details['115']['prettyFormat'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">8. What is your personal strength?</th>
                                <td>{{ (!empty($details['116']['answer'])) ? $details['116']['answer'] : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">9. List your hobbies</th>
                                <td>{{ (!empty($details['117']['answer'])) ? $details['117']['answer'] : '---' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingTwelve" role="tab">
                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseTwelve"
                        aria-expanded="false" aria-controls="collapseTwelve">12. Attachments</a></h5>
            </div>
            <div class="collapse" id="collapseTwelve" role="tabpanel" aria-labelledby="headingTwelve"
                data-parent="#accordion">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="email-input">Resume File</label>
                        <div class="col-md-9">
                            <a class="btn btn-primary" href="{{ $details['123']['answer'][0] }}">Download Resume</a>
                        </div>
                    </div>
                    <form action="{{ route('recruitment.custom_upload',$data['submission_id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="file-multiple-input">Upload Other Files</label>
                            <div class="col-md-9">
                                <input id="custom_upload" type="file" name="custom_upload[]" multiple>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3 mr-1 mb-2 font-weight-bold float-right" id="custom_upload"
                            name="custom_upload" type="submit">
                            Save
                        </button>
                    </form>
                    @if(!empty($data['customUploads']))
                    <table class="table table-condensed table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Uploaded Files</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($data['customUploads'] as $upload)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a
                                        href="{{ route('recruitment.download_attachment',['fileName' => $upload->file_name,'origFilename' => $upload->orig_filename]) }}">{{ $upload->orig_filename }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 mt-2">
        <form id="submit_form" action="{{ route('recruitment.submit',$data['submission_id']) }}">
            @if(count($data['remarks']) > 0)
            <div class="form-group">
                <label for="remarks">
                    <h3>Feedback</h3>
                </label>
                @foreach($data['remarks'] as $item)
                <blockquote class="blockquote">
                    <p class="mb-0">{{ $item->remarks }}</p>
                    <footer class="blockquote-footer"><cite title="Source Title">{{ $item->user->name }}</cite></footer>
                </blockquote>
                @endforeach
            </div>
            @endif
            <div class="form-group">
                <label for="remarks">
                    <h3>Remarks</h3>
                </label>
                <textarea class="form-control" id="remarks" name="remarks" rows="9"></textarea>
            </div>
            <div class="form-group">
                <label for="remarks">
                    <h3>Status</h3>
                </label>
                <select class="form-control" id="status" name="status">
                    @foreach ($data['statusArray'] as $statusName => $statusId)
                    <option value="{{ $statusId }}" {{ $statusId == $data['status'] ? 'selected' : '' }}>
                        {{ ucfirst($statusName) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="{{ $data['status'] != 3 ? 'display: none;' : '' }}" id="next_interviewer">
                <label for="remarks">Next Interviewer</label>
                <select class="form-control" id="interviewer_user_id" name="interviewer_user_id">
                    @foreach($data['users'] as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="display: none;" id="selected_message">
                <span class="badge badge-warning" style="font-size: 15px"><em><b>Selected/Hired</b> applicant is subject
                        for confirmation from CEO.</em></span>
            </div>
            <div class="form-group" style="{{ $data['status'] == 4 && auth()->user()->id == 1 ? '' : 'display: none;' }}">
                <label for="confirmed">CEO's Decision</label>
                <select class="form-control" id="confirmed" name="confirmed">
                    @foreach ($data['confirmArray'] as $confirmName => $confirmId)
                    <option value="{{ $confirmId }}">{{ ucfirst($confirmName) }}</option>
                    @endforeach
                </select>
            </div>

    </div>

</div>

<div class="card-footer clearfix">
    <a class="btn btn-secondary px-3 mr-1 font-weight-bold float-left" href="{{ route('recruitment.index') }}">
        <svg class="c-icon">
            <use xlink:href="http://mclink-portal.test/assets/icons/sprites/free.svg#cil-arrow-circle-left"></use>
        </svg>
        Back
    </a>
    <button class="btn btn-success px-3 mr-1 font-weight-bold float-right" id="submit" name="submit" type="submit">
        Submit
    </button>
    </form>
</div>
@stop

@push('scripts')
<script>
    $("#submit_form").submit(function (e) {
        $("#submit").attr("disabled", true);
        $("#submit").html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...`
        );

        return true;

    });
    //Status Field
    $('#status').on('change', function () {

        if (this.value == 3) {
            $("#next_interviewer").show();
        } else {
            $("#next_interviewer").hide();
        }

        if (this.value == 4) {
            $("#selected_message").show();
        } else {
            $("#selected_message").hide();
        }

    });

</script>
@endpush
