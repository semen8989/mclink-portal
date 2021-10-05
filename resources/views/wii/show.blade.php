@extends('layout.master')

@section('content')
<div class="card-header"><b>My Wii</b></div>
<div class="card-body">
    <span style="font-size: 15px"><em>In order to get your incentive for all <b>APPROVED</b> Wii you MUST mark it as DONE</em></span>
    <hr>
    <h3>Purpose:</h3>
    <p>{{ $wii->purpose }}</p>
    <h3>Current Problem:</h3>
    <p>{{ $wii->problem }}</p>
    <h3>Solution:</h3>
    <p>{{ $wii->solution }}</p>
    <h3>Status:</h3>
    <p><span class="badge badge-{{$badgeColor}} px-2 py-1">
        {{ $status }}
    </span></p>
    <h3>Incentive Payment:</h3>
    <p>₱</p>
</div>
@stop