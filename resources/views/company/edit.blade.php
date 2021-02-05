@extends('layout.master')

@section('content')
<div class="card-header">Edit Company Information</div>
<form method="POST" action="{{ route('companies.update', $company->id) }}" novalidate>
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input class="form-control @error('company_name') is-invalid @enderror" placeholder="Company Name" 
                        name="company_name" value="{{ old('company_name', $company->company_name) }}" type="text">
                    @error('company_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_type">Company Type</label>
                            <select class="form-control @error('company_type') is-invalid @enderror" name="company_type"
                                data-placeholder="Company Type">
                                <option value="" disabled selected>Select Company Type</option>
                                <option value="Private" {{ old('company_type', $company->company_type) == "Private" ? 'selected' : '' }}> Private</option>
                                <option value="Corporation" {{ old('company_type', $company->company_type) == "Corporation" ? 'selected' : '' }}> Corporation</option>
                            </select>
                            @error('company_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="trading_name">Legal / Trading Name</label>
                            <input class="form-control @error('trading_name') is-invalid @enderror" placeholder="Legal / Trading Name" 
                                name="trading_name" value="{{ old('trading_name',$company->trading_name) }}" type="text">
                            @error('trading_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="registration_no">Registration Number</label>
                            <input class="form-control @error('registration_no') is-invalid @enderror" placeholder="Registration Number" 
                                name="registration_no" value="{{ old('registration_no', $company->registration_no) }}" type="text">
                            @error('registration_no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contact_number">Contact Number</label>
                            <input class="form-control @error('contact_number') is-invalid @enderror" placeholder="Contact Number" 
                                name="contact_number" value="{{ old('contact_number', $company->contact_number) }}" type="number">
                            @error('contact_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" 
                                value="{{ old('email', $company->email) }}" type="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="website">Website</label>
                            <input class="form-control @error('website') is-invalid @enderror" placeholder="Website URL" 
                                name="website" value="{{ old('website', $company->website) }}" type="text">
                            @error('website')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="xin_gtax">Tax Number / EIN</label>
                    <input class="form-control  @error('xin_gtax') is-invalid @enderror" placeholder="Tax Number / EIN" 
                        name="xin_gtax" value="{{ old('xin_gtax', $company->xin_gtax) }}" type="text">
                    @error('xin_gtax')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control @error('address_1') is-invalid @enderror" placeholder="Address Line 1" 
                        name="address_1" value="{{ old('address_1', $company->address_1) }}" type="text">
                    @error('address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <input class="form-control @error('address_2') is-invalid @enderror" placeholder="Address Line 2" 
                        name="address_2" value="{{ old('address_2', $company->address_2) }}" type="text">
                    @error('address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control @error('city') is-invalid @enderror" placeholder="City" 
                                name="city" value="{{ old('city', $company->city) }}" type="text">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('state') is-invalid @enderror" placeholder="State / Province" 
                                name="state" value="{{ old('state', $company->state) }}" type="text">
                            @error('state')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('zip_code') is-invalid @enderror" placeholder="Zip Code / Postal Code" 
                                name="zip_code" value="{{ old('zip_code', $company->zip_code) }}" type="text">
                            @error('zip_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <select class="form-control @error('country') is-invalid @enderror" data-placeholder="Country" name="country">
                        <option value="" disabled selected>Select Country</option>
                        <option value="Philippines" {{ old('country', $company->country) == "Philippines" ? 'selected' : '' }}> Philippines</option>
                        <option value="Singapore" {{ old('country', $company->country) == "Singapore" ? 'selected' : '' }}> Singapore</option>
                        <option value="Malaysia" {{ old('country', $company->country) == "Malaysia" ? 'selected' : '' }}> Malaysia</option>
                    </select>
                    @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
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
