@extends('layout.master')

@section('content')
<div class="card-header">Add New Location</div>
<form method="POST" action="{{ route('locations.store') }}">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select class="form-control @error('company_id') is-invalid @enderror" name="company_id" id="company_id">
                        <option value="" disabled selected>Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="location_name">Location Name</label>
                    <input class="form-control @error('location_name') is-invalid @enderror" placeholder="Location Name" name="location_name" 
                        id="location_name" type="text" value="{{ old('location_name') }}">
                    @error('location_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" 
                        id="email" type="text" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" placeholder="Phone" name="phone" id="phone" type="number" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="fax_num">Fax Number</label>
                    <input class="form-control" placeholder="Fax Number" name="fax_num" id="fax_num" type="number" value="{{ old('fax_num') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location_head">Location Head</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                        <option selected disabled>Select Location</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" placeholder="Address Line 1" name="address_1" type="text" value="{{ old('address_1') }}">
                    <br>
                    <input class="form-control" placeholder="Address Line 2" name="address_2" type="text" value="{{ old('address_2') }}">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="city">City</label>
                        <input class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" type="text" value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="state">State</label>
                        <input class="form-control" placeholder="State / Province" name="state" type="text" value="{{ old('state') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="zip_code">Zip Code</label>
                        <input class="form-control" placeholder="Zip Code / Postal Code" name="zip_code" type="text" value="{{ old('zip_code') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                        <option value="" disabled selected>Select One</option>
                        <option value="Philippines" {{ old('country') == "Philippines" ? 'selected' : '' }}> Philippines</option>
                        <option value="Singapore" {{ old('country') == "Singapore" ? 'selected' : '' }}> Singapore</option>
                        <option value="Malaysia" {{ old('country') == "Malaysia" ? 'selected' : '' }}> Malaysia</option>
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