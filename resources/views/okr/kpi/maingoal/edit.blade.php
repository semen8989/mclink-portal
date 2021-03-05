@extends('layout.master')

@section('content')
<form class="form-horizontal" id="kpiMainForm" action="{{ route('performance.okr.kpi-maingoals.update', ['kpiMain' => $kpiMain->id]) }}" method="POST">
  @csrf
  @method('PUT')

  <h5 class="card-header font-weight-bold text-center">KPI MAIN GOALS</h5>
  <div class="card-body">

    <x-okr.kpi.main.form :kpiMain="$kpiMain"/>

    <div class="btn-group float-right mb-4 mt-3">
      <button class="btn btn-success" type="submit">Update</button>
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
          url: "{{ route('get.kpimain.rating', ['kpiMain' => $kpiMain->id]) }}",
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
         
      @if(!empty($kpiMain->kpiratings))
        $('#month').val('{{ $kpiMain->kpiratings[0]->month }}');
        $('#rating').val('{{ $kpiMain->kpiratings[0]->rating }}');
      @else
        $('#month').val('{{ date("n") }}');
      @endif

      $('#kpiMainForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush
