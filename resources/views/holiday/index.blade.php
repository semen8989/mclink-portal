@extends('layout.master')

@section('content')
    <div class="card-header">Holiday List</div>
    <div class="card-body">
        <div class="float-right mb-2">
            <a class="btn btn-success" href="{{ route('holidays.create') }}">Add New Holiday</a>
        </div>
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Company</th>
                    <th>Event Name</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
@stop