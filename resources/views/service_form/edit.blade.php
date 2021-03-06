@extends('layout.master')

@section('content')
<form class="form-horizontal" id="serviceReportForm" action="{{ route('service.form.update', ['serviceReport' => $serviceReport->csr_no]) }}" method="POST">
  @csrf
  @method('PUT')
  <h5 class="card-header font-weight-bold text-center">{{ __('label.service_report.form.header.main') }}</h5>
  <div class="card-body">
  
    <x-service-report.form :serviceReport="$serviceReport"/>

    <div class="row float-right mb-4 mt-3 mr-1">
      <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('service.form.index') }}">
        <svg class="c-icon">
            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
        </svg>
        {{ __('label.global.form.button.back') }}
      </a>
      <button class="btn btn-success font-weight-bold px-3" type="submit">
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
  <!-- select2 css dependency -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
  <!-- Datetimepicker js dependency -->
  <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
  <!-- TinyMCE js dependency -->
  <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_API') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- bootstrap-input-spinner js dependency -->
  <script src="{{ asset('plugin/bootstrap-input-spinner/js/bootstrap-input-spinner.js') }}"></script>
  <!-- select2 js dependency -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {
      
      // return formatted email for customer drop down
      function concatenateEmailVal ($email) {
        return ' ( ' + $email + ' )';
      }

      // init Date field
      $dateField = $('#date').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      // init Start of Service field
      $serviceStartField = $('#serviceStart').datetimepicker({
        format: 'DD/MM/YYYY hh:mm A'
      });

      // init End of Service field
      $serviceEndField = $('#serviceEnd').datetimepicker({
        format: 'DD/MM/YYYY hh:mm A'
      });

      // init Service Rendered field
      tinymce.init({
        selector: 'textarea#serviceRendered',
        height: 400,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | bold italic | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
      });

      // init IT Credit Used field
      $('#usedItCredit').inputSpinner();

      // init Customer Name select2
      $('#customer').select2({
        theme: "bootstrap",
        ajax: {
            url: "{{ route('get.customers') }}",
            type: 'get',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term || '',
                    page: params.page || 1
                }

                return query;
            },
            processResults: function (data, params) {

              params.page = params.page || 1;

              var items = data.data.map(function(item) {
                let email = item.email ? concatenateEmailVal(item.email) : '';

                return { 
                  id: item.id,
                  text: item.name + email,
                  name: item.name,
                  email: item.email,
                  address: item.address
                };
              });
              
              return {
                results: items,
                pagination: {
                  more: (params.page * 10) < data.total
                }
              };
            },
            cache: true
        }
      });
      $('#customer').next().css('display', "{{ old('isNewCustomer') ? 'none' : 'block' }}");
      $('#customer').prop('disabled', "{{ old('isNewCustomer') }}");

      // init Service Engineer Name select2
      $('#engineerId').select2({
        theme: "bootstrap",
        ajax: {
            url: "{{ route('get.engineers') }}",
            type: 'get',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term || '',
                    page: params.page || 1
                }

                return query;
            },
            processResults: function (data, params) {

              params.page = params.page || 1;

              var items = data.data.map(function(item) {
                  return { 
                    id: item.id,
                    text: item.name
                  };
              });

              return {
                results: items,
                pagination: {
                  more: (params.page * 10) < data.total
                }
              };
            },
            cache: true
        }
      });

      $('#customer').on('select2:selecting', function (e) {
        var data = e.params.args.data;
        data.text = data.name;
      });

      $('#customer').on('select2:select', function (e) {
        var data = e.params.data;
        $('#custEmail').val(data.email);
        $('#address').val(data.address);
      });

      $('#isNewCustomer').change(function() {
        if (this.checked) {
          $('#newCustomer').val('');
          $('#custEmail').val('');
          $('#address').val('');
        }

        $('#customer').next().css('display',  this.checked ? 'none' : 'block');
        $('#customer').siblings('.help-block').css('display',  this.checked ? 'none' : 'block');
        $('#customer').prop('disabled', this.checked);
        $('#newCustomer').attr('type', this.checked ? 'text' : 'hidden');
        $('#newCustomer').siblings('.help-block').css('display',  this.checked ? 'block' : 'none');
        $('#newCustomer').prop('disabled', !this.checked);
      });

      $('#serviceReportForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);

        $dateField.data("DateTimePicker").format('YYYY-MM-DD');
        $serviceStartField.data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss');
        $serviceEndField.data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss');
      });
    });
  </script>
@endpush