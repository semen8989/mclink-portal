@extends('layout.guest.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-body">

                        <h1>{{ __('label.auth.form.label.2fa_main_title') }}</h1>
                        <p class="text-muted mb-4">{{ __('label.auth.form.label.2fa_sec_title') }}</p>
                        
                        <form id="otpForm" name="otpForm" role="form" method="POST" action="{{ route('2fa.verify') }}" novalidate>
                            @csrf
                            <div class="input-group mb-3 validator-group">
                                <div class="input-group-prepend"><span class="input-group-text">
                                    <svg class="c-icon">
                                    <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                                    </svg></span></div>
                                <input class="form-control @error('token_2fa') is-invalid @enderror @if (session('token_error')) is-invalid @endif" type="text" name="token_2fa" id="token_2fa" value="{{ old('token_2fa') }}" required autofocus>           
                                @error('token_2fa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @if ($message = session('token_error'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>  
                                @endif                          
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4" type="submit">{{ __('label.global.form.button.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection
