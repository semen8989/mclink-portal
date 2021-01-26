@extends('layout.master')

@section('content')
  <!-- /.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <h5 class="card-header text-center">CUSTOMER SERVICE REPORT</h5>
        <div class="card-body">

          <form class="form-horizontal">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="csrNo">CSR No.</label>
                <div class="controls">
                  <input class="form-control" id="csrNo" type="number"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="date">Date</label>
                <div class="controls">
                  <input class="form-control" id="date" type="date"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="custName">Customer Name</label>
                <div class="controls">
                  <input class="form-control" id="custName" type="text"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label" for="custEmail">Customer Email</label>
                <div class="controls">
                  <input class="form-control" id="custEmail" size="16" type="text"> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="col-form-label font-weight-bold" for="address">Address</label>
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
                <label class="col-form-label" for="engineerId">Service Engineer Name</label>
                <div class="controls">
                  <select class="form-control custom-select" id="engineerId">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label" for="currentUserId">Current User Name</label>
                <div class="controls">
                  <input class="form-control" id="currentUserId" size="16" type="text" value="test" readonly> 
                  <!-- <p class="help-block">Here's some help text</p> -->
                </div>
              </div>
            </div>



            <!-- <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

            <div class="form-group">
              <label class="col-form-label" for="appendedInput">Appended text</label>
              <div class="controls">
                <div class="input-group">
                  <input class="form-control" id="appendedInput" size="16" type="text">
                  <div class="input-group-append"><span class="input-group-text">.00</span></div>
                </div><span class="help-block">Here's more help text</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="appendedPrependedInput">Append and prepend</label>
              <div class="controls">
                <div class="input-prepend input-group">
                  <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                  <input class="form-control" id="appendedPrependedInput" size="16" type="text">
                  <div class="input-group-append"><span class="input-group-text">.00</span></div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="appendedInputButton">Append with button</label>
              <div class="controls">
                <div class="input-group">
                  <input class="form-control" id="appendedInputButton" size="16" type="text"><span class="input-group-append">
                    <button class="btn btn-secondary" type="button">Go!</button></span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="appendedInputButtons">Two-button append</label>
              <div class="controls">
                <div class="input-group">
                  <input class="form-control" id="appendedInputButtons" size="16" type="text"><span class="input-group-append">
                    <button class="btn btn-secondary" type="button">Search</button>
                    <button class="btn btn-secondary" type="button">Options</button></span>
                </div>
              </div>
            </div> -->

            
              

          </form>

        </div>
      </div>
    </div>
  </div>
  
  <!-- /.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <h5 class="card-header text-center">SERVICE DETAILS</h5>
        <div class="card-body">
          <p>dadsa</p>
          <p>dadsadsad</p>

          <button class="btn btn-primary" type="submit">Save changes</button>
          <button class="btn btn-secondary" type="button">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  
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
      $('#date').datetimepicker({
        format: 'YYYY-MM-DD'
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