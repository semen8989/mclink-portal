@extends('layout.master')

@section('content')
    @include('components.handbook.card_header')
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="indoctrination">
            <form class="form-inline" action="{{ route('handbook.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <input type="text" readonly class="form-control-plaintext" value="Upload Indoctrination">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="file" class="form-control-file" name="upload" id="upload">
                </div>
                <button class="btn btn-primary font-weight-bold mb-2" type="submit">
                    Upload
                </button>
            </form>
            <hr>
            <h2>MCA Indoctrination</h2>
            <iframe src="{{ asset('storage/handbook/indoctrination/'.$latestRecord->file_name) }}#toolbar=0" style="width:100%; height:600px;" frameborder="0"></iframe>
            <hr>
            <h4>Old Version Of Indoctrination</h4>
            <ul>
                @foreach($files as $item)
                    <li><a href="{{ asset('storage/handbook/indoctrination/'.$item->file_name) }}" target="_blank">{{ $item->orig_filename }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop