@extends('layout.master')

@section('content')
<div class="card-header">View Company Information</div>
<form>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>Company Name</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $company->company_name }}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><label>Company Type</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->company_type }}">
                        </div>
                        <div class="col-md-6">
                            <strong><label>Legal / Trading Name</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->trading_name }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><label>Registration Number</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->registration_no }}">
                        </div>
                        <div class="col-md-6">
                            <strong><label>Contact Number</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->contact_number }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><label>Email</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->email }}">
                        </div>
                        <div class="col-md-6">
                            <strong><label>Website</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->website }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <strong><label>Tax Number / EIN</label></strong>
                                <input class="form-control-plaintext" readonly value="{{ $company->xin_gtax }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>Address Line 1</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $company->address_1 }}">
                    <strong><label class="mt-3">Address Line 2</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $company->address_2 }}">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <strong><label>City</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->city }}">
                        </div>
                        <div class="col-md-4">
                            <strong><label>State / Province</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->state }}">
                        </div>
                        <div class="col-md-4">
                            <strong><label>Zip Code</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->zip_code }}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>Country</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->country }}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>Company Logo</label></strong>
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>Added By</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->name }}">
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
