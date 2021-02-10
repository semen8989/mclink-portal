@extends('layout.master')

@section('content')
<div class="card-header">Department List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('departments.create') }}">Add New Department</a>
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
                    <a href="{{ route('departments.edit', $department->id) }}" title="Edit">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $department->id }}" id="delete" href="" title="Delete">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                        </svg>
                    </a>
                </td>
                <td>{{ $department->department_name }}</td>
                <td>{{ $department->company->company_name }}</td>
                <td>
                    @if(!empty($department->user->name))
                        {{ $department->user->name }}
                    @else
                        -----
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.delete_modal')
<script>
    $(document).on('click','#delete',function(){
        let id = $(this).attr('data-id');
        var url = '{{ route("departments.destroy",":id") }}'
        url = url.replace(':id',id)
        $('#delete_form').attr('action',url);
    });

</script>
@stop
