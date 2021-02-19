@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_company') }}</div>
<form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">{{ __('label.company_name') }}</label>
                    <input class="form-control @error('company_name') is-invalid @enderror" name="company_name" id="company_name" value="{{ old('company_name') }}" type="text">
                    @error('company_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_type">{{ __('label.company_type') }}</label>
                            <select class="form-control @error('company_type') is-invalid @enderror" name="company_type" id="company_type">
                                <option value="" disabled selected>{{ __('label.choose') }}</option>
                                <option value="Private" {{ old('company_type') == "Private" ? 'selected' : '' }}> Private</option>
                                <option value="Corporation" {{ old('company_type') == "Corporation" ? 'selected' : '' }}> Corporation</option>
                            </select>
                            @error('company_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="trading_name">{{ __('label.trading_name') }}</label>
                            <input class="form-control @error('trading_name') is-invalid @enderror" name="trading_name" value="{{ old('trading_name') }}" type="text">
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
                            <label for="registration_no">{{ __('label.registration_number') }}</label>
                            <input class="form-control @error('registration_no') is-invalid @enderror" name="registration_no" value="{{ old('registration_no') }}" type="text">
                            @error('registration_no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contact_number">{{ __('label.contact_number') }}</label>
                            <input class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" type="number">
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
                            <label for="email">{{ __('label.email') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="website">{{ __('label.website') }}</label>
                            <input class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" type="text">
                            @error('website')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="xin_gtax">{{ __('label.xin_gtax') }}</label>
                    <input class="form-control  @error('xin_gtax') is-invalid @enderror" name="xin_gtax" value="{{ old('xin_gtax') }}" type="text">
                    @error('xin_gtax')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">{{ __('label.address_1') }}</label>
                    <input class="form-control @error('address_1') is-invalid @enderror" name="address_1" value="{{ old('address_1') }}" type="text">
                    @error('address_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">{{ __('label.address_2') }}</label>
                    <input class="form-control @error('address_2') is-invalid @enderror" name="address_2" value="{{ old('address_2') }}" type="text">
                    @error('address_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city">{{ __('label.city') }}</label>
                        <input class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city') }}" type="text">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">{{ __('label.state') }}</label>
                        <input class="form-control @error('state') is-invalid @enderror" name="state" id="state" value="{{ old('state') }}" type="text">
                        @error('state')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="zip_code">{{ __('label.zip_code') }}</label>
                        <input class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" type="text">
                        @error('zip_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">{{ __('label.country') }}</label>
                    <select class="form-control @error('country') is-invalid @enderror" name="country" id="country">
                        <option value="" disabled selected>{{ __('label.choose') }}</option>
                        <option value="Philippines" {{ old('country') == "Philippines" ? 'selected' : '' }}> Philippines</option>
                        <option value="Singapore" {{ old('country') == "Singapore" ? 'selected' : '' }}> Singapore</option>
                        <option value="Malaysia" {{ old('country') == "Malaysia" ? 'selected' : '' }}> Malaysia</option>
                    </select>
                    @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <fieldset class="form-group">
                    <label for="logo">{{ __('label.company_logo') }}</label>
                    <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo">
                    <small>{{ __('label.upload_format') }}</small>
                    @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </fieldset>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop
