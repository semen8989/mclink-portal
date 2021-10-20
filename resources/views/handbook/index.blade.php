@extends('layout.master')

@section('content')
    <div class="card-header">
        Handbook
    </div>
    <div class="card-body">
        <form action="{{ route('handbook.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="logo">Indoctrination</label>
                <input type="file" class="form-control-file" name="upload" id="upload">
                <small>Upload files only: pdf</small>
            </div>
            <button class="btn btn-primary font-weight-bold float-right" type="submit">
                Save
            </button>
        </form>
        <iframe src="{{ asset('storage/handbook/'.$latestRecord->file_name) }}#toolbar=0" style="width:100%; height:600px;" frameborder="0"></iframe>
        <h4>Old Version Of Indoctrination</h4>
        <ul>
            @foreach($files as $item)
                 <li>{{ $item->orig_filename }}</li>
            @endforeach
        </ul>
    </div>
@stop