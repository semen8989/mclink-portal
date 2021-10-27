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
                    <td></td>
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
                <tr>
                    <td>Assigned Salesman</td>
                    <td></td>
                </tr>
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
        </div>
    </div>
@stop

@push('stylesheet')
    <style>
        .custom-width{
            width: 50%;
        }
    </style>
@endpush
