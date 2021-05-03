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
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of Birth</th>
                </tr>
            </thead>
            @php
            //Children
                $child1_data = trim($details['44']['answer']['1'],'[]');
                $child1_element = explode(",",$child1_data);
                $child2_data = trim($details['44']['answer']['2'],'[]');
                $child2_element = explode(",",$child2_data);
                $child3_data = trim($details['44']['answer']['3'],'[]');
                $child3_element = explode(",",$child3_data);
                $child4_data = trim($details['44']['answer']['4'],'[]');
                $child4_element = explode(",",$child4_data);
                $child5_data = trim($details['44']['answer']['5'],'[]');
                $child5_element = explode(",",$child5_data);
            @endphp
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ trim($child1_element[0],'""') }}</td>
                    <td>{{ trim($child1_element[1],'""') }}</td>
                    <td>{{ trim($child1_element[2],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>{{ trim($child2_element[0],'""') }}</td>
                    <td>{{ trim($child2_element[1],'""') }}</td>
                    <td>{{ trim($child2_element[2],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>{{ trim($child3_element[0],'""') }}</td>
                    <td>{{ trim($child3_element[1],'""') }}</td>
                    <td>{{ trim($child3_element[2],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>{{ trim($child4_element[0],'""') }}</td>
                    <td>{{ trim($child4_element[1],'""') }}</td>
                    <td>{{ trim($child4_element[2],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>{{ trim($child5_element[0],'""') }}</td>
                    <td>{{ trim($child5_element[1],'""') }}</td>
                    <td>{{ trim($child5_element[2],'""') }}</td>
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
            @php
                //Temporary only, will change it later
                //Elementary
                $elem_data = trim($details['48']['answer']['Elementary'],'[]');
                $elem_element = explode(",",$elem_data);
                //Secondary
                $second_data = trim($details['48']['answer']['Secondary'],'[]');
                $second_element = explode(",",$second_data);
                //Vocational
                $vo_data = trim($details['48']['answer']['Vocational'],'[]');
                $vo_element = explode(",",$vo_data);
                //University/College
                $uni_data = trim($details['48']['answer']['University/College'],'[]');
                $uni_element = explode(",",$uni_data);
                //Post Graduate
                $post_data = trim($details['48']['answer']['Post-Graduate'],'[]');
                $post_element = explode(",",$post_data);
                //Post Graduate
                $other_data = trim($details['48']['answer']['Other'],'[]');
                $other_element = explode(",",$other_data);
            @endphp
            <tbody>
                <tr>
                    <th scope="row">Elementary</th>
                    <td>{{ trim($elem_element[0],'""') }}</td>
                    <td>{{ str_replace('\\','',trim($elem_element[1],'""')) }}</td>
                    <td>{{ str_replace('\\','',trim($elem_element[2],'""')) }}</td>
                    <td>{{ trim($elem_element[3],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">Secondary</th>
                    <td>{{ trim($second_element[0],'""') }}</td>
                    <td>{{ str_replace('\\','',trim($second_element[1],'""')) }}</td>
                    <td>{{ str_replace('\\','',trim($second_element[2],'""')) }}</td>
                    <td>{{ trim($second_element[3],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">Vocational</th>
                    <td>{{ trim($vo_element[0],'""') }}</td>
                    <td>{{ str_replace('\\','',trim($vo_element[1],'""')) }}</td>
                    <td>{{ str_replace('\\','',trim($vo_element[2],'""')) }}</td>
                    <td>{{ trim($vo_element[3],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">University/College</th>
                    <td>{{ trim($uni_element[0],'""') }}</td>
                    <td>{{ str_replace('\\','',trim($uni_element[1],'""')) }}</td>
                    <td>{{ str_replace('\\','',trim($uni_element[2],'""')) }}</td>
                    <td>{{ trim($uni_element[3],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">Post-Graduate</th>
                    <td>{{ trim($post_element[0],'""') }}</td>
                    <td>{{ str_replace('\\','',trim($post_element[1],'""')) }}</td>
                    <td>{{ str_replace('\\','',trim($post_element[2],'""')) }}</td>
                    <td>{{ trim($post_element[3],'""') }}</td>
                </tr>
                <tr>
                    <th scope="row">Other</th>
                    <td>{{ trim($other_element[0],'""') }}</td>
                    <td>{{ str_replace('\\','',trim($other_element[1],'""')) }}</td>
                    <td>{{ str_replace('\\','',trim($other_element[2],'""')) }}</td>
                    <td>{{ trim($other_element[3],'""') }}</td>
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
