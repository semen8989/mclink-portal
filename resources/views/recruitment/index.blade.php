@extends('layout.master')

@section('content')
    <div class="card-header">Applicant List</div>
    <div class="card-body">
        <table class="table responsive" id="recruitment-table">
            
        </table>
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

    <!-- Javscript -->
    <script>
        $('#recruitment-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('fetch_applicant') }}"
            },
            columns: [
                {data: 'name', name: 'name', title: 'Name'},
                {data: 'position', name: 'position', title: 'Position Apply For'},
                {data: 'gender', name: 'gender', title: 'Gender'},
                {data: 'status', name: 'status', title: 'Status'}
            ],
            buttons: [
                
            ],
            "language": {
                "search": "",
                "searchPlaceholder": "Search",
                "loadingRecords": "&nbsp;",
                "processing": "<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\">\r\n  <span class=\"sr-only\">Loading...<\/span><\/div><\/div>"
            },
            "responsive": true,
            "dom": "<'row mb-2'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>><'row'<'col-sm-12 col-md-12 table-responsive't><'col-sm-12 col-md-12'r>><'row'<'col-sm-12 col-md-6'p>>"
        });
    </script>
    
@endpush

