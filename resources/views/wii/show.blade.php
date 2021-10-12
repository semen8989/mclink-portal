@extends('layout.master')

@section('content')
<div class="card-header"><b>My Wii</b></div>
<form method="POST" id="wii_form" action="{{ route('wii.update', $wii->id) }}" autocomplete="off" novalidate>
    @csrf
    @method('PUT')
    <div class="card-body">
        <span style="font-size: 15px"><em>In order to get your incentive for all <b>APPROVED</b> Wii you MUST mark it as DONE</em></span>
        <hr>
        <h3>Purpose:</h3>
        <p>{{ $wii->purpose }}</p>
        <h3>Current Problem:</h3>
        <p>{{ $wii->problem }}</p>
        <h3>Solution:</h3>
        <p>{{ $wii->solution }}</p>
        @if(auth()->user()->id != 1)
            <h3>Status:</h3>
            <p><span class="badge badge-{{$badgeColor}} px-2 py-1">
                {{ $status }}
            </span></p>
            <h3>Incentive Payment:</h3>
            <p>₱</p>
        @else
            <div class="form-group">
                <h3>Status:</h3>
                <select class="form-control" id="status" name="status">
                    @foreach($statusArray as $statusName => $statusId)
                        <option value="{{ $statusId }}" {{ $statusId == $wii->status ? 'selected' : '' }}>{{ ucfirst($statusName) }}</option>
                    @endforeach
                </select>
            </div>
            @if($wii->status == 1)
                <div class="form-group">
                    <h3>Incentive Payment:</h3>
                    <input class="form-control" name="incentive_payment" id="incentive_payment" type="number">
                </div>
            @endif
            <div class="form-group">
                <h3>Remarks:</h3>
                <textarea class="form-control" name="remarks" id="remarks" cols="30" rows="10">{{ $wii->remarks }}</textarea>
            </div>
        @endif
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
@stop