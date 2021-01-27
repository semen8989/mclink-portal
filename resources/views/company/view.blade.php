@extends('layout.master')

@section('content')
<div class="card-header">View Company Information</div>
<form method="POST" action="{{ route('company.store') }}">
    @csrf
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
                            <strong><label for="contact_number">Contact Number</label></strong>
                            <input class="form-control-plaintext" readonly value="0232312312">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><label for="email">Email</label></strong>
                            <input class="form-control-plaintext" readonly value="kass@mclinkgroup.com">
                        </div>
                        <div class="col-md-6">
                            <strong><label for="website">Website</label></strong>
                            <input class="form-control-plaintext" readonly value="mclinkgroup.com">
                        </div>
                        <div class="col-md-6 mt-3">
                            <strong><label>Username</label></strong>
                            <input class="form-control-plaintext" readonly value="kass">
                        </div>
                        <div class="col-md-6 mt-3">
                            <strong><label>Password</label></strong>
                            <input class="form-control-plaintext" readonly value="kass">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>Tax Number / EIN</label></strong>
                    <input class="form-control-plaintext" readonly value="TIN 0239324902">
                </div>
                <div class="form-group">
                    <strong><label>Address Line 1</label></strong>
                    <input class="form-control-plaintext" readonly value="80 P. Tupaz St.">
                    <strong><label class="mt-3">Address Line 2</label></strong>
                    <input class="form-control-plaintext" readonly value="BLK 12 Lot 20">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <strong><label>City</label></strong>
                            <input class="form-control-plaintext" readonly value="Quezon City">
                        </div>
                        <div class="col-md-4">
                            <strong><label>State / Province</label></strong>
                            <input class="form-control-plaintext" readonly value="NCR">
                        </div>
                        <div class="col-md-4">
                            <strong><label>Zip Code</label></strong>
                            <input class="form-control-plaintext" readonly value="1123">
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>Country</label></strong>
                            <input class="form-control-plaintext" readonly value="Philippines">
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>Company Logo</label></strong>
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>Added By</label></strong>
                            <input class="form-control-plaintext" readonly value="Francis Toh">
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
