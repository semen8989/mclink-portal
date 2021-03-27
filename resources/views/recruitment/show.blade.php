@extends('layout.master')

@section('content')
    <div class="card-header">1. Personal Particulars</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Name</p>
                <p class="guest-form-data mb-4">{{ $details['15']['answer']['first'] ." ". $details['15']['answer']['last'] }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Gender</p>
                <p class="guest-form-data mb-4">{{ $details['16']['answer'] }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Religion</p>
                <p class="guest-form-data mb-4">{{ (!empty($details['17']['answer'])) ? $details['17']['answer'] : '---' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">ID No. / Passport No.</p>
                <p class="guest-form-data mb-4">{{ (!empty($details['18']['answer'])) ? $details['18']['answer'] : '---' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Date of Birth</p>
                <p class="guest-form-data mb-4">{{ (!empty($details['19']['prettyFormat'])) ? $details['19']['prettyFormat'] : '---' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Age</p>
                <p class="guest-form-data mb-4">{{ (!empty($details['20']['answer'])) ? $details['20']['answer'] : '---' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Country of Birth</p>
                <p class="guest-form-data mb-4">{{ (!empty($details['21']['answer'])) ? $details['21']['answer'] : '---' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Nationality</p>
                <p class="guest-form-data mb-4">{{ (!empty($details['22']['answer'])) ? $details['22']['answer'] : '---' }}</p>
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
                <p class="guest-form-data mb-4">{{ $details['26']['answer'] }}</p>
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
                <p class="guest-form-data mb-4">{{ (!empty($details['29']['answer'])) ? $details['29']['answer'] : '---' }}</p>
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

    </div>

    <hr class="mb-3">
    <div class="px-4">3. Family Particulars</div>
    <hr class="mt-3 mb-0">

    <div class="card-body">

    </div>

    <hr class="mb-3">
    <div class="px-4">4. Educational Details</div>
    <hr class="mt-3 mb-0">

    <div class="card-body">

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