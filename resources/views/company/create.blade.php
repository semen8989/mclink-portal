@extends('layout.master')

@section('content')
<div class="card-header">Add New Company</div>
<form>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input class="form-control" placeholder="Company Name" name="name" type="text">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Company Type</label>
                            <select class="form-control" name="company_type" data-plugin="xin_select"
                                data-placeholder="Company Type">
                                <option value="">Select One</option>
                                <option value="1"> Corporation</option>
                                <option value="2"> Exempt Organization</option>
                                <option value="3"> Partnership</option>
                                <option value="4"> Private Foundation</option>
                                <option value="5"> Limited Liability Company</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="trading_name">Legal / Trading Name</label>
                            <input class="form-control" placeholder="Legal / Trading Name" name="trading_name"
                                type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="registration_no">Registration Number</label>
                            <input class="form-control" placeholder="Registration Number" name="registration_no"
                                type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="contact_number">Contact Number</label>
                            <input class="form-control" placeholder="Contact Number" name="contact_number"
                                type="number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" placeholder="Email" name="email" type="email">
                        </div>
                        <div class="col-md-6">
                            <label for="website">Website</label>
                            <input class="form-control" placeholder="Website URL" name="website" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="xin_gtax">Tax Number / EIN</label>
                    <input class="form-control" placeholder="Tax Number / EIN" name="xin_gtax" type="text">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" placeholder="Address Line 1" name="address_1" type="text">
                    <br>
                    <input class="form-control" placeholder="Address Line 2" name="address_2" type="text">
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control" placeholder="City" name="city" type="text">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="State / Province" name="state" type="text">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="Zip Code / Postal Code" name="zipcode" type="text">
                        </div>
                    </div>
                    <br>
                    <select class="form-control" data-placeholder="Country">
                        <option value="" disabled selected>Select One</option>
                        <option value="1"> Afghanistan</option>
                        <option value="2"> Albania</option>
                        <option value="3"> Algeria</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="email">Username</label>
                <input class="form-control" placeholder="Username" name="username" type="text">
            </div>
            <div class="col-md-3">
                <label for="website">Password</label>
                <input class="form-control" placeholder="Password" name="password" type="text">
            </div>
            <div class="col-md-6">
                <fieldset class="form-group">
                    <label for="logo">Company Logo</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                    <small>Upload files only: gif,png,jpg,jpeg</small>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection
