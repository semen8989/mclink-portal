@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.view_location') }}</div>
<form>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>{{ __('label.company') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->company->company_name }}">
                </div>
                <div class="form-group">
                    <strong><label>{{ __('label.location_name') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->location_name }}">
                </div>
                <div class="form-group">
                    <strong><label>{{ __('label.email') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->email }}">
                </div>
                <div class="form-group">
                    <strong><label>{{ __('label.phone') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->phone }}">
                </div>
                <div class="form-group">
                    <strong><label>{{ __('label.fax_num') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->fax_num }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>{{ __('label.location_head') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->user->where('id',$location->user_id)->first()->name }}">
                </div>
                <div class="form-group">
                    <strong><label>{{ __('label.address_1') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->address_1 }}">
                    <br>
                    <strong><label>{{ __('label.address_2') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $location->address_2}}">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <strong><label>{{ __('label.city') }}</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->city }}">
                    </div>
                    <div class="col-md-4">
                        <strong><label>{{ __('label.state') }}</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->state }}">
                    </div>
                    <div class="col-md-4">
                        <strong><label>{{ __('label.zip_code') }}</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->zip_code }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <strong><label>{{ __('label.country') }}</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->country }}">
                    </div>
                    <div class="col-md-4">
                        <strong><label>{{ __('label.added_by') }}</label></strong>
                        <input class="form-control-plaintext" readonly value="{{ $location->user->where('id',$location->added_by)->first()->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop