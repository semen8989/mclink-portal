@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.setting.title.form') }}</div>
    <div class="card-body">
        <div class="row">
            <div class=""></div>
            <div class="col-md-6">
                <h4>{{ __('label.setting.form.label.priv_sec_title') }}</h4>
                <p>{{ __('label.setting.form.label.priv_sec_desc') }}</p>
            </div>
            <div class="col-md-6">
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
                        <div class="row">
                            <div class="col-md-8 pt-2">
                                <p class="font-italic">Setup your two-factor authentication by scanning the barcode with your Google Authenticator app. Alternatively, you can use the code in your authenticator.</label>
                            </div>
                            <div class="col-md-4 px-0"> 
                                <div id="qr" class="float-right">
                                    {!! $QR_Image !!}
                                </div>
                            </div>      
                        </div>
                        <div class="row">
                            Test Input<input name="test_input" type="text">
                        </div>
                    </div>
       
                    <input type="submit" class="btn btn-dark float-right" value="{{ Str::upper(__('label.save')) }}">
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="verifyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifyModalLabel">Verify Password</h5>
                    <button id="modal-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 pb-3">
                                <form id="verifyForm" action="{{ route('setting.auth.2fa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>

                                    <input type="hidden" name="twofa">

                                    <button type="submit" class="btn btn-primary float-right">Verify</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts')
  <!-- Page js codes -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>   
    $(document).ready(function() {

        var verify = $('#verifyModal').modal({
            keyboard: false,
            backdrop: 'static',
            show: false
        });
        
        $('#twofa_enabled').change(function() {
            verify.modal('show');
          
            // $.ajax({
            //     url: "",
            //     type: 'get',
            //     data: { 
            //         month: $(this).val()
            //     },
            //     dataType: 'json',
            //     success: function (result) {
                   
            //     }
            // });
        });

        verify.on('hide.bs.modal', function (e) {
            if ($('#twofa_enabled').prop('checked') == true) {
                $('#twofa_enabled').prop( "checked", false);
            } else {
                $('#twofa_enabled').prop( "checked", true);
            }
        })

        $('#verifyForm').submit(function (event) {
            // console.log('testing');
            $('#twofa').val($('#twofa_enabled').val());
            
            // $(this).find(':submit').prop('disabled', true);
        });

    });
  </script>
@endpush
