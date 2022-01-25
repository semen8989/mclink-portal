@extends('layout.master')

@section('content')
    <div class="card-header">
        China Handbook
    </div>
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="phHandbook">
            @if(!empty($latestRecord))
                <iframe src="{{ asset('storage/handbook/ch_handbook/'.$latestRecord->file_name) }}#toolbar=0" style="width:100%; height:600px;" frameborder="0"></iframe>
            @endif
        </div>
    </div>
@stop