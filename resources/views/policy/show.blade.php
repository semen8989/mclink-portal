@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.view_policy') }}</div>
<form>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <strong><label>{{ __('label.title') }}</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $policy->title }}">
        </div>
        <div class="form-group">
            <strong><label>{{ __('label.company') }}</label></strong>
            <input class="form-control-plaintext" readonly value="{{ $policy->company->company_name }}">
        </div>
        <div class="form-group">
            <strong><label>{{ __('label.description') }}</label></strong>                    
            {!! $policy->description !!}           
        </div>
    </div>
</form>
@endsection
