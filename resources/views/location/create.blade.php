@extends('layout.master')

@section('content')
<div class="card-header">Add New Location</div>
<form method="POST">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select class="form-control" name="company_id" id="company_id">
                        <option value="">Select One</option>
                        <option value="4"> McLink Asia Pte Ltd</option>
                        <option value="6"> MPS Solutions Pte Ltd</option>
                        <option value="7"> MPS Malaysia Sdn Bhd</option>
                        <option value="8"> Guangzhou Maijia Office Equipment Co. Ltd. </option>
                        <option value="9"> Mclink Copy Services Philippines Inc</option>
                        <option value="10"> MPO Services Pte Ltd</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="location_name">Location Name</label>
                    <input class="form-control" placeholder="Location Name" name="location_name" id="location_name" type="text">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" placeholder="Email" name="email" id="email" type="text">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" placeholder="Phone" name="phone" id="phone" type="number">
                </div>
                <div class="form-group">
                    <label for="fax_num">Fax Number</label>
                    <input class="form-control" placeholder="Fax Number" name="fax_num" id="fax_num" type="number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location_head">Location Head</label>
                    <select class="form-control" name="location_head" id="location_head">
                        <option value="">Select One</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" placeholder="Address Line 1" name="address_1" type="text">
                    <br>
                    <input class="form-control" placeholder="Address Line 2" name="address_2" type="text">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="city">City</label>
                        <input class="form-control" placeholder="City" name="city" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="state">State</label>
                        <input class="form-control" placeholder="State / Province" name="state" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="zip_code">Zip Code</label>
                        <input class="form-control" placeholder="Zip Code / Postal Code" name="zip_code" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">Select One</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
@stop