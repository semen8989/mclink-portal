@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.profile') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <h4>{{ __('label.profile') }} {{ __('label.information') }}</h4>
                <p>{{ __('label.update_profile_informationand_email_address') }}</p>
            </div>
            <div class="col-md-7">
                <form action="{{ route('profile.update', ['profile' => auth()->user()]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="photo" class="font-weight-bold">{{ __('label.photo') }}</label><br>
                        <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->email }}">
                    </div>

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">{{ __('label.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ auth()->user()->name ?? old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="font-weight-bold">{{ __('label.email') }}</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ auth()->user()->email ?? old('email')}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-dark float-right" value="{{ Str::upper(__('label.save')) }}">
                </form>
            </div>

            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-5">
                <h4>{{ __('label.update') }} {{ __('label.password') }}</h4>
                <p>{{ __('label.ensure_your_account_is_using_a_strong_password') }}</p>
            </div>
            <div class="col-md-7">
                <form action="{{ route('change-password.update', ['change_password'=>auth()->user()]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password" class="font-weight-bold">{{ __('label.current') }} {{ __('label.password') }}</label>
                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password" class="font-weight-bold">{{ __('label.new') }} {{ __('label.password') }}</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirm_new_password" class="font-weight-bold">{{ __('label.confirm') }} {{ __('label.password') }}</label>
                        <input type="password" name="confirm_new_password" class="form-control @error('confirm_new_password') is-invalid @enderror" id="confirm_new_password">
                        @error('confirm_new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-dark float-right" value="{{ Str::upper(__('label.save')) }}">
                </form>
            </div>

        </div>
    </div>
@stop