@extends('layout.master')

@section('content')
<div class="card-header"><h3>{{ $machineRequest->company_name }}</h3></div>
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th class="custom-width">Requester</th>
                    <td>{{ $machineRequest->user->name }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Model</th>
                    <td>{{ $machineRequest->model }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Quantity</th>
                    <td>{{ $machineRequest->qty }}</td>
                </tr>
                <tr>
                    <th class="custom-width">System</th>
                    <td>{{ $machineRequest->system }}</td>
                </tr>
                <tr>
                    <th class="custom-width">No. of cassette</th>
                    <td>{{ $machineRequest->cassette_no }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Period of contract</th>
                    <td>{{ $machineRequest->contract_period }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Special Requirement</th>
                    <td>{{ $machineRequest->special_requirement }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Billing Address</th>
                    <td>{{ $machineRequest->billing_address }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Office Contact Number</th>
                    <td>{{ $machineRequest->office_contact_no }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Installation Address</th>
                    <td>{{ $machineRequest->installation_address }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Person in-charge</th>
                    <td>{{ $machineRequest->person_in_charge }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Contact number</th>
                    <td>{{ $machineRequest->contact_no }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Installation Date</th>
                    <td>{{ $machineRequest->installation_date }}</td>
                </tr>
                <tr>
                    <th class="custom-width">Status</th>
                    <td><span class="badge badge-{{$machineRequest->status == 1 ? 'success' : 'danger'}} px-2 py-1">
                        {{ ucfirst(array_search($machineRequest->status,$status)) }}
                    </span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer text-right">
        <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ $machineRequest->status == 1 ? route('machine_request.completed_request') : route("machine_request.pending_request") }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
            </svg>
            Back
        </a>
    </div>
@stop

@push('stylesheet')
    <style>
        .custom-width{
            width: 45%;
        }
    </style>
@endpush


