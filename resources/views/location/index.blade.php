@extends('layout.master')

@section('content')
<div class="card-header">{{ __('location_list') }}</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('locations.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> {{ __('label.add_location') }}
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>{{ __('label.action') }}</th>
                <th>{{ __('label.location_name') }}</th>
                <th>{{ __('label.company') }}</th>
                <th>{{ __('label.location_head') }}</th>
                <th>{{ __('label.city') }}</th>
                <th>{{ __('label.country') }}</th>
                <th>{{ __('label.added_by') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td style="width: 5%">
                        <a href="{{ route('locations.edit',$location->id) }}" title="{{ __('label.edit') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $location->id }}" class="text-danger" id="delete" href="" title="{{ __('label.delete') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a>
                    </td>
                    <td><a href="{{ route('locations.show',$location->id) }}">{{ $location->location_name }}</a></td>
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
@include('layout.delete_modal')
@stop

@push('scripts')
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("locations.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush