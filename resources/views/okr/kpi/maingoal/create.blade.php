@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiMainForm" action="{{ route('performance.okr.kpi-maingoals.store') }}" method="POST">
  @csrf

  <h5 class="card-header font-weight-bold text-center">{{ __('label.service_report.form.header.main') }}</h5>
  <div class="card-body">

    <div class="btn-group float-right mb-4 mt-3">
      <button class="btn btn-success" value="sent" type="submit">{{ __('label.service_report.form.button.send') }}</button>
      <button class="btn btn-success dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <button class="dropdown-item" value="draft" type="submit">{{ __('label.service_report.form.button.draft') }}</button>
      </div>
    </div>

  </div>

</form>
@stop

@push('stylesheet')
@endpush

@push('scripts')
  <!-- Datetimepicker js dependency -->
  <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
  <!-- TinyMCE js dependency -->
  <script src="https://cdn.tiny.cloud/1/g3nqaa9be2i3wr7kdbzetf4y0iqrzwvbeia890tk3263yb08/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- select2 js dependency -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {

    });
  </script>
@endpush