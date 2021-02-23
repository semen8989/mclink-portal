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
                    <td><a href="{{ route('office_shifts.show',$office_shift->id) }}">{{ $office_shift->company->company_name }}</a></td>
                    <td>{{ $office_shift->shift_name }}</td>
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