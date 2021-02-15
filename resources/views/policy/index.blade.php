@extends('layout.master')

@section('content')
<div class="card-header">Policy List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('policies.create') }}">Add New Policy</a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Title</th>
                <th>Company</th>
                <th>Created-At</th>
                <th>Added By</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($policies as $policy)
                    <td>
                        <a href="{{ route('policies.show',$policy->id) }}" title="View">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-zoom') }}"></use>
                            </svg>
                        </a>
                        <a href="{{ route('policies.edit',$policy->id) }}" title="Edit">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $policy->id }}" id="delete" href="" title="Delete">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a>
                    </td>
                    <td>{{ $policy->title }}</td>
                    <td>
                        @if(!@empty($policy->company->company_name))
                            {{ $policy->company->company_name }}
                        @else
                            ---
                        @endif
                    </td>
                    <td>
                        {{ $policy->created_at->format('M d Y') }}
                    </td>
                    <td>
                        {{ $policy->user->name }}
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@include('layout.delete_modal')
@stop

@push('scripts')
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("policies.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });

    </script>
@endpush