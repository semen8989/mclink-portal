@extends('layout.master')

@section('content')
<div class="card-header">View Employee Details</div>
<div class="card-body px-5">
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Name</p>
            <p class="guest-form-data mb-4">{{ $user->name }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Email</p>
            <p class="guest-form-data mb-4">{{ $user->email }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Company</p>
            <p class="guest-form-data mb-4">{{ $user->company->company_name }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Department</p>
            <p class="guest-form-data mb-4">{{ $user->department->department_name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Designation</p>
            <p class="guest-form-data mb-4">{{ $user->designation->designation_name }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Role</p>
            <p class="guest-form-data mb-4">{{ $user->role_id }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Employee ID</p>
            <p class="guest-form-data mb-4">{{ $user->employee_id }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Joining Date</p>
            <p class="guest-form-data mb-4">{{ $user->joining_date }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Gender</p>
            <p class="guest-form-data mb-4">{{ ucfirst($user->gender) }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Date of Birth</p>
            <p class="guest-form-data mb-4">{{ $user->birth_date }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Contact Number</p>
            <p class="guest-form-data mb-4">{{ $user->contact_number }}</p>
        </div>
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Shift</p>
            <p class="guest-form-data mb-4">{{ $user->officeShift->shift_name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="guest-form-label font-weight-bold mb-1">Report To</p>
            <p class="guest-form-data mb-4">{{ $user->reportToUser->name }}</p>
        </div>
    </div>
</div>
@stop