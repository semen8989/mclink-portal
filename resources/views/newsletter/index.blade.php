@extends('layout.master')

@section('content')
  <div class="card-header">Newsletter</div>
    <div class="card-body">
      <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-3 col-sm-12 mb-3"> 
          <div class="card text-center h-100">
            <a href="{{ route('newsletter.show',$post['id']) }}"><img class="card-img-top" src="{{ $post['_embedded']['wp:featuredmedia']['0']['source_url'] }}" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title">{{ mb_convert_encoding($post['title']['rendered'],'UTF-8','HTML-ENTITIES') }}</h5>
              <h6 class="card-subtitle mb-2 text-muted"><em>By <b>{{ ucfirst($post['_embedded']['author']['0']['name']) }}</b></em></h6>
              <h6 class="card-subtitle mb-2 text-muted"><em>{{ date("F j, Y", strtotime($post['date'])) }}</em></h6>
            </div>
            <div class="card-footer">
              <a href="{{ route('newsletter.show',$post['id']) }}" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item {{ ($data['currentPage'] <= 1) ? 'disabled' : '' }}"><a class="page-link" href="{{ route('newsletter.index',['page' => $data['currentPage'] - 1]) }}">Previous</a></li>
          @for ($i = 1; $i <= $data['totalPages']; $i++)
              <li class="page-item {{ ($data['currentPage'] == $i) ? 'active' : '' }}"><a class="page-link" href="{{ route('newsletter.index',['page' => $i]) }}">{{ $i }}</a></li>  
          @endfor
          <li class="page-item {{ ($data['currentPage'] == $data['totalPages']) ? 'disabled' : '' }}"><a class="page-link" href="{{ route('newsletter.index',['page' => $data['currentPage'] + 1]) }}">Next</a></li>
        </ul>
      </nav>
    </div>  
@stop