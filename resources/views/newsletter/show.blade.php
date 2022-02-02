@extends('layout.master')

@section('content')
    <div class="card-header"><b>{{ mb_convert_encoding($post['title']['rendered'],'UTF-8','HTML-ENTITIES') }}</b></div>
    <div class="card-body">
        <img src="{{ $post['_embedded']['wp:featuredmedia']['0']['source_url'] }}" alt="Card image cap" width="100%">
        <hr>
        <div class="content text-center">
            {!! $post['content']['rendered'] !!}
        </div>
    </div>
@stop

@push('stylesheet')
    <style>
        .content figure{
            max-width: 100%;
            max-height: 100%;
        }
    </style>
@endpush