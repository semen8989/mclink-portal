@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.designation_list') }}</div>
    <div class="card-body">
        {!! $dataTable->table() !!}
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
            var url = '{{ route("designations.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });

        $(document).ready(function() {
            var newIcon = '<svg class="c-icon mr-2"><use xlink:href="' + 
                '{{ asset("assets/icons/sprites/free.svg#cil-plus") }}' + 
                '"></use></svg>';

            $('.buttons-create').find('span').html(newIcon + "{{ __('label.global.datatable.button.new') }}");
        });
    </script>
@endpush