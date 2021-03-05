@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiMainForm" action="{{ route('performance.okr.kpi-maingoals.store') }}" method="POST">
  @csrf

  <h5 class="card-header font-weight-bold text-center">KPI Main Goals</h5>
  <div class="card-body">

    <x-okr.kpi.main.form />

    <div class="btn-group float-right mb-4 mt-3">
      <button class="btn btn-success" type="submit">Submit</button>
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