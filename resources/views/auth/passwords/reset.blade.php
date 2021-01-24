@extends('layout.guest.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Password Reset</h1>
                <p class="text-muted">Enter your new password</p>
                <form name="resetForm" role="form" method="POST" action="{{ route('password.update') }}" novalidate>
                  {{ csrf_field() }}
                  <input type="hidden" name="token" value="{{ $token }}">
                  <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
                  <div class="input-group mb-4 validator-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                        </svg></span></div>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password" required autocomplete="new-password">
                    @error('password')
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
                    <input class="form-control" type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" required autocomplete="new-password">
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Reset</button>
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
@stop
