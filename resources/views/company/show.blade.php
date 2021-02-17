@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.view_company') }}</div>
<form>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>{{ __('label.company') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $company->company_name }}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><label>{{ __('label.company_type') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->company_type }}">
                        </div>
                        <div class="col-md-6">
                            <strong><label>{{ __('label.trading_name') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->trading_name }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><label>{{ __('label.registration_number') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->registration_no }}">
                        </div>
                        <div class="col-md-6">
                            <strong><label>{{ __('label.contact_number') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->contact_number }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><label>{{ __('label.email') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->email }}">
                        </div>
                        <div class="col-md-6">
                            <strong><label>{{ __('label.website') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->website }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <strong><label>{{ __('label.xin_gtax') }}</label></strong>
                                <input class="form-control-plaintext" readonly value="{{ $company->xin_gtax }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>{{ __('label.address_1') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $company->address_1 }}">
                    <strong><label class="mt-3">{{ __('label.address_2') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $company->address_2 }}">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <strong><label>{{ __('label.city') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->city }}">
                        </div>
                        <div class="col-md-4">
                            <strong><label>{{ __('label.state') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->state }}">
                        </div>
                        <div class="col-md-4">
                            <strong><label>{{ __('label.zip_code') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->zip_code }}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>{{ __('label.country') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->country }}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>{{ __('label.company_logo') }}</label></strong>
                            <img style="width: 100%" src="{{ asset('storage/company_logos/'.$company->logo) }}" alt="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <strong><label>{{ __('label.added_by') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $company->user->name }}">
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
