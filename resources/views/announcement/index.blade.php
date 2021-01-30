@extends('layout.master')

@section('content')
<div class="card-header">Announcement List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('announcement.create') }}">Add New Announcement</a>
    </div>
    <table class="table table-responsive-sm">
        <thead>
            <tr>
                <th>Action</th>
                <th>Title</th>
                <th>Company</th>
                <th>Summary</th>
                <th>Published For</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $item)
                <tr>
                    <td>---</td>
                    <td>{{ $item->title }}</td>
                    <td></td>
                    <td>{{ $item->summary }}</td>
                    <td></td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection