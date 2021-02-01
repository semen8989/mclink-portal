@extends('layout.guest.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="my-4">
            <h2 class="text-center">MPO Services Pte Ltd</h2>
          </div>
          <div class="card-group">
            <div class="card">
              <div class="card-header text-center">
                <h4>CUSTOMER SERVICE REPORT</h4>        
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">CSR No.</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->csr_no }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Date</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->date }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Customer Name</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Customer Email</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Address</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->address }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Status of Call</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->call_status }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Service Engineer Name</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->user->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Ticket No. Reference</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->ticket_reference }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="guest-form-label font-weight-bold mb-1">Service Rendered</p>
                        <textarea class="guest-form-data" id="serviceRendered" readonly="true" >
                            {{ $serviceReport->service_rendered }}
                        </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1 mt-4">Engineer's Remarks</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->engineer_remark }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1 mt-4">Status after Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->status_after_service }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="guest-form-label font-weight-bold mb-1">Start of Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->service_start }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="guest-form-label font-weight-bold mb-1">End of Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->service_end }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="guest-form-label font-weight-bold mb-1">IT Credit Used</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->used_it_credit }}</p>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <h4>CUSTOMER ACKNOWLEDGEMENT</h4>      
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4 offset-md-1">
                      <label class="col-form-label font-weight-bold" for="signedCust">Name / Designation <span class="font-weight-bold">*</span></label>
                      <div class="controls">
                        <input class="form-control" name="signedCust" id="signedCust" type="text" value="{{ old('signedCust') }}">
                        <div clas="data-field"></div>
                        {{-- @error('csrNo')
                          <p class="help-block text-danger">{{ $message }}</p>
                        @enderror          --}}
                      </div>
                    </div>
                    <div class="form-group col-md-4 offset-md-1">
                      <label class="col-form-label font-weight-bold" for="signedDate">Date </label>
                      <div class="controls">
                        <input class="form-control" id="signedDate" type="text" readonly disabled> 
                        {{-- @error('date')
                          <p class="help-block text-danger">{{ $message }}</p>
                        @enderror   --}}
                      </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9 offset-md-1">
                      <label class="col-form-label font-weight-bold" for="signatureImage">Signature <span class="font-weight-bold">*</span></label>
                      <div class="controls">
                        <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                        {{-- <input class="form-control" name="signatureImage" id="signatureImage" type="text" value="{{ old('signatureImage') }}" readonly disabled>  --}}
                        {{-- @error('date')
                          <p class="help-block text-danger">{{ $message }}</p>
                        @enderror   --}}
                      </div>
                    </div>
                </div>

              </div>
            </div>      
          </div>
        </div>
    </div>
@stop

@push('scripts')
    <!-- TinyMCE js dependency -->
    <script src="https://cdn.tiny.cloud/1/g3nqaa9be2i3wr7kdbzetf4y0iqrzwvbeia890tk3263yb08/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- signature_pad js dependency -->
  <script src="{{ asset('plugin/signature_pad/js/signature_pad.js') }}"></script>
    <script> 
        tinymce.init({
            selector: '#serviceRendered',
            readonly: true,
            menubar: false,
            statusbar: false,
            toolbar: false
        });

        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });
        var saveButton = document.getElementById('save');
        var cancelButton = document.getElementById('clear');

        saveButton.addEventListener('click', function (event) {
            var data = signaturePad.toDataURL('image/png');

            // Send data to server instead...
            window.open(data);
        });

        cancelButton.addEventListener('click', function (event) {
            signaturePad.clear();
        });
    </script>

    
@endpush
