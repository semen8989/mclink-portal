@extends('layout.master')

@section('content')
<div class="card-header">Create Sales Lead</div>
<form method="POST" id="request_form" action="#" autocomplete="off" novalidate>
    @csrf
    <div class="card-body">
        @include('components.sales-lead.nav-tabs')
        <div class="tab-content mt-3" id="myTab1Content">
            <h3>Contact Information</h3>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Company Name</label>
                        <input class="form-control" name="company_name" id="company_name" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Tel#</label>
                        <input class="form-control" name="tel_number" id="tel_number" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Address</label>
                <input class="form-control" name="address" id="address" type="text">
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Contact Person</label>
                        <input class="form-control" name="contact_person" id="contact_person" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Department</label>
                        <input class="form-control" name="department" id="department" type="text">
                    </div>
                </div>
            </div>
            <h3>Sales Lead Information</h3>
            <p><strong>Mclink Base:</strong></p>
            <p>Reason to upgrade: Please tick</p>
            <div class="form-group row">
                <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" name="mclink_base_reason" id="inline-radio1" type="radio" value="option1"
                            name="inline-radios">
                        <label class="form-check-label" for="inline-radio1">M/C Expired</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" name="mclink_base_reason" id="inline-radio2" type="radio" value="option2"
                            name="inline-radios">
                        <label class="form-check-label" for="inline-radio2">M/C Overload</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" name="mclink_base_reason" id="inline-radio3" type="radio" value="option3"
                            name="inline-radios">
                        <label class="form-check-label" for="inline-radio3">Others</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Model</label>
                        <input class="form-control" name="mclink_base_model" id="mclink_base_model" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Serial Number</label>
                        <input class="form-control" name="serial_number" id="serial_number" type="text">
                    </div>
                </div>
            </div>
            <p><strong>No Mclink Base:</strong></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Existing Brand</label>
                        <input class="form-control" name="mclink_base_model" id="mclink_base_model" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Model</label>
                        <input class="form-control" name="non_mclink_base_model" id="non_mclink_base_model" type="text">
                    </div>
                </div>
            </div>
            <h3>Sales Lead Assigner/Approver</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Select Sales Manager (The Sales Manager will assign this lead to his/her sales team)</label>
                        <input class="form-control" name="mclink_base_model" id="mclink_base_model" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Approved by(Approver)</label>
                        <input class="form-control" name="non_mclink_base_model" id="non_mclink_base_model" type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group mt-2 text-right">
            <button type="submit"
                class="btn btn-success btn-submit">{{ __('label.global.form.button.submit') }}</button>
        </div>
    </div>
</form>
@stop
