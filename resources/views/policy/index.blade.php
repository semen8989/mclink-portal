@extends('layout.master')

@section('content')
<div class="card-header">Policy List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('policy.create') }}">Add New Policy</a>
    </div>
    <table class="table table-responsive-sm">
        <thead>
            <tr>
                <th>Action</th>
                <th>Title</th>
                <th>Company</th>
                <th>Created-At</th>
                <th>Added By</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a class="btn btn-sm btn-primary" href="#" title="View">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-zoom') }}"></use>
                        </svg>
                    </a>
                    <a class="btn btn-sm btn-warning" href="#" title="Update">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="" class="btn btn-sm btn-danger delete" title="Delete">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                        </svg>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection