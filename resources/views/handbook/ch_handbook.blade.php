@extends('layout.master')

@section('content')
    @include('components.handbook.card_header')
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="phHandbook">
            <h2>China Handbook</h2>
            <iframe src="{{ asset('storage/handbook/Mclink-China-Handbook.pdf') }}#toolbar=0" style="width:100%; height:600px;" frameborder="0"></iframe>
        </div>
    </div>
@stop