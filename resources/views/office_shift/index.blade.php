@extends('layout.master')

@section('content')
<div class="card-header">Office Shift List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('office_shifts.create') }}">Add New Office Shift</a>
    </div>
    <table class="table table-responsive-sm table-bordered table-striped">
        <thead>
            <tr>
                <th>Action</th>
                <th>Company</th>
                <th>Day</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>
@stop