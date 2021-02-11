@extends('layout.master')

@section('content')
    <h5 class="card-header font-weight-bold text-center">SERVICE REPORT DETAILS</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">CSR No.</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->csr_no }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Date</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->date->format('d/m/Y') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Customer Name</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->customer->name }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Customer Email</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->customer->email ?? 'N/A' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="guest-form-label font-weight-bold mb-1">Address</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->customer->address }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Engineer Name</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->user->name }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Ticket No. Reference</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->ticket_reference ?? 'N/A' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="guest-form-label font-weight-bold mb-1">Service Rendered</p>
                {!! $serviceReport->service_rendered !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Engineer's Remarks</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->engineer_remark ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Status after Service</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->status_after_service ?? 'N/A' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Start of Service</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->service_start ? $serviceReport->service_start->format('d/m/Y h:i:s A') : 'N/A' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">End of Service</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->service_end ? $serviceReport->service_end->format('d/m/Y h:i:s A') : 'N/A' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">IT Credit Used</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->used_it_credit ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">Status</p>
                <p class="guest-form-data mb-4">{{ $serviceReport->status }}</p>
            </div>
        </div>

        @if (!empty($serviceReport->signed_date))
            <hr>
            <h5 class="font-weight-bold text-center">CUSTOMER ACKNOWLEDGEMENT</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p class="guest-form-label font-weight-bold mb-1">Name / Designation</p>
                    <p class="guest-form-data mb-4">{{ $serviceReport->signed_customer }}</p>
                </div>
                <div class="col-md-6">
                    <p class="guest-form-label font-weight-bold mb-1">Date</p>
                    <p class="guest-form-data mb-4">{{ $serviceReport->signed_date->format('d/m/Y') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p class="guest-form-label font-weight-bold mb-1">Signature</p>
                    <img src="{{ asset('storage/service_report/signature/' . $serviceReport->signature_image) }}" alt="Customer Signature" width="100%">
                </div>
            </div>
        @endif

        <div class="row float-right">
            <div class="col-md-12">
                <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('service.form.index') }}">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
                    </svg>
                    Back
                </a>
                @if (!empty($serviceReport->signed_date))
                    <a class="btn btn-primary mr-1 font-weight-bold" href="{{ route('service.form.download', [$serviceReport->csr_no]) }}">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-data-transfer-down') }}"></use>
                        </svg>
                        Download
                    </a>
                @elseif ($serviceReport->status == 'Save')
                    <a class="btn btn-primary mr-1 font-weight-bold" href="">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-copy') }}"></use>
                        </svg>
                        Copy Link
                    </a>
                @endif
                <a class="btn btn-primary px-3 font-weight-bold" href="{{ route('service.form.edit', [$serviceReport->csr_no]) }}">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                    </svg>
                    Edit
                </a>
            </div>
        </div>

    </div>
@stop

@push('scripts')
    
@endpush
