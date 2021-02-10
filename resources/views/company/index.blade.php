@extends('layout.master')

@section('content')
<div class="card-header">Company List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('companies.create') }}">Add New Company</a>
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
                    <a href="{{ route('companies.show', $company->id) }}" title="View">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-zoom') }}"></use>
                        </svg>
                    </a>
                    <a href="{{ route('companies.edit', $company->id) }}" title="Edit">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $company->id }}" id="delete" href="" title="Delete">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                        </svg>
                    </a>
                </td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->website }}</td>
                <td>{{ $company->city }}</td>
                <td>{{ $company->country }}</td>
                <td>{{ $company->user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.delete_modal')
<script>
    $(document).on('click','#delete',function(){
        let id = $(this).attr('data-id');
        var url = '{{ route("companies.destroy",":id") }}'
        url = url.replace(':id',id)
        $('#delete_form').attr('action',url);
    });

</script>
@stop
