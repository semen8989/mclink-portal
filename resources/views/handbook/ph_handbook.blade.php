@extends('layout.master')

@section('content')
    <div class="card-header">
        Philippines Handbook
    </div>
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="phHandbook">
            <iframe src="{{ asset('storage/handbook/PH_Handbook_Revised_Version_2.0_2021.pdf') }}#toolbar=0" style="width:100%; height:600px;" frameborder="0"></iframe>
        </div>
    </div>
@stop