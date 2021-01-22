@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Password Reset</h1>
                <p class="text-muted">Enter the email address associated with your account</p>
                <form name="resetForm" role="form" method="POST" action="{{ route('password.email') }}" novalidate>
                  {{ csrf_field() }}
                  <div class="input-group mb-3 validator-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-user') }}"></use>
                        </svg></span>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-6" type="submit">Send Recovery Email</button>
                    </div>
                    <div class="col-6 text-right">
                      <a class="btn btn-link px-0" type="button" href="{{ url('/') }}">Back to Home</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
