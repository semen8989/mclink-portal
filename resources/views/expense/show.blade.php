@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.view_expense') }}</div>
<form>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <strong><label>{{ __('label.expense_type') }}</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->expense_type->expense_type }}">
            </div>
            <div class="form-group col-md-4">
                <strong><label>{{ __('label.purchase_date') }}</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->purchase_date }}">
            </div>
            <div class="form-group col-md-4">
                <strong><label>{{ __('label.amount') }}</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->amount }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <strong><label>{{ __('label.company') }}</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->company->company_name }}">
            </div>
            <div class="form-group col-md-4">
                <strong><label>{{ __('label.purchase_by') }}</label></strong>
                <input type="text" class="form-control-plaintext" readonly value="{{ $expense->user->name }}">
            </div>
            <fieldset class="form-group col-md-4">
                <strong><label>{{ __('label.bill_copy') }}</label></strong>
                <a href="{{ route('downloadFile',$expense->bill_copy) }}" class="form-control-plaintext">Download File</a>
            </fieldset>
        </div>
        <div class="form-group">
            <strong><label>Remarks</label></strong>
            {!! $expense->remarks !!}
        </div>
    </div>
</form>
@stop