@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.announcement_list') }}</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('announcements.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> {{ __('label.add_announcement') }}
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>{{ __('label.action') }}</th>
                <th>{{ __('label.title') }}</th>
                <th>{{ __('label.company') }}</th>
                <th>{{ __('label.summary') }}</th>
                <th>{{ __('label.published_for') }}</th>
                <th>{{ __('label.start_date') }}</th>
                <th>{{ __('label.end_date') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td style="width: 5%">
                        <a href="{{ route('announcements.edit',$announcement->id) }}" title="{{ __('label.edit') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $announcement->id }}" class="text-danger" id="delete" href="" title="{{ __('label.delete') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a>
                    </td>
                    <td><a href="{{ route('announcements.show',$announcement->id) }}" title="{{ __('label.view') }}">{{ $announcement->title }}</a></td>
                    <td>{{ $announcement->company->company_name }}</td>
                    <td>{{ $announcement->summary }}</td>
                    <td>{{ $announcement->department->department_name }}</td>
                    <td>{{ $announcement->start_date }}</td>
                    <td>{{ $announcement->end_date }}</td>
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
            var url = '{{ route("announcements.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush