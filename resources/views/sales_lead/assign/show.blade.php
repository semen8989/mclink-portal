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
                <td></td>
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
                <td></td>
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
                <td></td>
            </tr>
        </table>
        <h2>Sales Lead Status</h2>
        <table class="table table-striped">
            <tr>
                <th class="custom-width">Title</th>
                <th>Data</th>
            </tr>
            <form action="{{ route('sales_lead.assign_salesman',$salesLead->id) }}" id="assign_form" method="post">
                @csrf
                @method('PUT')
                <tr>
                    <td>Assigned Salesman</td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" id="assigned_sales" name="assigned_sales">
                                <option value="0">Unassigned</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $salesLead->assigned_sales == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>        
                                @endforeach 
                            </select>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    </td>
                </tr>
            </form>
            <tr>
                <td>Status</td>
                <td></td>
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
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="ccmonth">Amount Payable</label>
                <input class="form-control" name="amount_payable" id="amount_payable" type="number">
            </div>
            <div class="form-group col-sm-6">
                <label for="ccyear">Notify</label>
                <select class="form-control" id="notify" name="notify">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>        
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="inline-checkbox1" type="checkbox" value="check1">
            <label class="form-check-label" for="inline-checkbox1">Confirm</label>
        </div>
    </div>
</div>
<div class="card-footer">
    <div class="form-group mt-2 text-right">
        <button type="submit" class="btn btn-success btn-submit">Approve</button>
    </div>
</div>

@stop

@push('stylesheet')
<style>
    .custom-width {
        width: 50%;
    }

</style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function(){
             //Scroll to top when page refresh
             $(window).on('beforeunload', function() {
                $(window).scrollTop(0);
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
        });
    </script>
@endpush