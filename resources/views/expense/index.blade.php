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
                <th>Company</th>
                <th>Employee</th>
                <th>Expense</th>
                <th>Amount</th>
                <th>Purchase Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 5%">
                    <a href="#" title="Edit">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                        </svg>
                    </a>
                    <a data-toggle="modal" data-target="#delete_modal" data-id="#" class="text-danger" id="delete" href="" title="Delete">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
                        </svg>
                    </a> 
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@stop