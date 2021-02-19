@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_location') }}</div>
<form method="POST" action="{{ route('locations.store') }}">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_id">{{ __('label.company') }}</label>
                    <select class="form-control @error('company_id') is-invalid @enderror" name="company_id" id="company_id">
                        <option value="" disabled selected>{{ __('label.choose') }}</option>
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
                    <label for="location_name">{{ __('label.location_name') }}</label>
                    <input class="form-control @error('location_name') is-invalid @enderror" name="location_name" id="location_name" type="text" value="{{ old('location_name') }}">
                    @error('location_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{ __('label.email') }}</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('label.phone_number') }}</label>
                    <input class="form-control" name="phone" id="phone" type="number" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="fax_num">{{ __('label.fax_num') }}</label>
                    <input class="form-control" name="fax_num" id="fax_num" type="number" value="{{ old('fax_num') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location_head">{{ __('label.location_head') }}</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                        <option selected disabled>{{ __('label.choose') }}</option>
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
                    <label for="address_1">{{ __('label.address_1') }}</label>
                    <input class="form-control" name="address_1" id="address_1" type="text" value="{{ old('address_1') }}">
                </div>
                <div class="form-group">
                    <label for="address_2">{{ __('label.address_2') }}</label>
                    <input class="form-control" name="address_2" id="address_2" type="text" value="{{ old('address_2') }}">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="city">{{ __('label.city') }}</label>
                        <input class="form-control @error('city') is-invalid @enderror" name="city" id="city" type="text" value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="state">{{ __('label.state') }}</label>
                        <input class="form-control" name="state" id="state" type="text" value="{{ old('state') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="zip_code">{{ __('label.zip_code') }}</label>
                        <input class="form-control" name="zip_code" id="zip_code" type="text" value="{{ old('zip_code') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                        <option value="" disabled selected>{{ __('label.choose') }}</option>
                        <option value="Philippines" {{ old('country') == "Philippines" ? 'selected' : '' }}> Philippines</option>
                        <option value="Singapore" {{ old('country') == "Singapore" ? 'selected' : '' }}> Singapore</option>
                        <option value="Malaysia" {{ old('country') == "Malaysia" ? 'selected' : '' }}> Malaysia</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop