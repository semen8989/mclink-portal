@extends('layout.master')

@section('content')
<div class="card-header">Create Sales Lead</div>
<form method="POST" id="sales_form" action="{{ route('sales_lead.store') }}" autocomplete="off" novalidate>
    @csrf
    <div class="card-body">
        @include('components.sales-lead.nav-tabs')
        <div class="tab-content mt-3" id="myTab1Content">
            <h3>Contact Information</h3>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Company Name</label>
                        <input class="form-control" name="company_name" id="company_name" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Tel#</label>
                        <input class="form-control" name="tel_num" id="tel_num" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Address</label>
                <input class="form-control" name="address" id="address" type="text">
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Contact Person</label>
                        <input class="form-control" name="contact_person" id="contact_person" type="text">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Department</label>
                        <input class="form-control" name="department" id="department" type="text">
                    </div>
                </div>
            </div>
            <h3>Sales Lead Information</h3>
            <p><strong>Mclink Base:</strong></p>
            <p>Reason to upgrade: Please tick</p>
            <div class="form-group row">
                <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" name="mclink_base_reason" id="inline-radio1" type="radio" value="M/C Expired"
                            name="inline-radios">
                        <label class="form-check-label" for="inline-radio1">M/C Expired</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" name="mclink_base_reason" id="inline-radio2" type="radio" value="M/C Overload"
                            name="inline-radios">
                        <label class="form-check-label" for="inline-radio2">M/C Overload</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" name="mclink_base_reason" id="inline-radio3" type="radio" value="Others"
                            name="inline-radios">
                        <label class="form-check-label" for="inline-radio3">Others</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Model</label>
                        <input class="form-control" name="mclink_base_model" id="mclink_base_model" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Serial Number</label>
                        <input class="form-control" name="serial_number" id="serial_number" type="text">
                    </div>
                </div>
            </div>
            <p><strong>No Mclink Base:</strong></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Existing Brand</label>
                        <input class="form-control" name="mclink_base_model" id="mclink_base_model" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Model</label>
                        <input class="form-control" name="non_mclink_base_model" id="non_mclink_base_model" type="text">
                    </div>
                </div>
            </div>
            <h3>Sales Lead Assigner/Approver</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Select Sales Manager (The Sales Manager will assign this lead to his/her sales team)</label>
                        <select class="form-control select2" id="sales_manager" name="sales_manager">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>        
                            @endforeach 
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Approved by(Approver)</label>
                        <select class="form-control select2" id="approve_by" name="approve_by">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>        
                            @endforeach 
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-check form-check ml-2">
                <input type="checkbox" class="form-check-input" name="data_check" id="data_check">
                <label class="form-check-label data-check" for="data_check">{{ __('label.machine_request.form.label.data_check') }}</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group mt-2 text-right">
            <button type="submit"
                class="btn btn-success btn-submit">{{ __('label.global.form.button.submit') }}</button>
        </div>
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
        $('document').ready(function (){
            //Scroll to top when page refresh
            $(window).on('beforeunload', function() {
                $(window).scrollTop(0);
            });

             //Select2
            $('.select2').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });

            $('#sales_form').submit(function (e){
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
                            $(".invalid-feedback").remove();   
                            $('.data-check').after('<div class="invalid-feedback d-block">Please confirm if all data are correct</div>');
                        }
                        else
                        {
                            window.location.reload();
                        }
                    },
                    error: function(response){
                        //Clear previous error messages
                        $(".help-block").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
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

        });
    </script>
@endpush
