@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.policy_list') }}</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('policies.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> Add New Policy
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>{{ __('label.action') }}</th>
                <th>{{ __('label.title') }}</th>
                <th>{{ __('label.company') }}</th>
                <th>{{ __('label.created_at') }}</th>
                <th>{{ __('label.added_by') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($policies as $policy)
                    <td style="width: 5%">
                        <a href="{{ route('policies.edit',$policy->id) }}" title="{{ __('label.edit') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $policy->id }}" class="text-danger" id="delete" href="" title="Delete">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a>
                    </td>
                    <td><a href="{{ route('policies.show',$policy->id) }}" title="{{ __('label.view') }}">{{ $policy->title }}</a></td>
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