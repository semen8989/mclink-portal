@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.view_holiday') }}</div>
<form>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <strong><label>{{ __('label.company') }}</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $holiday->company->company_name }}">
        </div>
        <div class="form-group">
            <strong><label>{{ __('label.event_name') }}</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $holiday->event_name }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <strong><label>{{ __('label.start_date') }}</label></strong>
                <input class="form-control-plaintext" readonly value="{{ $holiday->start_date }}">
            </div>
            <div class="form-group col-md-6">
                <strong><label>{{ __('label.end_date') }}</label></strong>
                <input class="form-control-plaintext" readonly value="{{ $holiday->end_date }}">
            </div>
        </div>
        <div class="form-group">
            <strong><label>{{ __('label.description') }}</label></strong>
            {!! $holiday->description !!}
        </div>
        <div class="form-group">
            <strong><label>{{ __('label.status') }}</label></strong>
            <input class="form-control-plaintext" readonly value="{{ ucfirst($holiday->status) }}">
        </div>
    </div>
    <div class="card-footer text-right">
        <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('holidays.index') }}">
            <svg class="c-icon">
                <use xlink:href="http://mclink-portal.test/assets/icons/sprites/free.svg#cil-arrow-circle-left"></use>
            </svg>
            Back
        </a>
    </div>
</form>
@stop