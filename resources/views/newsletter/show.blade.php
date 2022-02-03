@extends('layout.master')

@section('content')
    <div class="card-header"><b>{{ mb_convert_encoding($post['title']['rendered'],'UTF-8','HTML-ENTITIES') }}</b></div>
    <div class="card-body">
        <img src="{{ $post['_embedded']['wp:featuredmedia']['0']['source_url'] }}" alt="Card image cap" width="100%">
        <hr>
        <div class="container-fluid text-center">
            {!! $post['content']['rendered'] !!}
        </div>
    </div>
@stop

@push('stylesheet')
    <style>
        @media only screen and (max-width: 768px) {
            .container-fluid figure img {
                width: 100%;
                height: auto;
            }
        }   
    </style>
@endpush