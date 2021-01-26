@extends('layout.master')

@section('content')
<div class="card-header">Announcements</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('company.create') }}">Add New Company</a>
    </div>
    <table class="table table-responsive-sm">
        <thead>
            <tr>
                <th>Action</th>
                <th>Company</th>
                <th>Email</th>
                <th>Website</th>
                <th>City</th>
                <th>Country</th>
                <th>Added By</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
            </tr>
        </tbody>
    </table>
</div>
@endsection