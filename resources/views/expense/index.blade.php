@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.expense_list') }}</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('expenses.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> {{ __('label.add_expense') }}
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>{{ __('label.action') }}</th>
                <th>{{ __('label.employee') }}</th>
                <th>{{ __('label.company') }}</th>
                <th>{{ __('label.expense') }}</th>
                <th>{{ __('label.amount') }}</th>
                <th>{{ __('label.purchase_date') }}</th>
                <th>{{ __('label.status') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td style="width: 5%">
                        <a href="{{ route('expenses.edit',$expense->id) }}" title="{{ __('label.edit') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $expense->id }}" class="text-danger" id="delete" href="" title="{{ __('label.delete') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                            </svg>
                        </a> 
                    </td>
                    <td><a href="{{ route('expenses.show',$expense->id) }}">{{ $expense->user->name }}</a></td>
                    <td>{{ $expense->company->company_name }}</td>
                    <td>{{ $expense->expense_type->expense_type }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->purchase_date }}</td>
                    <td>{{ ucfirst($expense->status) }}</td>
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
            var url = '{{ route("expenses.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush