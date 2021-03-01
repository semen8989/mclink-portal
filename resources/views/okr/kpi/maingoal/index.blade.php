@extends('layout.master')

@section('content')
    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="col-form-label" for="filterQuarter">Select Quarter</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterQuarter">
                            <option value="all" selected>All</option>
                            <option value="first">First Quarter</option>
                            <option value="second">Second Quarter</option>
                            <option value="third">Third Quarter</option>
                            <option value="fourth">Fourth Quarter</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-form-label" for="filterDate">Select Year</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterDate">
                            @foreach ($dateFilter as $date)
                                <option value="{{ $date->created_at->format('Y') }}">{{ $date->created_at->format('Y') }}</option>               
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>       
        </div>
        <div class="col-md-12 mb-3">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="{{ route('performance.okr.kpi-maingoals.index') }}" role="tab" aria-controls="main">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-chart') }}"></use>
                    </svg> All Main KPI</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('performance.okr.kpi-maingoals.index') }}" role="tab" aria-controls="variable">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-chart-line') }}"></use>
                    </svg> All Variable KPI</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('performance.okr.kpi-maingoals.index') }}" role="tab" aria-controls="objective">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-paperclip') }}"></use>
                    </svg> All Objective KPI</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>    
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
            var url = '{{ route("performance.okr.kpi-maingoals.destroy",":id") }}'
            url = url.replace(':id', id)
            $('#delete_form').attr('action',url);
        });

        $('#delete_form').submit(function (event) {
            $(this).find(':submit').prop('disabled', true);
        });

        $( document ).ready(function() {
        });
        
    </script> 
@endpush
