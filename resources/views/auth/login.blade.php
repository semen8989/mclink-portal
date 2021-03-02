@extends('layout.guest.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>{{ __('label.login') }}</h1>
                <p class="text-muted">{{ __('label.sign_in_to_your_account') }}</p>
                <form class="loginForm" id="loginForm" name="loginForm" role="form" method="POST" action="{{ route('login') }}" novalidate>
                  @csrf
                  <div class="input-group mb-3 validator-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-user') }}"></use>
                        </svg></span></div>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="input-group mb-4 validator-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                        </svg></span></div>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">{{ __('label.login') }}</button>
                    </div>
                    <div class="col-6 text-right">
                      <a class="btn btn-link px-0" type="button" href="{{ url('/password/reset') }}">{{ __('label.forgot_password') }}</a>
                    </div>
                  </div>
                </form>
                
              </div>
              <p class="mt-3 text-center">
                <a href="{{ route('socialite.index') }}" class="btn btn-outline-success">Sign In with Google</a>
              </p>
            </div>  
          </div>
        </div>
    </div>
@endsection