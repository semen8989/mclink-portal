@extends('layout.master')

@section('content')
  <!-- /.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <h5 class="card-header font-weight-bold text-center">CUSTOMER SERVICE REPORT</h5>
        <div class="card-body">

          <form class="form-horizontal" action="{{ route('service.form.store') }}" method="POST">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="csrNo">CSR No. <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <input class="form-control" name="csrNo" id="csrNo" type="text" value="{{ $csrNo }}">
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="date">Date <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <input class="form-control" name="date" id="date" type="text"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>
        
            <div class="form-row">
              <div class="form-group col-md-12">       
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="isNewCustomer"  id="isNewCustomer" val="true">
                  <label class="custom-control-label" for="isNewCustomer">Add new customer</label>
                </div>              
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="custName">Customer Name <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <select class="form-control custom-select" name="custName" id="custName"></select>
                  <input class="form-control" name="newCustName" id="newCustName" type="hidden" disabled> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label" for="custEmail">Customer Email</label>
                <div class="controls">
                  <input class="form-control" name="custEmail" id="custEmail" type="email"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="address">Address <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>  
              <div class="form-group col-md-6">
                <label class="col-form-label" for="callStatus">Status of Call</label>
                <div class="controls">
                  <textarea class="form-control" name="callStatus" id="callStatus" rows="3"></textarea>
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>    
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label" for="engineerId">Service Engineer Name <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <select class="form-control custom-select" name="engineerId" id="engineerId"></select>
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label" for="ticketReference">Ticket No. Reference</label>
                <div class="controls">
                  <input class="form-control" name="ticketReference" id="ticketReference" type="text"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
  
  <!-- /.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <h5 class="card-header font-weight-bold text-center">SERVICE DETAILS</h5>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="col-form-label" for="serviceRendered">Service Rendered</label>
              <div class="controls">
                <textarea class="form-control" name="serviceRendered" id="serviceRendered"></textarea>
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>    
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="col-form-label" for="engineerRemark">Engineer's Remarks</label>
              <div class="controls">
                <textarea class="form-control" name="engineerRemark" id="engineerRemark" rows="3"></textarea>
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>  
            <div class="form-group col-md-6">
              <label class="col-form-label" for="statusAfterService">Status after Service</label>
              <div class="controls">
                <textarea class="form-control" name="statusAfterService" id="statusAfterService" rows="3"></textarea>
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>    
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label class="col-form-label" for="serviceStart">Start of Service</label>
              <div class="controls">
                <input class="form-control" name="serviceStart" id="serviceStart" type="text"> 
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label" for="serviceEnd">End of Service</label>
              <div class="controls">
                <input class="form-control" name="serviceEnd" id="serviceEnd" type="text"> 
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label" for="usedItCredit">IT Credit Used</label>
              <div class="controls">
                <input class="form-control" name="usedItCredit" id="usedItCredit" data-decimals="1" min="0" max="1000" step="0.5" type="number"> 
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>
          </div>

          <button class="btn btn-secondary" name="action" value="draft" type="submit">Draft</button>
          <button class="btn btn-primary" name="action" value="save" type="submit">Save</button>
          <button class="btn btn-success" name="action" value="send" type="submit">Send</button       
        </div>
      </div>
    </div>
  </div>
  
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
      $('#date').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: new Date()
      });

      // init Start of Service field
      $('#serviceStart').datetimepicker({
        format: 'YYYY-MM-DD hh:mm A'
      });

      // init End of Service field
      $('#serviceEnd').datetimepicker({
        format: 'YYYY-MM-DD hh:mm A'
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
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
      });

      // init IT Credit Used field
      $('#usedItCredit').inputSpinner();

      // init Customer Name select2
      $('#custName').select2({
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

      $('#custName').on('select2:select', function (e) {
        var data = e.params.data;
        $('#custEmail').val(data.email);
        $('#address').val(data.address);
      });

      $('#isNewCustomer').change(function() {
        if(this.checked) {
          $('#newCustName').val('');
          $('#custEmail').val('');
          $('#address').val('');
        }

        $('#custName').next().css('display',  this.checked ? 'none' : 'block');
        $('#newCustName').attr('type', this.checked ? 'text' : 'hidden');
        $('#newCustName').prop('disabled', !this.checked);
      });

    });
  </script>
@endpush