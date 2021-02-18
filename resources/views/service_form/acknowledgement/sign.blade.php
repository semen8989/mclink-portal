@extends('layout.guest.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">     
          <div class="header-wrapper">
            <img src="{{ asset('assets/brand/mps_logo.png') }}" alt="MPS Solutions Logo" class="form-logo">
            <div class="info-wrapper mt-2">
                <p>8 Kaki Bukit Road 2 #04-34, Ruby Warehouse Complex, Singapore 417841</p>
                <p class="contact-wrapper"><span>Tel: +65 6846 8589</span><span>Fax: +65 6846 7123</span></p>                  
            </div>
          </div> 
          <div class="card-group">
            <div class="card">
              <div class="card-header text-center">
                <h4 class="font-weight-bold">CUSTOMER SERVICE REPORT</h4>        
              </div>
              <div class="card-body px-5">
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">CSR No.</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->csr_no }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Date</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->date->format('d/m/Y') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Customer Name</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Customer Email</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->email ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="guest-form-label font-weight-bold mb-1">Address</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->address }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Engineer Name</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->user->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Ticket No. Reference</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->ticket_reference ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <p class="guest-form-label font-weight-bold mb-1">Service Rendered</p>
                        {!! $serviceReport->service_rendered !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Engineer's Remarks</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->engineer_remark ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Status after Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->status_after_service ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Start of Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->service_start ? $serviceReport->service_start->format('d/m/Y h:i:s A') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">End of Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->service_end ? $serviceReport->service_end->format('d/m/Y h:i:s A') : 'N/A' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="guest-form-label font-weight-bold mb-1">IT Credit Used</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->used_it_credit ?? 'N/A' }}</p>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <h4 class="font-weight-bold">CUSTOMER ACKNOWLEDGEMENT</h4>      
                </div>
                <hr>
                <form id="acknowledgementForm" action="{{ route('service.form.acknowledgment.store', ['serviceReport' => $serviceReport->id]) }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-9 offset-md-1">       
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="isAcknowledged"  id="isAcknowledged" value="true" @if (old('isAcknowledged')) checked @endif>
                            <label class="custom-control-label" for="isAcknowledged">Check here to <span class="font-weight-bold">acknowledge</span> the <span class="font-weight-bold">data</span> and <span class="font-weight-bold">list of services</span> that was shown above</label>
                            </div>              
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 offset-md-1">
                            <label class="col-form-label font-weight-bold" for="signedCust">Name / Designation <span class="font-weight-bold">*</span></label>
                            <div class="controls">
                                <input class="form-control" id="signedCust" name="signedCust"  type="text" value="{{ old('signedCust') }}" disabled>                   
                                @error('signedCust')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4 offset-md-1">
                            <label class="col-form-label font-weight-bold" for="signedDate">Date </label>
                            <div class="controls">
                                <input class="form-control" id="signedDate" type="text" value="{{ $currentDate }}" readonly disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9 offset-md-1">
                            <label class="col-form-label font-weight-bold" for="signatureImage">Signature <span class="font-weight-bold">*</span></label>
                            <div class="controls">
                                <canvas id="signatureImage" name="signatureImage"></canvas>
                                <textarea id="signatureDataUrl" name="signatureDataUrl" class="form-control" rows="5" style="display: none;"></textarea>
                                @error('signatureDataUrl')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9 offset-md-1">
                            <button id="submitBtn" class="btn btn-success float-right" type="submit" disabled>Submit</button>
                        </div>
                    </div>
                    
                </form>

              </div>
            </div>      
          </div>
        </div>
    </div>
@stop

@push('stylesheet')
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('plugin/jquery-signature/css/jquery.signature.css') }}" rel="stylesheet">
@endpush

@prepend('scripts')
    <!-- signature_pad js dependency -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> --}}
@endprepend

@push('scripts')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
<script src="{{ asset('plugin/jquery-ui-touch/js/jquery.ui.touch-punch.js') }}"></script>
<script src="{{ asset('plugin/jquery-signature/js/jquery.signature.min.js') }}"></script>

<!-- signature_pad js dependency -->
{{-- <script src="{{ asset('plugin/signature_pad/js/signature_pad.js') }}"></script> --}}
    <!-- TinyMCE js dependency -->
    <script src="https://cdn.tiny.cloud/1/g3nqaa9be2i3wr7kdbzetf4y0iqrzwvbeia890tk3263yb08/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
 
        (function() {
            window.requestAnimFrame = (function(callback) {
                return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
            })();

            function fitToContainer(canvas) {
                canvas.style.width='100%';
                canvas.style.height='100%';
                canvas.width  = canvas.offsetWidth;
                canvas.height = canvas.offsetHeight;
            }

            var canvas = document.getElementById("signatureImage");
            var ctx = canvas.getContext("2d");
            fitToContainer(canvas);
            ctx.strokeStyle = "#222222";
            ctx.lineWidth = 4;
            
            var drawing = false;
            var mousePos = {
                x: 0,
                y: 0
            };
            var lastPos = mousePos;

            canvas.addEventListener("mousedown", function(e) {
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }, false);

            canvas.addEventListener("mouseup", function(e) {
                drawing = false;
            }, false);

            canvas.addEventListener("mousemove", function(e) {
                mousePos = getMousePos(canvas, e);
            }, false);

            canvas.addEventListener("touchstart", function(e) {
                mousePos = getTouchPos(canvas, e);
                var touch = e.touches[0];
                var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);

            canvas.addEventListener("touchend", function(e) {
                var me = new MouseEvent("mouseup", {});
                canvas.dispatchEvent(me);
            }, false);

            canvas.addEventListener("touchmove", function(e) {
                var touch = e.touches[0];
                var me = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);

            function getMousePos(canvasDom, mouseEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                }
            }

            function getTouchPos(canvasDom, touchEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                }
            }

            function renderCanvas() {
                if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                }
            }

            // Prevent scrolling when touching the canvas
            document.body.addEventListener("touchstart", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchend", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchmove", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);

            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();     

            $('#acknowledgementForm').submit(function(e) {
                var sigData = $('#signatureDataUrl');
                sigData.val(canvas.toDataURL());
            }); 

            $('#isAcknowledged').change(function() {
                $('#signedCust').prop('disabled', !this.checked);
                $('#submitBtn').prop('disabled', !this.checked);
            });
            
            $('#acknowledgementForm').submit(function (event) {
                $(this).find(':submit').prop('disabled', true);
            })
        })();
       
    </script>

    
@endpush
