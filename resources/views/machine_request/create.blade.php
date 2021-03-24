@extends('layout.master')

@section('content')
<div class="card-header">Machine Request Menu</div>
<form method="POST" id="request_form" action="{{ route('machine_request.store') }}" autocomplete="off" novalidate>
    @csrf
    <div class="card-body">
        @include('components.machine-request.nav-tabs')
        <div class="tab-content mt-3" id="myTab1Content">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Model</label>
                        <input class="form-control" name="model" id="model" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Quantity</label>
                        <input class="form-control" name="qty" id="qty" type="number" min="1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">System</label>
                        <input class="form-control" name="system" id="system" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">No of Cassette</label>
                        <input class="form-control" name="cassette_no" id="cassette_no" type="number" min="1">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Period of Contract</label>
                <input class="form-control" name="contract_period" id="contract_period" type="text">
            </div>
            <div class="form-group">
                <label for="title">Special Requirement</label>
                <textarea class="form-control" name="special_requirement" id="special_requirement"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Company Name</label>
                <input class="form-control" name="company_name" id="company_name" type="text">
            </div>
            <div class="form-group">
                <label for="title">Billing Address</label>
                <input class="form-control" name="billing_address" id="billing_address" type="text">
            </div>
            <div class="form-group">
                <label for="title">Office Contact No.</label>
                <input class="form-control" name="office_contact_no" id="office_contact_no" type="text">
            </div>
            <div class="form-group">
                <label for="title">Installation Address</label>
                <input class="form-control" name="installation_address" id="installation_address" type="text">
            </div>
            <div class="form-group">
                <label for="title">Person in-charge</label>
                <input class="form-control" name="person_in_charge" id="person_in_charge" type="text">
            </div>
            <div class="form-group">
                <label for="title">Contact No.</label>
                <input class="form-control" name="contact_no" id="contact_no" type="text">
            </div>
            <div class="form-group">
                <label for="title">Installation Date</label>
                <input class="form-control date" name="installation_date" id="installation_date" type="text">
            </div>
            <div class="form-group">
                <label>Send Request To</label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="technician_id">Technician</label>
                    <select class="form-control" name="technician_id" id="technician_id">
                            <option></option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="cc_user_id">CC</label>
                    <select class="form-control custom-select" name="cc_user_id[]" id="cc_user_id" multiple>
                        <option></option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <span class="badge badge-danger" style="font-size: 15px">**Different Installation Address Different Request Form</span>
                </div>
                <br>
                <div class="form-check form-check ml-2">
                    <input type="checkbox" class="form-check-input" name="data_check" id="data_check">
                    <label class="form-check-label" for="data_check">All data are correct</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group mt-2 text-right">
            <button type="submit" class="btn btn-success btn-submit">Submit</button>
        </div>
    </div>
</form>
@stop

@push('stylesheet')
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datetimepicker js dependency -->
    <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('document').ready(function (){
            //Scroll to top when page refresh
            $(window).on('beforeunload', function() {
                $(window).scrollTop(0);
            });
            // No negative number and decimal on keypress
            $("input[name='qty'], input[name='cassette_no']").keypress(    
                function(e) {       
                    if(!((e.keyCode > 95 && e.keyCode < 106)
                        || (e.keyCode > 47 && e.keyCode < 58) 
                        || e.keyCode == 8)){
                            return false;
                    }
            });
            //Datetimepicker
           $('.date').datetimepicker({
                ignoreReadonly: true,
                format: 'YYYY-MM-DD',
                widgetPositioning: {
                    vertical: 'bottom'
                }
            });
            //Select2
            $('#technician_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
             //Select2
             $('#cc_user_id').select2({
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            //Form Submit
            $('#request_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    beforeSend: function() { 
                        $(".help-block").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        $(".btn-submit").attr("disabled", true);
                        $(".btn-submit").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...`);
                    },
                    success: function(data){
                      if(data.success == false)
                      {
                        $('.form-check-label').after('<div class="invalid-feedback d-block">Please confirm if all data are correct</div>');
                      }
                      else
                      {
                        window.location.reload();
                      }
                    },
                    error: function(response){
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            
                            if(id.next('.select2-container').length > 0){
                                id.next('.select2-container').after('<div class="help-block text-danger">'+value+'</div>');
                            }else{
                                id.after('<div class="help-block text-danger">'+value+'</div>');
                            }

                        });
                        
                        if($(".is-invalid").length) {
                            $('html, body').animate({
                                    scrollTop: ($(".is-invalid").first().offset().top - 95)
                            },500);
                        }
                        
                    },
                    complete: function() {
                        $(".btn-submit").attr("disabled", false);
                        $(".btn-submit").html('Submit');
                    }
                })
            })
        })
    </script>
@endpush
