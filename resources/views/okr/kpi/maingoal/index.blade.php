@extends('layout.master')

@section('content')
    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="col-form-label" for="filterYear">Select Year</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterYear">
                            @foreach ($dateFilter as $date)
                                <option value="{{ $date->year }}"
                                    @if (request()->has('filterYear') && request()->filterYear == $date->year) selected @endif>
                                    {{ $date->year }}
                                </option>               
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a id="mainTabLink" class="nav-link active" href="{{ route('performance.okr.kpi-maingoals.index') }}" role="tab" aria-controls="main">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-chart') }}"></use>
                    </svg> All Main KPI</a></li>
                <li class="nav-item"><a id="variableTabLink" class="nav-link" href="{{ route('performance.okr.kpi.variable.index') }}" role="tab" aria-controls="variable">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-chart-line') }}"></use>
                    </svg> All Variable KPI</a></li>
                <li class="nav-item"><a id="objectiveTabLink" class="nav-link" href="{{ route('performance.okr.kpi.objective.index') }}" role="tab" aria-controls="objective">
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

    <!-- dt script-->
    {!! $dataTable->scripts() !!}

    <!-- Page js codes -->
    <script>
        $(document).on('click','#delete',function() {
            let id = $(this).attr('data-id');
            var url = "{{ route('performance.okr.kpi-maingoals.destroy', ':id') }}"
            url = url.replace(':id', id)
            $('#delete_form').attr('action',url);
        });

        $('#delete_form').submit(function (event) {
            $(this).find(':submit').prop('disabled', true);
        });

        // event for handling changes before datatable send request
        $("#kpimain-table").on('preXhr.dt', function (e, settings, data) {
            data.filterYear = $('#filterYear').val();
        });

        $( document ).ready(function() {
            // refresh datatable and update url get parameter based on the year filter on change event
            $('#filterYear').change(function() {
                LaravelDataTables["kpimain-table"].ajax.reload();

                $('#mainTabLink').attr('href', '{{ route("performance.okr.kpi-maingoals.index") }}' + '?filterYear=' + $(this).val());
                $('#variableTabLink').attr('href', '{{ route("performance.okr.kpi.variable.index") }}' + '?filterYear=' + $(this).val());
                $('#objectiveTabLink').attr('href', '{{ route("performance.okr.kpi.objective.index") }}' + '?filterYear=' + $(this).val());
            });

            var newIcon = '<svg class="c-icon mr-2"><use xlink:href="' + 
                '{{ asset("assets/icons/sprites/free.svg#cil-plus") }}' + 
                '"></use></svg>';

            $('.buttons-create').find('span').html(newIcon + "{{ __('label.global.datatable.button.new') }}");
        });
        
    </script>
@endpush
