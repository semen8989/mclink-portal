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
            @foreach ($announcements as $announcement)
                <tr>
                    <td>
                        <a href="{{ route('announcement.edit',$announcement->id) }}" class="btn btn-sm btn-warning" title="Update">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a href="{{ route('announcement.show',$announcement->id) }}" class="btn btn-sm btn-primary" title="View">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-zoom') }}"></use>
                            </svg>
                        </a>
                        <form action="{{ route('announcement.destroy', $announcement->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="Submit" class="btn btn-sm btn-danger" title="Delete">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                                </svg>
                            </button>
                        </form>
                    </td>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->company->company_name }}</td>
                    <td>{{ $announcement->summary }}</td>
                    <td>{{ $announcement->department->department_name }}</td>
                    <td>{{ $announcement->start_date }}</td>
                    <td>{{ $announcement->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection