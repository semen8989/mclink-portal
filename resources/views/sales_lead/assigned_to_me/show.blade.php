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
                    <p>Date of Installation: {{ date("F j, Y",strtotime($salesLead->date_of_installation)) }}</p>
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
        <form action="{{ route('sales_lead.update_status',$salesLead->id) }}" id="status_form" method="post">
            @csrf
            @method('PUT')
            <table class="table table-striped">
                <tr>
                    <th class="custom-width">Title</th>
                    <th>Data</th>
                </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <div class="form-group">
                                <select class="form-control" id="status" name="status">
                                    <option></option>
                                    @foreach($status as $statusName => $statusId)
                                        <option value="{{ $statusId }}" {{ $statusId == $salesLead->status ? 'selected' : '' }}>{{ ucfirst($statusName) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
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
            <div class="float-right">
                <button class="btn btn-primary" type="submit"> Update</button>
            </div>
        </form>
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
        $(document).ready(function (){
             //Scroll to top when page refresh
             $(window).on('beforeunload', function() {
                $(window).scrollTop(0);
            });

            $('#status').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            //Status Form
            $('#status_form').submit(function (e){
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
        });
    </script>
@endpush