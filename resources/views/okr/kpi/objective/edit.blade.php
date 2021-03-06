@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiObjectiveForm" action="{{ route('okr.kpi.objectives.update', ['kpiObjective' => $kpiObjective->id]) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="card-header">{{ __('label.kpi_objective.title.edit') }}</div>
  <div class="card-body">

    <x-okr.kpi.objective.form :kpiObjective="$kpiObjective"/>

    <div class="row float-right mb-4 mt-2 mr-1">
      <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('okr.kpi.objectives.index') }}">
        <svg class="c-icon">
          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
        </svg>
        {{ __('label.global.form.button.back') }}
      </a>
      <button class="btn btn-success font-weight-bold" type="submit">
        <svg class="c-icon">
          <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-reload') }}"></use>
        </svg>
        {{ __('label.global.form.button.update') }}
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
      // console.log($('#target_date').val());
      $('#month').change(function() {
        $.ajax({
          url: "{{ route('get.kpi.objective.rating', ['kpiObjective' => $kpiObjective->id]) }}",
          type: 'get',
          data: { 
            month: $(this).val()
          }, 
          dataType: 'json',
          success: function (result) {
            $('#rating').val(result.length > 0 ? result[0].rating : '');
            $('#manager_comment').val(result.length > 0 ? result[0].manager_comment : '');
          }
        });
      });

      @if($kpiObjective->kpiratings->isNotEmpty())
        $('#month').val('{{ old("kpi_ratings.month", $kpiObjective->kpiratings[0]->month) }}');
        $('#rating').val('{{ old("kpi_ratings.rating", $kpiObjective->kpiratings[0]->rating) }}');
      @else
        $('#month').val('{{ old("kpi_ratings.month", $selectedMonth) }}');
        $('#rating').val('{{ old("kpi_ratings.rating") }}');
      @endif

      $('#kpiObjectiveForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush
