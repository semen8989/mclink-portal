@extends('layout.master')

@section('content')
  <!-- /.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <h5 class="card-header font-weight-bold text-center">CUSTOMER SERVICE REPORT</h5>
        <div class="card-body">

          <form class="form-horizontal" action="{{ url('/service-forms') }}" method="POST">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="csrNo">CSR No. <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <input class="form-control" id="csrNo" type="number">
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="date">Date <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <input class="form-control" id="date" type="text"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="custName">Customer Name <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <input class="form-control" id="custName" type="text"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label" for="custEmail">Customer Email</label>
                <div class="controls">
                  <input class="form-control" id="custEmail" type="email"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="address">Address <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <textarea class="form-control" id="address" rows="3"></textarea>
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>  
              <div class="form-group col-md-6">
                <label class="col-form-label" for="callStatus">Status of Call</label>
                <div class="controls">
                  <textarea class="form-control" id="callStatus" rows="3"></textarea>
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>    
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label" for="engineerId">Service Engineer Name <span class="font-weight-bold">*</span></label>
                <div class="controls">
                  <select class="form-control custom-select" id="engineerId">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label" for="ticketReference">Ticket No. Reference</label>
                <div class="controls">
                  <input class="form-control" id="ticketReference" type="text"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label" for="currentUserId">Current User Name</label>
                <div class="controls">
                  <input class="form-control" id="currentUserId" type="text" value="test" readonly> 
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
                <textarea class="form-control" id="serviceRendered"></textarea>
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>    
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="col-form-label" for="engineerRemark">Engineer's Remarks</label>
              <div class="controls">
                <textarea class="form-control" id="engineerRemark" rows="3"></textarea>
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>  
            <div class="form-group col-md-6">
              <label class="col-form-label" for="statusAfterService">Status after Service</label>
              <div class="controls">
                <textarea class="form-control" id="statusAfterService" rows="3"></textarea>
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>    
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label class="col-form-label" for="serviceStart">Start of Service</label>
              <div class="controls">
                <input class="form-control" id="serviceStart" type="text"> 
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label" for="serviceEnd">End of Service</label>
              <div class="controls">
                <input class="form-control" id="serviceEnd" type="text"> 
                <!-- <p class="help-block">Here's some help text</p> -->
              </div>
            </div>
            <div class="form-group col-md-4">
              <label class="col-form-label" for="usedItCredit">IT Credit Used</label>
              <div class="controls">
                <input class="form-control" id="usedItCredit" data-decimals="1" min="0" max="1000" step="0.5" type="number"> 
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
  <!-- Datetimepicker js dependency -->
  <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
  <!-- TinyMCE js dependency -->
  <script src="https://cdn.tiny.cloud/1/g3nqaa9be2i3wr7kdbzetf4y0iqrzwvbeia890tk3263yb08/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- bootstrap-input-spinner js dependency -->
  <script src="{{ asset('plugin/bootstrap-input-spinner/js/bootstrap-input-spinner.js') }}"></script>
  <!-- bootstrap-typeahead js dependency -->
  <script src="{{ asset('plugin/bootstrap-typeahead/js/bootstrap3-typeahead.min.js') }}"></script>
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

      // init Customer Name typeahead
      $("#custName").typeahead({
        source: function (query, process) {
            $.ajax({
                type:'GET',
                url:'{{ url("get/customers/typeahead") }}',
                data: {
                    keyword: query
                },
                success:function(data,textStatus,jqXHR) {
                    //success callback here
                    return process(data);
                },
                error:function(jqXHR,textStatus,errorThrown) {
                    //error callback here
                },
                complete:function(jqXHR,textStatus) {
                    //complete callback here
                }
            })
        },
        items: 10,
        autoSelect: false,
        changeInputOnMove: false,
        displayText: function(item) {
            return item.name;
        },
        updater: function(item) {
            return item;
        },
        afterSelect: function(item) {
            $('#custEmail').val(item.email);
            $('#address').val(item.address);
        }
      });

      // init Service Engineer Name select2
      $('#engineerId').select2({
        ajax: {
            url: '{{ url("get/customers/typeahead") }}',
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term || '',
                    page: params.page || 1
                }

                // Query parameters will be ?search=[term]&page=[page]
                return query;
            },
            cache: true
            // processResults: function (data) {
            //     // Transforms the top-level key of the response object from 'items' to 'results'
            //     console.log(data[0].item);
            //     return {
                    
            //         results: data
            //     };
            // }
        }
      });
    });
  </script>
@endpush

<!-- MPS SERVICE REPORT
Requirements:
Fillable form
Section A to be filled up by MPS
1. Auto generated service report number (in running number fashion). This is a mandatory field
2. Reference to Ticket No. (free text). This is optional field
3. Date (default auto populate today’s date, can choose different date). This is a mandatory field
4. Time (from and to ), optional , 12hrs AM/PM format. This is a mandatory field
5. Customer name (company name, drop list) . This is a mandatory field
6. Customer address (auto-populate) . This is a mandatory field
7. Customer email address. This is optional field
8. Engineer name (drop list). This is a mandatory field
9. Service details (free text, with text editor). This is a mandatory field
10. Remarks (frees text). This is optional field
11. IT credits used (start 0.5, 1, 1.5, 2, and so on, in increment by 0.5), or Not Applicable (NA). This is
an optional field.
Section B. Customer Acknowledge section
To be filled up by customer
1. Checkbox : to acknowledge
2. Customer name (free text). This is a mandatory field
3. Customer signature. This is a mandatory field
Printing
1. The above form shall fit and printable in A4 paper size.
2. Layout shall have headers containing MPS company logo, company address details.
3. Footers (no needed)
OPTIONAL Customer Satisfaction Survey -->