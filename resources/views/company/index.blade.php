@extends('layout.master')

@section('content')
<div class="card-header">Company List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('companies.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> Add New Company
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
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
                    <a href="{{ route('companies.edit', $company->id) }}" title="Edit">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $company->id }}" class="text-danger" id="delete" href="" title="Delete">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                        </svg>
                    </a>
                </td>
                <td><a href="{{ route('companies.show', $company->id) }}" title="View">{{ $company->company_name }}</a></td>
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
@stop

@push('scripts')
    <script type="text/javascript" src="{{ asset('plugin/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("companies.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>    
@endpush
