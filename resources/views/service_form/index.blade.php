@extends('layout.master')

@section('content')
    <div class="card-body">
        {!! $dataTable->table() !!}
    </div>
    
    <a href="{{ route('service.form.create') }}">Go to create page</a>  
@stop

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    
    <!-- dt script-->
    {!! $dataTable->scripts() !!}
@endpush
