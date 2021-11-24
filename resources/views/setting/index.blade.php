@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.setting.title.form') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="row col-md-12">
                <img src="data:image/png;base64, {{ $QR_Image }} "/>
                
            </div>
            
            <div class="col-md-7">
                <h4>{{ __('label.setting.form.label.priv_sec_title') }}</h4>
                <p>{{ __('label.setting.form.label.priv_sec_desc') }}</p>
            </div>
            <div class="col-md-5">
                <form id="settingForm" action="{{ route('setting.update', ['setting' => auth()->user()]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="twofa_enabled" class="font-weight-bold">{{ __('label.setting.form.label.2fa_title') }}</label>
                            </div>
                            <div class="col-md-4"> 
                                <label class="c-switch c-switch-label c-switch-pill c-switch-success float-right">
                                    <input type="hidden" name="twofa_enabled" value="0">
                                    <input class="c-switch-input @error('twofa_enabled')is-invalid @enderror" 
                                        id="twofa_enabled" name="twofa_enabled" type="checkbox" value="1"
                                        @if(old('twofa_enabled', auth()->user()->setting->twofa_enabled) == 1) checked @endif >
                                    <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @error('twofa_enabled')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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
      
        $('#twofa_enabled').change(function() {
            // console.log('hdahd');
            $.ajax({
                url: "",
                type: 'get',
                data: { 
                    month: $(this).val()
                },
                dataType: 'json',
                success: function (result) {
                   
                }
            });
        });

    });
  </script>
@endpush
