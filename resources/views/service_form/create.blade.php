@extends('layout.master')

@section('content')
<form class="form-horizontal" id="serviceReportForm" action="{{ route('service.form.store') }}" method="POST">
  @csrf

  <h5 class="card-header font-weight-bold text-center">CUSTOMER SERVICE REPORT</h5>
  <div class="card-body">
  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label font-weight-bold" for="csrNo">CSR No. <span class="font-weight-bold">*</span></label>
        <div class="controls">
          <input class="form-control" name="csrNo" id="csrNo" type="text" value="{{ old('csrNo', $csrNo) }}">
          @error('csrNo')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror         
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="col-form-label font-weight-bold" for="date">Date <span class="font-weight-bold">*</span></label>
        <div class="controls">
          <input class="form-control" name="date" id="date" type="text" value="{{ old('date') }}"> 
          @error('date')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror  
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">       
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="isNewCustomer"  id="isNewCustomer" value="true" @if (old('isNewCustomer')) checked @endif>
          <label class="custom-control-label" for="isNewCustomer">Add new customer</label>
        </div>              
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label font-weight-bold" for="customer">Customer Name <span class="font-weight-bold">*</span></label>
        <div class="controls">
          <select class="form-control custom-select" name="customer" id="customer"></select>
          <input class="form-control" name="newCustomer" id="newCustomer" type="hidden" value="{{ old('newCustomer') }}" disabled> 
          <!-- <p class="help-block text-danger">Here's some help text</p> -->
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="col-form-label" for="custEmail">Customer Email</label>
        <div class="controls">
          <input class="form-control" name="custEmail" id="custEmail" type="email" value="{{ old('custEmail') }}"> 
          @error('custEmail')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <label class="col-form-label font-weight-bold" for="address">Address <span class="font-weight-bold">*</span></label>
        <div class="controls">
          <textarea class="form-control" name="address" id="address" rows="5">{{ old('address') }}</textarea>
          @error('address')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>   
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label" for="engineerId">Engineer Name <span class="font-weight-bold">*</span></label>
        <div class="controls">
          <select class="form-control custom-select" name="engineerId" id="engineerId"></select>
          <!-- <p class="help-block text-danger">Here's some help text</p> -->
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="col-form-label" for="ticketReference">Ticket No. Reference</label>
        <div class="controls">
          <input class="form-control" name="ticketReference" id="ticketReference" type="text" value="{{ old('ticketReference') }}"> 
          @error('ticketReference')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <label class="col-form-label" for="serviceRendered">Service Rendered <span class="font-weight-bold">*</span></label>
        <div class="controls">
          <textarea class="form-control" name="serviceRendered" id="serviceRendered">{{ old('serviceRendered') }}</textarea>
          @error('serviceRendered')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>    
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="col-form-label" for="engineerRemark">Engineer's Remarks</label>
        <div class="controls">
          <textarea class="form-control" name="engineerRemark" id="engineerRemark" rows="3">{{ old('engineerRemark') }}</textarea>
          @error('engineerRemark')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>  
      <div class="form-group col-md-6">
        <label class="col-form-label" for="statusAfterService">Status after Service</label>
        <div class="controls">
          <textarea class="form-control" name="statusAfterService" id="statusAfterService" rows="3">{{ old('statusAfterService') }}</textarea>
          @error('statusAfterService')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>    
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="col-form-label" for="serviceStart">Start of Service</label>
        <div class="controls">
          <input class="form-control" name="serviceStart" id="serviceStart" type="text" value="{{ old('serviceStart') }}"> 
          @error('serviceStart')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <div class="form-group col-md-4">
        <label class="col-form-label" for="serviceEnd">End of Service</label>
        <div class="controls">
          <input class="form-control" name="serviceEnd" id="serviceEnd" type="text" value="{{ old('serviceEnd') }}"> 
          @error('serviceEnd')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <div class="form-group col-md-4">
        <label class="col-form-label" for="usedItCredit">IT Credit Used</label>
        <div class="controls">
          <input class="form-control" placeholder="Not Applicable (NA)" name="usedItCredit" id="usedItCredit" data-decimals="1" min="0" max="1000" step="0.5" type="number" value="{{ old('usedItCredit') }}"> 
          @error('usedItCredit')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="btn-group float-right mb-4 mt-3">
      <button class="btn btn-success" name="action" value="send" type="submit">Send to Customer</button>
      <button class="btn btn-success dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <button class="dropdown-item" name="action" value="draft" type="submit">Save as Draft</button>
      </div>
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
  <script src="https://cdn.tiny.cloud/1/g3nqaa9be2i3wr7kdbzetf4y0iqrzwvbeia890tk3263yb08/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- bootstrap-input-spinner js dependency -->
  <script src="{{ asset('plugin/bootstrap-input-spinner/js/bootstrap-input-spinner.js') }}"></script>
  <!-- select2 js dependency -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {

      // init Date field
      $dateField = $('#date').datetimepicker({
        format: 'DD/MM/YYYY',
        defaultDate: new Date()
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
                  return { 
                    id: item.id,
                    text: item.name,
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
        $('#newCustomer').attr('type', this.checked ? 'text' : 'hidden');
        $('#newCustomer').prop('disabled', !this.checked);
      });

      $('#serviceReportForm').submit(function (event) {
        $dateField.data("DateTimePicker").format('YYYY-MM-DD');
        $serviceStartField.data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss');
        $serviceEndField.data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss');
      });

      // $('#usedItCredit').change(function() {
      //   console.log($(this).val());
      //   console.log($(this).val() == 0);
      //   if ($(this).val() == 0) {
      //     $(this).next().find('input').removeAttr('value');
      //     // $('#usedItCredit').css('display', 'block');
      //   }
      // });

      // $( "#serviceReportForm" ).submit(function( event ) {
      //   // alert( "Handler for .submit() called." );
      //   // console.log($('#engineerId').val());
      //   // event.preventDefault();     
      // });
    });
  </script>
@endpush