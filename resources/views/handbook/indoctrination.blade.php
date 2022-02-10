@extends('layout.master')

@section('content')
    <div class="card-header">
        MCA Indoctrination
    </div>
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="indoctrination">
            @if(!empty($data['latestRecord']))
                <iframe src="{{ asset('storage/handbook/indoctrination/'.$data['latestRecord']->file_name) }}#toolbar=0" style="width:100%; height:600px;" frameborder="0"></iframe>
            @endif
            <h4>Old Version Of Indoctrination</h4>
            <ul>
                @if(!empty($data['files']))
                    @foreach($data['files'] as $item)
                        <li><a href="{{ asset('storage/handbook/indoctrination/'.$item->file_name) }}" target="_blank">{{ $item->orig_filename }}</a></li>
                    @endforeach
                @else
                    <li>No Files Available</li>
                @endif
            </ul>
        </div>
    </div>
@stop