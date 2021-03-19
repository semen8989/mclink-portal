@extends('layout.guest.master')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="font-weight-bold">Machine Request</h4>
            </div>
            <div class="card-body px-5">
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
            <div class="card-footer text-center">
                <a type="submit" class="btn btn-success" href="{{ route('machine_request.update',['machineRequest' => $machineRequest->id]) }}">Confirm</a>
            </div>
        </div>
    </div>
</div>
@stop
