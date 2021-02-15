@extends('layout.master')

@section('content')
<div class="card-header">Announcement List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('announcements.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> Add New Announcement
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Title</th>
                <th>Company</th>
                <th>Summary</th>
                <th>Published For</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td style="width: 5%">
                        <a href="{{ route('announcements.edit',$announcement->id) }}" title="Edit">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $announcement->id }}" class="text-danger" id="delete" href="" title="Delete">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a>
                        
                    </td>
                    <td><a href="{{ route('announcements.show',$announcement->id) }}" title="View">{{ $announcement->title }}</a></td>
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