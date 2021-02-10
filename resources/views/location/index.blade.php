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
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td>
                        <a href="{{ route('locations.show',$location->id) }}" title="View">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-zoom') }}"></use>
                            </svg>
                        </a>
                        <a href="{{ route('locations.edit',$location->id) }}" title="Edit">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $location->id }}" id="delete" href="" title="Delete">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a>
                    </td>
                    <td>{{ $location->location_name }}</td>
                    <td>{{ $location->company->company_name }}</td>
                    <td>{{ $location->user->where('id',$location->user_id)->first()->name }}</td>
                    <td>{{ $location->city }}</td>
                    <td>{{ $location->country }}</td>
                    <td>{{ $location->user->where('id',$location->added_by)->first()->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop