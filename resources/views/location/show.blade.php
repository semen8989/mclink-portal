@extends('layout.master')

@section('content')
<div class="card-header">View Location Information</div>
<form>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>Company</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->company->company_name }}">
                </div>
                <div class="form-group">
                    <strong><label for="location_name">Location Name</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->location_name }}">
                </div>
                <div class="form-group">
                    <strong><label for="email">Email</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->email }}">
                </div>
                <div class="form-group">
                    <strong><label for="phone">Phone</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->phone }}">
                </div>
                <div class="form-group">
                    <strong><label for="fax_num">Fax Number</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->fax_num }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label for="location_head">Location Head</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->user->where('id',$location->user_id)->first()->name }}">
                </div>
                <div class="form-group">
                    <strong><label for="address">Address Line 1</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->address_1 }}">
                    <br>
                    <strong><label for="address">Address Line 2</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->address_2}}">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <strong><label for="city">City</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->city }}">
                    </div>
                    <div class="col-md-4">
                        <strong><label for="state">State</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->state }}">
                    </div>
                    <div class="col-md-4">
                        <strong><label for="zip_code">Zip Code</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->zip_code }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <strong><label for="country">Country</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->country }}">
                    </div>
                    <div class="col-md-4">
                        <strong><label for="country">Added By</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->user->where('id',$location->added_by)->first()->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop