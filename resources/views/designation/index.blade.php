@extends('layout.master')

@section('content')
<div class="card-header">Designation List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('designations.create') }}">Add New Designation</a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Company</th>
                <th>Department</th>
                <th>Designation name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $designation)
                <tr>
                    <td>
                        <a href="{{ route('designations.edit',$designation->id) }}" title="Edit">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $designation->id }}" id="delete" href="" title="Delete">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a> 
                    </td>
                    <td>{{ $designation->company->company_name }}</td>
                    <td>{{ $designation->department->department_name }}</td>
                    <td>{{ $designation->designation_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.delete_modal')
<script>
    $(document).on('click','#delete',function(){
        let id = $(this).attr('data-id');
        var url = '{{ route("designations.destroy",":id") }}'
        url = url.replace(':id',id)
        $('#delete_form').attr('action',url);
    });

</script>
@stop