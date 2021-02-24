@extends('layout.master')

@section('content')
    <div class="card-body">
        {!! $dataTable->table() !!}
    </div>

    @include('layout.delete_modal')
@stop

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    
    <!-- Clipboard js dependency -->
    <script src="{{ asset('plugin/clipboard/js/clipboard.min.js') }}"></script>

    <!-- dt script-->
    {!! $dataTable->scripts() !!}

    <!-- Page js codes -->
    <script>
        $(document).on('click','#delete',function() {
            let id = $(this).attr('data-id');
            var url = '{{ route("service.form.destroy",":id") }}'
            url = url.replace(':id', id)
            $('#delete_form').attr('action',url);
        });

        $('#delete_form').submit(function (event) {
            $(this).find(':submit').prop('disabled', true);
        });

        $( document ).ready(function() {           
            // var clipboard = new ClipboardJS('.copy-btn');
        });
        
    </script> 
@endpush
