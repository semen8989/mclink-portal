@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.kpi_variable.title.index') }}</div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                @if (auth()->user()->isDepartmentHead())
                <div class="form-group col-md-3">
                    <label class="col-form-label" for="filterEmployee">{{ __('label.kpi_variable.form.label.select_employee') }}</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterEmployee">
                            @foreach ($departmentUsers as $user)
                                <option value="{{ $user->id }}"
                                    @if (request()->has('filterEmployee') && request()->filterEmployee == $user->id) selected @endif>
                                    {{ $user->name }}
                                    @if (auth()->user()->id == $user->id) ({{ __('label.global.text.me') }}) @endif
                                </option>  
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <div class="form-group col-md-3">
                    <label class="col-form-label" for="filterQuarter">{{ __('label.kpi_variable.form.label.select_quarter') }}</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterQuarter">     
                            @foreach ($quarterFilter as $quarterKey => $quarterValue)
                                <option value="{{ $quarterKey }}"
                                    @if (request()->has('filterQuarter') && request()->filterQuarter == $quarterKey) selected @endif>
                                    {{ $quarterValue }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-form-label" for="filterYear">{{ __('label.kpi_variable.form.label.select_year') }}</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterYear">
                            @if ($yearFilter->isNotEmpty())
                                @foreach ($yearFilter as $date)
                                    <option value="{{ $date->year }}"
                                        @if (request()->has('filterYear') && request()->filterYear == $date->year) selected @endif>
                                        {{ $date->year }}
                                    </option>
                                @endforeach
                            @else 
                                <option value="{{ date('Y') }}" selected>{{ date('Y') }}</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a id="mainTabLink" class="nav-link" href="{{ route('okr.kpi.maingoals.index') }}" role="tab" aria-controls="main">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-chart') }}"></use>
                    </svg> {{ __('label.global.tab.kpi_main') }}</a></li>
                <li class="nav-item"><a id="variableTabLink" class="nav-link active" href="{{ route('okr.kpi.variables.index') }}" role="tab" aria-controls="variable">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-chart-line') }}"></use>
                    </svg> {{ __('label.global.tab.kpi_variable') }}</a></li>
                <li class="nav-item"><a id="objectiveTabLink" class="nav-link" href="{{ route('okr.kpi.objectives.index') }}" role="tab" aria-controls="objective">
                    <svg class="c-icon mr-1">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-paperclip') }}"></use>
                    </svg> {{ __('label.global.tab.kpi_objective') }}</a></li>
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
            var url = "{{ route('okr.kpi.objectives.destroy', ':id') }}"
            url = url.replace(':id', id)
            $('#delete_form').attr('action',url);
        });

        $('#delete_form').submit(function (event) {
            $(this).find(':submit').prop('disabled', true);
        });

        // event for handling changes before datatable send request
        $("#kpiobjective-table").on('preXhr.dt', function (e, settings, data) {
            data.filterEmployee = $('#filterEmployee').val();
            data.filterQuarter = $('#filterQuarter').val();
            data.filterYear = $('#filterYear').val();
        });

        function updateTabUrl() {
            $('#mainTabLink').attr('href', '{{ route("okr.kpi.maingoals.index") }}' 
                + '?filterYear=' + $("#filterYear").val()  
                + '?filterEmployee=' + $("#filterEmployee").val());
            $('#variableTabLink').attr('href', '{{ route("okr.kpi.variables.index") }}' 
                + '?filterYear=' + $("#filterYear").val() 
                + '?filterQuarter=' + $("#filterQuarter").val() 
                + '?filterEmployee=' + $("#filterEmployee").val());
            $('#objectiveTabLink').attr('href', '{{ route("okr.kpi.objectives.index") }}' 
                + '?filterYear=' + $("#filterYear").val() 
                + '?filterQuarter=' + $("#filterQuarter").val()
                + '?filterEmployee=' + $("#filterEmployee").val());
        }

        $( document ).ready(function() {
            // initialize get query parameter on load
            updateTabUrl();

            // refresh datatable and update url get parameter based on the year filter on change event
            $('#filterYear, #filterQuarter, #filterEmployee').change(function() {
                LaravelDataTables["kpiobjective-table"].ajax.reload();
                updateTabUrl();
            });

            var newIcon = '<svg class="c-icon mr-2"><use xlink:href="' + 
                '{{ asset("assets/icons/sprites/free.svg#cil-plus") }}' + 
                '"></use></svg>';

            $('.buttons-create').find('span').html(newIcon + "{{ __('label.global.datatable.button.new') }}");

            $('.buttons-create').click(function () {
                location.href = "{{ route("okr.kpi.objectives.create") }}";         
            })
        });
        
    </script>
@endpush
