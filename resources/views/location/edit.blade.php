@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_location') }}</div>
<form method="POST" id="location_form" action="{{ route('locations.update',$location->id) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_id">{{ __('label.edit_company') }}</label>
                    <select class="form-control" name="company_id" id="company_id">
                        <option></option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $location->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="location_name">{{ __('label.location_name') }}</label>
                    <input class="form-control" name="location_name" id="location_name" type="text" value="{{ $location->location_name }}">
                </div>
                <div class="form-group">
                    <label for="email">{{ __('label.email') }}</label>
                    <input class="form-control" name="email" id="email" type="text" value="{{ $location->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('label.phone') }}</label>
                    <input class="form-control" name="phone" id="phone" type="number" value="{{ $location->phone }}">
                </div>
                <div class="form-group">
                    <label for="fax_num">{{ __('label.fax_num') }}</label>
                    <input class="form-control" name="fax_num" id="fax_num" type="number" value="{{ $location->fax_num }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location_head">{{ __('label.location_head') }}</label>
                    <select class="form-control" name="user_id" id="user_id">
                        <option></option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $location->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address_1">{{ __('label.address_1') }}</label>
                    <input class="form-control" name="address_1" id="address_1" type="text" value="{{ $location->address_1 }}">
                </div>
                <div class="form-group">
                    <label for="address_2">{{ __('label.address_2') }}</label>
                    <input class="form-control" name="address_2" id="address_2" type="text" value="{{ $location->address_2 }}">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="city">{{ __('label.city') }}</label>
                        <input class="form-control" name="city" id="city" type="text" value="{{ $location->city }}">
                    </div>
                    <div class="col-md-4">
                        <label for="state">{{ __('label.state') }}</label>
                        <input class="form-control" name="state" id="state" type="text" value="{{ $location->state }}">
                    </div>
                    <div class="col-md-4">
                        <label for="zip_code">{{ __('label.zip_code') }}</label>
                        <input class="form-control" name="zip_code" id="zip_code" type="text" value="{{ $location->zip_code }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">{{ __('label.country') }}</label>
                    <select name="country" id="country" class="form-control">
                        <option></option>
                        <option value="Philippines" {{ $location->country == "Philippines" ? 'selected' : '' }}> Philippines</option>
                        <option value="Singapore" {{ $location->country == "Singapore" ? 'selected' : '' }}> Singapore</option>
                        <option value="Malaysia" {{ $location->country == "Malaysia" ? 'selected' : '' }}> Malaysia</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop

@push('stylesheet')
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
         $(document).ready(function(){
             //Select2
            $('#company_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#user_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#country').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            //Dynamic Company Dropdown
            $('#company_id').change(function(){

                var value = $('#company_id').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('fetch_user') }}",
                    method: "POST",
                    data: {
                        value: value,
                        _token: _token
                    },
                    dataType: 'json',
                    success: function(result){
                        $('#user_id').empty();
                        $('#user_id').append('<option selected disabled>{{ __("label.choose") }}</option>');
                        $.each(result, function (key, value) {
                            $('#user_id').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                        });
                    }
                })
            })
            //Location form submit
            $('#location_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("locations.index") }}';
                    },
                    error: function(response){
                        //Scroll up
                        window.scrollTo({ top: 40, behavior: 'smooth' });
                        //Clear previous error messages
                        $(".invalid-feedback").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            
                            if(id.next('.select2-container').length > 0){
                                id.next('.select2-container').after('<div class="invalid-feedback d-block">'+value+'</div>');
                            }else{
                                id.after('<div class="invalid-feedback d-block">'+value+'</div>');
                            }
                        });
                        
                    }
                })
            })
        })
    </script>
@endpush