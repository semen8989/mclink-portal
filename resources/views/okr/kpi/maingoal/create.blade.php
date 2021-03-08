@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiMainForm" action="{{ route('performance.okr.kpi-maingoals.store') }}" method="POST">
  @csrf

  <h5 class="card-header font-weight-bold text-center">{{ __('label.kpi_main.form.header.main') }}</h5>
  <div class="card-body">

    <x-okr.kpi.main.form />

    <div class="row float-right mb-4 mt-2 mr-1">
      <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('performance.okr.kpi-maingoals.index') }}">
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
@endpush

@push('scripts')
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {
      $('#kpiMainForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush