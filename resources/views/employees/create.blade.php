@extends('layout.master')

@section('content')
<div class="card-header">Add New Employee</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" id="name" type="text">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="employee_id">Employee ID</label>
                        <input class="form-control" name="employee_id" id="employee_id" type="text">
                    </div>
                    <div class="col-md-6">
                        <label for="joining_date">Joining Date</label>
                        <input class="form-control" name="joining_date" id="joining_date" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="male"> Male</option>
                            <option value="female"> Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="joining_date">Date of Birth</label>
                        <input class="form-control" name="joining_date" id="joining_date" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="company_id">Company</label>
                        <select class="form-control" name="company_id" id="company_id">
                            <option> Male</option>
                            <option> Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="department_id">Department</label>
                        <select class="form-control" name="department_id" id="department_id">
                            <option> Male</option>
                            <option> Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="designation_id">Designation</label>
                        <select class="form-control" name="designation_id" id="designation_id">
                            <option> Male</option>
                            <option> Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="role_id">Role</label>
                        <select class="form-control" name="role_id" id="role_id">
                            <option> Male</option>
                            <option> Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="contact_number">Contact Number</label>
                        <input class="form-control" name="contact_number" id="contact_number" type="text">
                    </div>
                    <div class="col-md-6">
                        <label for="role_id">Shift</label>
                        <select class="form-control" name="shift_id" id="shift_id">
                            <option> Male</option>
                            <option> Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input class="form-control" name="email" id="email" type="text">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input class="form-control" name="password" id="password" type="password">
                    </div>
                    <div class="col-md-6">
                        <label for="password2">Confirm Password</label>
                        <input class="form-control" name="password2" id="password2" type="password">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-right">
    <button type="submit" class="btn btn-success">Save</button>
</div>
@stop