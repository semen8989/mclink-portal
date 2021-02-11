@extends('layout.master')

@section('content')
<div class="card-header">Office Shift List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('office_shifts.create') }}">Add New Office Shift</a>
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Company</th>
                    <th>Day</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
            </thead>
            <tbody>
                @foreach($office_shifts as $office_shift)
                    <tr>
                        <td>
                            <a href="{{ route('office_shifts.edit',$office_shift->id) }}" title="Edit">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                                </svg>
                            </a>
                            <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $office_shift->id }}" id="delete" href="" title="Delete">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                                </svg>
                            </a>
                        </td>
                        <td>{{ $office_shift->company->company_name }}</td>
                        <td>{{ $office_shift->shift_name }}</td>
                        <td>{{ !empty($office_shift->monday_in_time) ? date('h:i a', strtotime($office_shift->monday_in_time)) .' - '. date('h:i a', strtotime($office_shift->monday_out_time)) : '--' }}</td>
                        <td>{{ !empty($office_shift->tuesday_in_time) ? date('h:i a', strtotime($office_shift->tuesday_in_time)) .' - '. date('h:i a', strtotime($office_shift->tuesday_out_time)) : '--' }}</td>
                        <td>{{ !empty($office_shift->wednesday_in_time) ? date('h:i a', strtotime($office_shift->wednesday_in_time)) .' - '. date('h:i a', strtotime($office_shift->wednesday_out_time)) : '--'  }}</td>
                        <td>{{ !empty($office_shift->thursday_in_time) ? date('h:i a', strtotime($office_shift->thursday_in_time)) .' - '. date('h:i a', strtotime($office_shift->thursday_out_time)) : '--'}}</td>
                        <td>{{ !empty($office_shift->friday_in_time) ? date('h:i a', strtotime($office_shift->friday_in_time)) .' - '. date('h:i a', strtotime($office_shift->friday_out_time)) : '--' }}</td>
                        <td>{{ !empty($office_shift->saturday_in_time) ? date('h:i a', strtotime($office_shift->saturday_in_time)) .' - '. date('h:i a', strtotime($office_shift->saturday_out_time)) : '--' }}</td>
                        <td>{{ !empty($office_shift->sunday_in_time) ? date('h:i a', strtotime($office_shift->sunday_in_time)) .' - '. date('h:i a', strtotime($office_shift->sunday_out_time)) : '--' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layout.delete_modal')
<script>
    $(document).on('click','#delete',function(){
        let id = $(this).attr('data-id');
        var url = '{{ route("office_shifts.destroy",":id") }}'
        url = url.replace(':id',id)
        $('#delete_form').attr('action',url);
    });

</script>
@stop