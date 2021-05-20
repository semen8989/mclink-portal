@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiObjectiveForm" action="{{ route('okr.kpi.objectives.store') }}" method="POST">
  @csrf

  <div class="card-header">{{ __('label.kpi_objective.title.create') }}</div>
  <div class="card-body">

    <x-okr.kpi.objective.form :yearList="$yearList"/>

    <div class="row float-right mb-4 mt-2 mr-1">
      <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('okr.kpi.objectives.index') }}">
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

      $('#kpiObjectiveForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush