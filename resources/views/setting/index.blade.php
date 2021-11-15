@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.profile') }}</div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-7">
                <h4>{{ __('label.update') }} {{ __('label.password') }}</h4>
                <p>{{ __('label.ensure_your_account_is_using_a_strong_password') }}</p>
            </div>
            <div class="col-md-5">
                <form id="settingForm" action="{{ route('setting.update', ['setting' => auth()->user()]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="2fa_enabled" class="font-weight-bold">Enable Two-Factor Authentication</label>
                            </div>
                            <div class="col-md-4">
                                <label class="c-switch c-switch-label c-switch-pill c-switch-success float-right">
                                    <input class="c-switch-input @error('2fa_enabled') is-invalid @enderror" id="2fa_enabled" name="2fa_enabled" type="checkbox" checked=""><span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                </label>
                            </div>
                        </div>      
                        @error('2fa_enabled')
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

@push('scripts')
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {




    // $( "#2fa_enabled" ).change(function() {
    //     alert($(this).val());
    // });

    // $('#2fa_enabled').click(function(){
    //     if($(this).prop("checked") == true){
    //         console.log("Checkbox is checked.");
    //     } else if($(this).prop("checked") == false){
    //         console.log("Checkbox is unchecked.");
    //     }
    // });

      $('#settingForm').submit(function (event) {
        
        if ($('#2fa_enabled').prop("checked") == true) {
            $('#2fa_enabled').val(1);
            console.log("Checkbox is checked.");
        } else if ($('#2fa_enabled').prop("checked") == false) {
            $('#2fa_enabled').val(0);
            console.log("Checkbox is unchecked.");
            // console.log( $('#2fa_enabled').val());
        }
        // $(this).find(':submit').prop('disabled', true);
      });






    });
  </script>
@endpush