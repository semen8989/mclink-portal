@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_company') }}</div>
<form method="POST" id="company_form" action="{{ route('companies.store') }}" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">{{ __('label.company_name') }}</label>
                    <input class="form-control" name="company_name" id="company_name" type="text">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_type">{{ __('label.company_type') }}</label>
                            <select class="form-control" name="company_type" id="company_type">
                                <option value="" disabled selected>{{ __('label.choose') }}</option>
                                <option value="Private"> Private</option>
                                <option value="Corporation"> Corporation</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="trading_name">{{ __('label.trading_name') }}</label>
                            <input class="form-control" name="trading_name" id="trading_name" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="registration_no">{{ __('label.registration_number') }}</label>
                            <input class="form-control" name="registration_no" id="registration_no" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="contact_number">{{ __('label.contact_number') }}</label>
                            <input class="form-control" name="contact_number" id="contact_number" type="number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">{{ __('label.email') }}</label>
                            <input class="form-control" name="email" id="email" type="email">
                        </div>
                        <div class="col-md-6">
                            <label for="website">{{ __('label.website') }}</label>
                            <input class="form-control" name="website" id="website" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="xin_gtax">{{ __('label.xin_gtax') }}</label>
                    <input class="form-control" name="xin_gtax" id="xin_gtax" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">{{ __('label.address_1') }}</label>
                    <input class="form-control" name="address_1" id="address_1" type="text">
                </div>
                <div class="form-group">
                    <label for="address">{{ __('label.address_2') }}</label>
                    <input class="form-control" name="address_2" id="address_2" type="text">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city">{{ __('label.city') }}</label>
                        <input class="form-control" name="city" id="city" type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">{{ __('label.state') }}</label>
                        <input class="form-control" name="state" id="state" type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="zip_code">{{ __('label.zip_code') }}</label>
                        <input class="form-control" name="zip_code" id="zip_code" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">{{ __('label.country') }}</label>
                    <select class="form-control" name="country" id="country">
                        <option value="" disabled selected>{{ __('label.choose') }}</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Malaysia">Malaysia</option>
                    </select>
                </div>
                <fieldset class="form-group">
                    <label for="logo">{{ __('label.company_logo') }}</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                    <small>{{ __('label.upload_format') }}</small>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop

@push('scripts')
    <script>
        $(document).ready(function (){
            //Company form submit
            $('#company_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = new FormData(this);
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    processData: false,
                    contentType: false,
                    success: function(){
                        window.location.href = '{{ route("companies.index") }}';
                    },
                    error: function(response){
                        //Clear previous error messages
                        $(".invalid-feedback").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            id.after('<div class="invalid-feedback">'+value+'</div>');
                        });
                        
                    }
                })
            })
        })
    </script>
@endpush