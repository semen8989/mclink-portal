@extends('layout.master')

@section('content')
<div class="card-header">Expense Information</div>
<form>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <strong><label>Expense Type</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->expense_type->expense_type }}">
            </div>
            <div class="form-group col-md-4">
                <strong><label>Purchase Date</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->purchase_date }}">
            </div>
            <div class="form-group col-md-4">
                <strong><label>Amount</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->amount }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <strong><label>Company</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->company->company_name }}">
            </div>
            <div class="form-group col-md-4">
                <strong><label>Purchase By</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->user->name }}">
            </div>
            <fieldset class="form-group col-md-4">
                <strong><label>Bill Copy</label></strong>
                <a href="" class="form-control-plaintext">Download File</a>
            </fieldset>
        </div>
        <div class="form-group">
            <strong><label>Remarks</label></strong>
            {!! $expense->remarks !!}
        </div>
    </div>
</form>
@stop