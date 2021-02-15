@extends('layout.master')

@section('content')
<div class="card-header">View Holiday Information</div>
<form>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <strong><label>Company</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $holiday->company->company_name }}">
        </div>
        <div class="form-group">
            <strong><label>Event Name</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $holiday->event_name }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <strong><label>Start Date</label></strong>
                <input class="form-control-plaintext" readonly value="{{ $holiday->start_date }}">
            </div>
            <div class="form-group col-md-6">
                <strong><label>End Date</label></strong>
                <input class="form-control-plaintext" readonly value="{{ $holiday->end_date }}">
            </div>
        </div>
        <div class="form-group">
            <strong><label>Description</label></strong>
            {!! $holiday->description !!}
        </div>
        <div class="form-group">
            <strong><label>Status</label></strong>
            <input class="form-control-plaintext" readonly value="{{ ucfirst($holiday->status) }}">
        </div>
    </div>
</form>
@stop