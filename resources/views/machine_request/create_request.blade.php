@extends('layout.master')

@section('content')
<div class="card-header">Machine Request Menu</div>
<form action="" autocomplete="off" novalidate>
    <div class="card-body">
        @include('components.machine-request.nav-tabs')
        <div class="tab-content mt-3" id="myTab1Content">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Model</label>
                        <input class="form-control" name="model" id="model" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Quantity</label>
                        <input class="form-control" name="qty" id="qty" type="number">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">System</label>
                        <input class="form-control" name="system" id="system" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">No of cassette</label>
                        <input class="form-control" name="cassette_no" id="cassette_no" type="number">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Period of Contract</label>
                <input class="form-control" name="contract_period" id="contract_period" type="text">
            </div>
            <div class="form-group">
                <label for="title">Special Requirement</label>
                <textarea class="form-control" name="special_requirement" id="special_requirement"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Company Name</label>
                <input class="form-control" name="company_name" id="company_name" type="text">
            </div>
            <div class="form-group">
                <label for="title">Billing Address</label>
                <input class="form-control" name="billing_address" id="billing_address" type="text">
            </div>
            <div class="form-group">
                <label for="title">Office Contact No.</label>
                <input class="form-control" name="office_contact_no" id="office_contact_no" type="text">
            </div>
            <div class="form-group">
                <label for="title">Installation Address</label>
                <input class="form-control" name="installation_address" id="installation_address" type="text">
            </div>
            <div class="form-group">
                <label for="title">Person in-charge</label>
                <input class="form-control" name="person_in_charnge" id="person_in_charnge" type="text">
            </div>
            <div class="form-group">
                <label for="title">Contact No.</label>
                <input class="form-control" name="contact_no" id="contact_no" type="text">
            </div>
            <div class="form-group">
                <label for="title">Installation Date</label>
                <input class="form-control" name="installation_date" id="installation_date" type="text">
            </div>
            <div class="form-group">
                <label for="title">Send Request To</label>
                <select class="form-control" name="send_request" id="send_request"></select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group">
            <span class="badge badge-danger" style="font-size: 15px">**Different Installation Address Different Request Form</span>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">All data are correct</label>
        </div>
        <div class="form-group mt-2 text-center">
            <button type="submit" class="btn btn-success" style="width: 100%">Submit</button>
        </div>
    </div>
</form>
@stop
