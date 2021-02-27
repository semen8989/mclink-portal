@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.view_shift') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.company') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ $officeShift->company->company_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.shift_name') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ $officeShift->shift_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <!-- empty -->
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext label" readonly value="In Time">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext label" readonly value="Out Time">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.monday') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->monday_in_time) ? date('h:i A', strtotime($officeShift->monday_in_time)) : '---' }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->monday_out_time) ? date('h:i A', strtotime($officeShift->monday_out_time)) : '---' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.tuesday') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->tuesday_in_time) ? date('h:i A', strtotime($officeShift->tuesday_in_time)) : '---' }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->tuesday_out_time) ? date('h:i A', strtotime($officeShift->tuesday_out_time)) : '---' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.wednesday') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->wednesday_in_time) ? date('h:i A', strtotime($officeShift->wednesday_in_time)) : '---' }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->wednesday_out_time) ? date('h:i A', strtotime($officeShift->wednesday_out_time)) : '---' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.thursday') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->thursday_in_time) ? date('h:i A', strtotime($officeShift->thursday_in_time)) : '---' }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->thursday_out_time) ? date('h:i A', strtotime($officeShift->thursday_out_time)) : '---' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.friday') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->friday_in_time) ? date('h:i A', strtotime($officeShift->friday_in_time)) : '---' }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->friday_out_time) ? date('h:i A', strtotime($officeShift->friday_out_time)) : '---' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.saturday') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->saturday_in_time) ? date('h:i A', strtotime($officeShift->saturday_in_time)) : '---' }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->saturday_out_time) ? date('h:i A', strtotime($officeShift->saturday_out_time)) : '---' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control-plaintext label" readonly value="{{ __('label.sunday') }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->sunday_in_time) ? date('h:i A', strtotime($officeShift->sunday_in_time)) : '---' }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control-plaintext" readonly value="{{ !empty($officeShift->sunday_out_time) ? date('h:i A', strtotime($officeShift->sunday_out_time)) : '---' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('office_shifts.index') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
            </svg>
            Back
        </a>
    </div>
@stop

@push('stylesheet')
    <style>
        .label{
            font-weight: bold;
        }
    </style>
@endpush