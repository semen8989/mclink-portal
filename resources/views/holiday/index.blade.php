@extends('layout.master')

@section('content')
<div class="card-header">Holiday List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('holidays.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> Add New Holiday
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Company</th>
                <th>Event Name</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $holiday)
                <tr>
                    <td>
                        <a href="{{ route('holidays.edit',$holiday->id) }}" title="Edit">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $holiday->id }}" class="text-danger" id="delete" href="" title="Delete">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a> 
                    </td>
                    <td><a href="{{ route('holidays.show',$holiday->id) }}">{{ $holiday->company->company_name }}</a></td>
                    <td>{{ $holiday->event_name }}</td>
                    <td>{{ ucfirst($holiday->status) }}</td>
                    <td>{{ $holiday->start_date }}</td>
                    <td>{{ $holiday->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.delete_modal')
@stop

@push('scripts')
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("holidays.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush