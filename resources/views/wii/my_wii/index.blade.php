@extends('layout.master')

@section('content')
<div class="card-header">My Wii(Work improvement ideas)</div>
<div class="card-body">
    @include('components.wii.nav-tabs')
    <div class="tab-content mt-3" id="myTab1Content">
            Wii Status:
            <span class="badge badge-dark">Pending</span>
            <span class="badge badge-success">Approved</span>
            <span class="badge badge-danger">Not Approved</span>
            <span class="badge badge-warning">KIV</span>
        {!! $dataTable->table() !!}
    </div>
</div>
@include('layout.delete_modal')
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
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("wii.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush