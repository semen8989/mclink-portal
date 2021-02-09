@extends('layout.master')

@section('content')
    <h5 class="card-header font-weight-bold text-center">Service Report List</h5>
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
    
    <a href="{{ route('service.form.create') }}">Go to create page</a>  
@stop

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {{$dataTable->scripts()}}
@endpush
