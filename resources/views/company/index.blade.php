@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.company_list') }}</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('companies.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> {{ __('label.add_company') }}
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>{{ __('label.action') }}</th>
                <th>{{ __('label.company') }}</th>
                <th>{{ __('label.email') }}</th>
                <th>{{ __('label.website') }}</th>
                <th>{{ __('label.city') }}</th>
                <th>{{ __('label.country') }}</th>
                <th>{{ __('label.added_by') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td style="width: 5%">
                    <a href="{{ route('companies.edit', $company->id) }}" title="{{ __('label.edit') }}">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $company->id }}" class="text-danger" id="delete" href="" title="{{ __('label.delete') }}">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                        </svg>
                    </a>
                </td>
                <td><a href="{{ route('companies.show', $company->id) }}" title="View">{{ $company->company_name }}</a></td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->website }}</td>
                <td>{{ $company->city }}</td>
                <td>{{ $company->country }}</td>
                <td>{{ $company->user->name }}</td>
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
            var url = '{{ route("companies.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>    
@endpush
