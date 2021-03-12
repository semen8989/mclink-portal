@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiVariableForm" action="{{ route('okr.kpi.variables.store') }}" method="POST">
  @csrf

  <h5 class="card-header font-weight-bold text-center">{{ __('label.kpi_variable.form.header.main') }}</h5>
  <div class="card-body">

    <x-okr.kpi.variable.form :yearList="$yearList"/>

    <div class="row float-right mb-4 mt-2 mr-1">
      <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('okr.kpi.variables.index') }}">
        <svg class="c-icon">
          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
        </svg>
        {{ __('label.global.form.button.back') }}
      </a>     
      <button class="btn btn-success font-weight-bold px-3" type="submit">
        <svg class="c-icon">
          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-task') }}"></use>
        </svg>
        {{ __('label.global.form.button.submit') }}
      </button>
    </div>

  </div>

</form>
@stop

@push('stylesheet')
  <!-- Datetimepicker css dependency -->
  <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
  <!-- Datetimepicker js dependency -->
  <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {
      // init target date field
      $targetDate = $('#target_date').datetimepicker({
        format: 'DD/MM/YYYY',
      });

      $('#kpiVariableForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush