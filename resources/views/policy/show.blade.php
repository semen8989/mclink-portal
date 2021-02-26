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
            <input class="form-control-plaintext" readonly value="{{ (!empty($policy->company->company_name) ? $policy->company->company_name : '---') }}">
        </div>
        <div class="form-group">
            <strong><label>{{ __('label.description') }}</label></strong>                    
            {!! $policy->description !!}           
        </div>
    </div>
    <div class="card-footer text-right">
        <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('policies.index') }}">
            <svg class="c-icon">
                <use xlink:href="http://mclink-portal.test/assets/icons/sprites/free.svg#cil-arrow-circle-left"></use>
            </svg>
            Back
        </a>
    </div>
</form>
@endsection
