@extends('layout.master')

@section('content')
<div class="card-header">Expense List</div>
<div class="card-body">
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('expenses.create') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-plus') }}"></use>
            </svg> Add New Expense
        </a>
    </div>
    <table class="table table-responsive-sm table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Employee</th>
                <th>Company</th>
                <th>Expense</th>
                <th>Amount</th>
                <th>Purchase Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td style="width: 5%">
                        <a href="{{ route('expenses.edit',$expense->id) }}" title="Edit">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $expense->id }}" class="text-danger" id="delete" href="" title="Delete">
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
@stop