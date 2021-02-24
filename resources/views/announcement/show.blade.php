@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.view_announcement') }}</div>
<form>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label for="title">{{ __('label.title') }}</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $announcement->title }}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label for="start_date">{{ __('label.start_date') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->start_date }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label for="end_date">{{ __('label.end_date') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->end_date }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong><label>{{ __('label.company') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->company->company_name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" id="department_ajax">
                            <strong><label>{{ __('label.department') }}</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->department->department_name }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label for="description">{{ __('label.description') }}</label></strong>                    
                            {!! $announcement->description !!}           
                </div>
            </div>
        </div>
        <div class="form-group">
            <strong><label for="summary">{{ __('label.summary') }}</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $announcement->summary }}">
        </div>
    </div>
    <div class="card-footer text-right">
        <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('announcements.index') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
            </svg>
            Back
        </a>
    </div>
</form>
@stop
