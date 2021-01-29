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
            @foreach ($companies as $company)
            <tr>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('company.show', $company->id) }}">View</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('company.edit', $company->id) }}">Update</a>
                    <form action="{{ route('company.destroy', $company->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger mt-2 ml-4">Delete</button>
                    </form>
                </td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->website }}</td>
                <td>{{ $company->city }}</td>
                <td>{{ $company->country }}</td>
                <td>{{ $company->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
