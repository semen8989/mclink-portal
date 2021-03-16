@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiMainForm" action="{{ route('okr.kpi.maingoals.update', ['kpiMain' => $kpiMain->id]) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="card-header">{{ __('label.kpi_main.title.edit') }}</div>
  <div class="card-body">

    <x-okr.kpi.main.form :kpiMain="$kpiMain"/>

    <div class="row float-right mb-4 mt-2 mr-1">
      <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('okr.kpi.maingoals.index') }}">
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
@endpush

@push('scripts')
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {
      $('#month').change(function() {
        $.ajax({
          url: "{{ route('get.kpi.main.rating', ['kpiMain' => $kpiMain->id]) }}",
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

      @if($kpiMain->kpiratings->isNotEmpty())
        $('#month').val('{{ old("kpi_ratings.month", $kpiMain->kpiratings[0]->month) }}');
        $('#rating').val('{{ old("kpi_ratings.rating", $kpiMain->kpiratings[0]->rating) }}');
      @else
        $('#month').val('{{ old("kpi_ratings.month", $selectedMonth) }}');
        $('#rating').val('{{ old("kpi_ratings.rating") }}');
      @endif

      $('#kpiMainForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush
