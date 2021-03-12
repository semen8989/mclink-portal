@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiVariableForm" action="{{ route('okr.kpi.variables.update', ['kpiVariable' => $kpiVariable->id]) }}" method="POST">
  @csrf
  @method('PUT')

  <h5 class="card-header font-weight-bold text-center">{{ __('label.kpi_variable.form.header.main') }}</h5>
  <div class="card-body">

    <x-okr.kpi.variable.form :kpiVariable="$kpiVariable" :yearList="$yearList"/>

    <div class="row float-right mb-4 mt-2 mr-1">
      <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('okr.kpi.variables.index') }}">
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
          url: "{{ route('get.kpi.variable.rating', ['kpiVariable' => $kpiVariable->id]) }}",
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

      @if($kpiVariable->kpiratings->isNotEmpty())
        $('#month').val('{{ old("kpi_ratings.month", $kpiMain->kpiratings[0]->month) }}');
        $('#rating').val('{{ old("kpi_ratings.rating", $kpiMain->kpiratings[0]->rating) }}');
      @else
        $('#month').val('{{ old("kpi_ratings.month", date("n")) }}');
        $('#rating').val('{{ old("kpi_ratings.rating") }}');
      @endif

      $('#kpiVariableForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush
