@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_location') }}</div>
<form method="POST" id="location_form" action="{{ route('locations.store') }}">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_id">{{ __('label.company') }}</label>
                    <select class="form-control" name="company_id" id="company_id">
                        <option value="" disabled selected>{{ __('label.choose') }}</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="location_name">{{ __('label.location_name') }}</label>
                    <input class="form-control" name="location_name" id="location_name" type="text">
                </div>
                <div class="form-group">
                    <label for="email">{{ __('label.email') }}</label>
                    <input class="form-control" name="email" id="email" type="text">
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('label.phone_number') }}</label>
                    <input class="form-control" name="phone" id="phone" type="number">
                </div>
                <div class="form-group">
                    <label for="fax_num">{{ __('label.fax_num') }}</label>
                    <input class="form-control" name="fax_num" id="fax_num" type="number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location_head">{{ __('label.location_head') }}</label>
                    <select class="form-control" name="user_id" id="user_id">
                        <option selected disabled>{{ __('label.choose') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address_1">{{ __('label.address_1') }}</label>
                    <input class="form-control" name="address_1" id="address_1" type="text">
                </div>
                <div class="form-group">
                    <label for="address_2">{{ __('label.address_2') }}</label>
                    <input class="form-control" name="address_2" id="address_2" type="text">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="city">{{ __('label.city') }}</label>
                        <input class="form-control" name="city" id="city" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="state">{{ __('label.state') }}</label>
                        <input class="form-control" name="state" id="state" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="zip_code">{{ __('label.zip_code') }}</label>
                        <input class="form-control" name="zip_code" id="zip_code" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="" disabled selected>{{ __('label.choose') }}</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Malaysia">Malaysia</option>
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

@push('scripts')
    <script>
         $(document).ready(function(){
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
                            id.after('<div class="invalid-feedback">'+value+'</div>');
                        });
                        
                    }
                })
            })
        })
    </script>
@endpush