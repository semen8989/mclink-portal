@extends('layout.master')

@section('content')
  <div class="card-header">{{ __('label.dashboard') }}</div>
  @foreach ($posts as $post)
    <div class="card-body">
      <div class="card text-center" style="width: 18rem;">
        <img class="card-img-top" src="{{ $post['_embedded']['wp:featuredmedia']['0']['source_url'] }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ mb_convert_encoding($post['title']['rendered'],'UTF-8','HTML-ENTITIES') }}</h5>
          <h6 class="card-subtitle mb-2 text-muted"><em>By <b>{{ ucfirst($post['_embedded']['author']['0']['name']) }}</b></em></h6>
          <h6 class="card-subtitle mb-2 text-muted"><em>{{ date("F j, Y",strtotime($post['date'])); }}</em></h6>
          <a href="{{ route('home.content',$post['id']) }}" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
  @endforeach
@stop