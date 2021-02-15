@extends('layout.master')

@section('content')
<div class="card-header">Add New Expense</div>
<form action="{{ route('expenses.store') }}" method="post" novalidate>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="expense_type">Choose Expense Type</label>
            <select id="expense_type" name="expense_type" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="purchase_date">Purchase Date</label>
                <input type="text" class="form-control" id="purchase_date" name="purchase_date" placeholder="Purchase Date">
            </div>
            <div class="form-group col-md-6">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
@stop
