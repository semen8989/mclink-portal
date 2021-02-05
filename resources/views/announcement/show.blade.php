@extends('layout.master')

@section('content')
<div class="card-header">View Announcement</div>
<form>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label for="title">Title</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $announcement->title }}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label for="start_date">Start Date</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->start_date }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>End Date</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->end_date }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong><label>Company</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->company->company_name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" id="department_ajax">
                            <strong><label>Department</label></strong>
                            <input class="form-control-plaintext" readonly value="{{ $announcement->department->department_name }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label for="description">Description</label></strong>                    
                            {!! $announcement->description !!}           
                </div>
            </div>
        </div>
        <div class="form-group">
            <strong><label for="summary">Summary</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $announcement->summary }}">
        </div>
    </div>
</form>
@stop
