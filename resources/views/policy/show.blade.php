@extends('layout.master')

@section('content')
<div class="card-header">View Policy</div>
<form>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong><label>Title</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $policy->title }}">
                </div>
                <div class="form-group">
                    <strong><label>Company</label></strong>
                    <input class="form-control-plaintext" readonly value="{{ $policy->company->company_name }}">
                </div>
                <div class="form-group">
                    <strong><label for="description">Description</label></strong>                    
                    {!! $policy->description !!}           
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
