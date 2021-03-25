@extends('layout.master')

@section('content')
<div class="card-header">Pending Machine Requests</div>
    <div class="card-body">
        @include('components.machine-request.nav-tabs')
        <div class="tab-content mt-3" id="myTab1Content">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@push('stylesheet')
    <!-- jquery datatable button and responsive extension css dependency -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
@endpush

@push('scripts')
    <!-- jquery datatable button and responsive extension js dependency -->
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    <!-- laravel datatable button plugin js dependency -->
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <!-- laravel datatable script-->
    {!! $dataTable->scripts() !!}
@endpush
