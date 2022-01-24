@extends('layout.master')

@section('content')
    <div class="card-header">
        MCA Indoctrination
    </div>
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="indoctrination">
            {{-- <iframe src="{{ asset('storage/handbook/indoctrination/'.$latestRecord->file_name) }}#toolbar=0" style="width:100%; height:600px;" frameborder="0"></iframe> --}}
            <h4>Old Version Of Indoctrination</h4>
            <ul>
                {{-- @foreach($files as $item)
                    <li><a href="{{ asset('storage/handbook/indoctrination/'.$item->file_name) }}" target="_blank">{{ $item->orig_filename }}</a></li>
                @endforeach --}}
            </ul>
        </div>
    </div>
@stop