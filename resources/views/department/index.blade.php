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
                    <a class="btn btn-sm btn-warning" href="{{ route('departments.edit', $department->id) }}" title="Update">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $department->id }}" class="btn btn-sm btn-danger delete" title="Delete">
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
<!-- Delete modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delete_form" method="post">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id">
                    <h5 class="text-center">Are you sure you want to delete this data ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).on('click','.delete',function(){
        let id = $(this).attr('data-id');
        var url = '{{ route("departments.destroy",":id") }}'
        url = url.replace(':id',id)
        $('#delete_form').attr('action',url);
    });

</script>
@endsection
