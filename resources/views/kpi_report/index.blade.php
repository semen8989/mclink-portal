@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.kpi_report.title.index') }}</div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="row lead font-weight-bold mx-0 mb-2">{{ __('label.kpi_report.page_text.download_kpi') }}</div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="col-form-label" for="filterKpi">{{ __('label.kpi_report.form.label.select_kpi') }}</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterKpi" name="filter_kpi">
                            @foreach ($kpiTypes as $kpiKey => $kpiVal)
                                <option value="{{ $kpiKey }}"
                                    @if (old('filter_kpi', 0) === $kpiKey) selected @endif>
                                    {{ $kpiVal }}
                                </option>  
                            @endforeach 
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label" for="filterQuarter">{{ __('label.kpi_report.form.label.select_quarter') }}</label>
                    <div class="controls">
                         <select class="form-control custom-select" id="filterQuarter" name="filter_quarter">
                            @foreach ($quarters as $quarterKey => $quarterVal)
                                <option value="{{ $quarterKey }}"
                                    @if (old('filter_quarter', 0) == $quarterKey) selected @endif>
                                    {{ $quarterVal }}
                                </option>  
                            @endforeach
                        </select>
                    </div>
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-form-label" for="filterYear">{{ __('label.kpi_report.form.label.select_year') }}</label>
                    <div class="controls">
                        <select class="form-control custom-select" id="filterYear" name="filter_year">
                            @foreach ($years as $yearKey => $yearVal)
                                <option value="{{ $yearKey }}"
                                    @if (old('filter_year', 0) === $yearKey) selected @endif>
                                    {{ $yearKey }}
                                </option>
                            @endforeach
                        </select> 
                    </div>
                </div>   
            </div>
            <div class="row">
                <div class="col-md-12 mt-3 mb-2">
                    <div class="float-right">
                        <a id="downloadBtn" class="btn btn-primary px-3 font-weight-bold" href="{{ route('kpi-reports.download') }}">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-data-transfer-down') }}"></use>
                            </svg>
                            {{ __('label.kpi_report.form.button.download') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('stylesheet')
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Page js codes -->
    <script>
        function updateDownloadUrl() {
            $('#downloadBtn').attr('href', '{{ route("kpi-reports.download") }}?'            
                + 'filterKpi=' + $("#filterKpi").val()
                + '&filterQuarter=' + $("#filterQuarter").val()
                + '&filterYear=' + $("#filterYear").val());
        }

        $(document).ready(function() {
            // initialize get query parameter on load
            updateDownloadUrl();

            // update query string in download link on change value for filters
            $('select').change(function() {
                updateDownloadUrl();
            });
        });
    </script>
@endpush