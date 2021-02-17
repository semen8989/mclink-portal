@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.department_list') }}</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('departments.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> {{ __('label.add_department') }}
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>{{ __('label.action') }}</th>
                <th>{{ __('label.department_name') }}</th>
                <th>{{ __('label.company') }}</th>
                <th>{{ __('label.department_head') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
                <td style="width: 5%">
                    <a href="{{ route('departments.edit', $department->id) }}" title="Edit">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $department->id }}" class="text-danger" id="delete" href="" title="Delete">
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
@stop

@push('scripts')
    <script type="text/javascript" src="{{ asset('plugin/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("departments.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush
