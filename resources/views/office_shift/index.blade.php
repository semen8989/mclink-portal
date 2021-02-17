@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.shift_list') }}</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('office_shifts.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> {{ __('label.add_shift') }}
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>{{ __('label.action') }}</th>
                <th>{{ __('label.company') }}</th>
                <th>{{ __('label.day') }}</th>
                <th>{{ __('label.monday') }}</th>
                <th>{{ __('label.tuesday') }}</th>
                <th>{{ __('label.wednesday') }}</th>
                <th>{{ __('label.thursday') }}</th>
                <th>{{ __('label.friday') }}</th>
                <th>{{ __('label.saturday') }}</th>
                <th>{{ __('label.sunday') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($office_shifts as $office_shift)
                <tr>
                    <td style="width: 5%">
                        <a href="{{ route('office_shifts.edit',$office_shift->id) }}" title="{{ __('label.edit') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $office_shift->id }}" class="text-danger" id="delete" href="" title="{{ __('label.delete') }}">
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
@include('layout.delete_modal')
@stop

@push('scripts')
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("office_shifts.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush