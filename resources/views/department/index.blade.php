@extends('layout.master')

@section('content')
<div class="card-header">Department List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('department.create') }}">Add New Department</a>
    </div>
    <table class="table table-responsive-sm">
        <thead>
            <tr>
                <th>Action</th>
                <th>Department Name</th>
                <th>Company</th>
                <th>Department Head</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('department.edit', $department->id) }}">Update</a>
                    <form action="{{ route('department.destroy', $department->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                <td>{{ $department->department_name }}</td>
                <td>{{ $department->company_name }}</td>
                <td>{{ $department->name }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
