@extends('layout.master')

@section('content')
<div class="card-header">Location List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('locations.create') }}">Add New Location</a>
    </div>
    <table class="table table-responsive-sm">
        <thead>
            <tr>
                <th>Action</th>
                <th>Location Name</th>
                <th>Company</th>
                <th>Location Head</th>
                <th>City</th>
                <th>Country</th>
                <th>Added By</th>
            </tr>
        </thead>
    </table>
</div>
@stop