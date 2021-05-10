@extends('layout.master')

@section('content')
<div class="card-header"><h3>{{ $machineRequest->company_name }}</h3></div>
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.requester') }}</th>
                    <td>{{ $machineRequest->user->name }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.model') }}</th>
                    <td>{{ $machineRequest->model }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.quantity') }}</th>
                    <td>{{ $machineRequest->qty }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.system') }}</th>
                    <td>{{ $machineRequest->system }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.cassette_no') }}</th>
                    <td>{{ $machineRequest->cassette_no }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.period_of_contract') }}</th>
                    <td>{{ $machineRequest->contract_period }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.special_requirement') }}</th>
                    <td>{{ $machineRequest->special_requirement }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.billing_address') }}</th>
                    <td>{{ $machineRequest->billing_address }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.office_contact_no') }}</th>
                    <td>{{ $machineRequest->office_contact_no }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.installation_address') }}</th>
                    <td>{{ $machineRequest->installation_address }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.person_in_charge') }}</th>
                    <td>{{ $machineRequest->person_in_charge }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.contact_no') }}</th>
                    <td>{{ $machineRequest->contact_no }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.installation_date') }}</th>
                    <td>{{ $machineRequest->installation_date }}</td>
                </tr>
                <tr>
                    <th class="custom-width">{{ __('label.machine_request.form.label.status') }}</th>
                    <td><span class="badge badge-{{$machineRequest->status == 1 ? 'success' : 'danger'}} px-2 py-1">
                        {{ ucfirst(array_search($machineRequest->status,$status)) }}
                    </span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a class="btn btn-secondary px-3 mr-1 font-weight-bold float-left" href="{{ $machineRequest->status == 1 ? route('machine_request.completed_index') : route("machine_request.pending_index") }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
            </svg>
            Back
        </a>
        @if($machineRequest->status == 0 && $machineRequest->technician->id == auth()->user()->id)
            <a class="btn btn-info px-3 mr-1 font-weight-bold float-right" href="{{ route('machine_request.mark',$machineRequest->id) }}">
                <svg class="c-icon">
                    <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-check') }}"></use>
                </svg>
                {{ __('label.machine_request.form.button.mark_completed') }}
            </a>
        @endif
    </div>
@stop

@push('stylesheet')
    <style>
        .custom-width{
            width: 45%;
        }
    </style>
@endpush


