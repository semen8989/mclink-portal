@extends('layout.master')

@section('content')
<div class="card-header">Sales Lead Details</div>
<div class="card-body">
    @include('components.sales-lead.nav-tabs')
    <div class="tab-content mt-3" id="myTab1Content">
        <h2>Technical Sales Lead</h2>
        <table class="table table-striped">
            <tr>
                <th class="custom-width">Title</th>
                <th>Data</th>
            </tr>
            <tr>
                <td>Reference #</td>
                <td>{{ $salesLead->id }}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{ $salesLead->created_at->format('M d Y') }}</td>
            </tr>
            <tr>
                <td>Name of Staff</td>
                <td>{{ $salesLead->createdByUser->name }}</td>
            </tr>
        </table>
        <h2>Contact Information</h2>
        <table class="table table-striped">
            <tr>
                <th class="custom-width">Title</th>
                <th>Data</th>
            </tr>
            <tr>
                <td>Company Name</td>
                <td>{{ $salesLead->company_name }}</td>
            </tr>
            <tr>
                <td>Telephone</td>
                <td>{{ $salesLead->tel_num }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $salesLead->address }}</td>
            </tr>
        </table>
        <h2>Sales Lead Information</h2>
        <table class="table table-striped">
            <tr>
                <th class="custom-width">Title</th>
                <th>Data</th>
            </tr>
            <tr>
                <td>Mclink Base</td>
                <td>
                    <p>Reason: {{ $salesLead->mclink_base_reason }}</p>
                    <p>Model: {{ $salesLead->mclink_base_model }}</p>
                    <p>Serial Number: {{ $salesLead->serial_number }}</p>
                    <p>Date of Installation: {{ $salesLead->date_of_installation }}</p>
                </td>
            </tr>
            <tr>
                <td>Non Mclink Base</td>
                <td>
                    <p>Existing Brand: {{ $salesLead->existing_brand }}</p>
                    <p>Model:  {{ $salesLead->non_mclink_base_model }}</p>
                </td>
            </tr>
        </table>
        <h2>Sales Lead Status</h2>
        <table class="table table-striped">
            <tr>
                <th class="custom-width">Title</th>
                <th>Data</th>
            </tr>
                <tr>
                    <td>Assigned Salesman</td>
                    @if($salesLead->assigned_sales == null)
                        <form action="{{ route('sales_lead.assign_salesman',$salesLead->id) }}" id="assign_form" method="post">
                            @csrf
                            @method('PUT')
                            <td>
                                <div class="form-group">
                                    <select class="form-control select2" name="assigned_sales">
                                        <option></option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ $salesLead->assigned_sales == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>        
                                        @endforeach 
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                            </td>
                        </form>
                    @else
                        <td>{{ $salesLead->assignedSalesUser->name }}</td>
                    @endif
                </tr>
            <tr>
                <td>Reason</td>
                <td>{{ $salesLead->reason }}</td>
            </tr>
            <tr>
                <td>Model Closed & Qty</td>
                <td>{{ $salesLead->model_closed_and_qty }}</td>
            </tr>
        </table>
    </div>
</div>

@stop

@push('stylesheet')
<style>
    .custom-width {
        width: 50%;
    }

</style>
<!-- select2 css dependency -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function(){
             //Scroll to top when page refresh
             $(window).on('beforeunload', function() {
                $(window).scrollTop(0);
            });

            //Select2
            $('.select2').select2({
                theme: "bootstrap",
                placeholder: 'Unassigned',
                allowClear: true
            });

            $('#assign_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.reload();
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
                        
                    }
                })
            });

            $('#approve_form').submit(function (e){
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
                    },
                    success: function(data){
                        if(data.success == false)
                        {
                            $(".invalid-feedback").remove();   
                            $('.confirm-check').after('<div class="invalid-feedback d-block">Please confirm</div>');
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
                        
                    }
                })

            });
        });
    </script>
@endpush