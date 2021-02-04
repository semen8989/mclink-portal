@extends('layout.guest.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="my-4">
            <h2 class="text-center">MPS Services Pte Ltd</h2>
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
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->email ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Address</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->customer->address }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Status of Call</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->call_status ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Service Engineer Name</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->user->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="guest-form-label font-weight-bold mb-1">Ticket No. Reference</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->ticket_reference ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
                    <div class="col-md-4">
                        <p class="guest-form-label font-weight-bold mb-1">Start of Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->service_start ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="guest-form-label font-weight-bold mb-1">End of Service</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->service_end ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="guest-form-label font-weight-bold mb-1">IT Credit Used</p>
                        <p class="guest-form-data mb-4">{{ $serviceReport->used_it_credit ?? 'N/A' }}</p>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <h4>CUSTOMER ACKNOWLEDGEMENT</h4>      
                </div>
                <hr>
                <form id="acknowledgementForm" action="{{ route('service.form.acknowledgment.store', ['serviceRequest' => $serviceReport->id]) }}" method="POST">
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
                                
                                {{-- @error('csrNo')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror          --}}
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
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                        <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                    </div>
                                </div> --}}
                                {{-- <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>E-Signature</h1>
                                            <p>Sign in the canvas below and save your signature as an image!</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                            <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img id="sig-image" src="" alt="Your signature will go here!"/>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div id="signature-pad" class="signature-pad">
                                    <div class="signature-pad--body">
                                    <canvas></canvas>
                                    </div>
                                    <div class="signature-pad--footer">
                                    <div class="description">Sign above</div>
                                
                                    <div class="signature-pad--actions">
                                        <div>
                                        <button type="button" class="button clear" data-action="clear">Clear</button>
                                        <button type="button" class="button" data-action="change-color">Change color</button>
                                        <button type="button" class="button" data-action="undo">Undo</button>
                                
                                        </div>
                                        <div>
                                        <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                                        <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                                        <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                                        </div>
                                    </div>
                                    </div>
                                </div> --}}
                                {{-- <input class="form-control" name="signatureImage" id="signatureImage" type="text" value="{{ old('signatureImage') }}" readonly disabled>  --}}
                                {{-- @error('date')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror   --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9 offset-md-1">
                            <button id="submitBtn" class="btn btn-success float-right" type="submit" disabled>Submit</button>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
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
                // $('#signatureImage').css('display', this.checked ? 'block' : 'none');
            });    
        })();

        // var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        //     backgroundColor: 'rgba(255, 255, 255, 0)',
        //     penColor: 'rgb(0, 0, 0)'
        // });
        // var saveButton = document.getElementById('save');
        // var cancelButton = document.getElementById('clear');

        // saveButton.addEventListener('click', function (event) {
        //     var data = signaturePad.toDataURL('image/png');

        //     // Send data to server instead...
        //     window.open(data);
        // });

        // cancelButton.addEventListener('click', function (event) {
        //     signaturePad.clear();
        // });

        // var canvas = document.querySelector("canvas");
        
        // // var signaturePad = new SignaturePad(canvas);
        // console.log(new SignaturePad(canvas));

        // var wrapper = document.getElementById("signature-pad");
        // var clearButton = wrapper.querySelector("[data-action=clear]");
        // var changeColorButton = wrapper.querySelector("[data-action=change-color]");
        // var undoButton = wrapper.querySelector("[data-action=undo]");
        // var savePNGButton = wrapper.querySelector("[data-action=save-png]");
        // var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
        // var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
        // var canvas = wrapper.querySelector("canvas");
        // var signaturePad = new SignaturePad(canvas, {
        // // It's Necessary to use an opaque color when saving image as JPEG;
        // // this option can be omitted if only saving as PNG or SVG
        // backgroundColor: 'rgb(255, 255, 255)'
        // });

        // // Adjust canvas coordinate space taking into account pixel ratio,
        // // to make it look crisp on mobile devices.
        // // This also causes canvas to be cleared.
        // function resizeCanvas() {
        // // When zoomed out to less than 100%, for some very strange reason,
        // // some browsers report devicePixelRatio as less than 1
        // // and only part of the canvas is cleared then.
        // var ratio =  Math.max(window.devicePixelRatio || 1, 1);

        // // This part causes the canvas to be cleared
        // canvas.width = canvas.offsetWidth * ratio;
        // canvas.height = canvas.offsetHeight * ratio;
        // canvas.getContext("2d").scale(ratio, ratio);

        // // This library does not listen for canvas changes, so after the canvas is automatically
        // // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
        // // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
        // // that the state of this library is consistent with visual state of the canvas, you
        // // have to clear it manually.
        // signaturePad.clear();
        // }

        // // On mobile devices it might make more sense to listen to orientation change,
        // // rather than window resize events.
        // window.onresize = resizeCanvas;
        // resizeCanvas();

        // function download(dataURL, filename) {
        // var blob = dataURLToBlob(dataURL);
        // var url = window.URL.createObjectURL(blob);

        // var a = document.createElement("a");
        // a.style = "display: none";
        // a.href = url;
        // a.download = filename;

        // document.body.appendChild(a);
        // a.click();

        // window.URL.revokeObjectURL(url);
        // }

        // // One could simply use Canvas#toBlob method instead, but it's just to show
        // // that it can be done using result of SignaturePad#toDataURL.
        // function dataURLToBlob(dataURL) {
        // // Code taken from https://github.com/ebidel/filer.js
        // var parts = dataURL.split(';base64,');
        // var contentType = parts[0].split(":")[1];
        // var raw = window.atob(parts[1]);
        // var rawLength = raw.length;
        // var uInt8Array = new Uint8Array(rawLength);

        // for (var i = 0; i < rawLength; ++i) {
        //     uInt8Array[i] = raw.charCodeAt(i);
        // }

        // return new Blob([uInt8Array], { type: contentType });
        // }

        // clearButton.addEventListener("click", function (event) {
        // signaturePad.clear();
        // });

        // undoButton.addEventListener("click", function (event) {
        // var data = signaturePad.toData();

        // if (data) {
        //     data.pop(); // remove the last dot or line
        //     signaturePad.fromData(data);
        // }
        // });

        // changeColorButton.addEventListener("click", function (event) {
        // var r = Math.round(Math.random() * 255);
        // var g = Math.round(Math.random() * 255);
        // var b = Math.round(Math.random() * 255);
        // var color = "rgb(" + r + "," + g + "," + b +")";

        // signaturePad.penColor = color;
        // });

        // savePNGButton.addEventListener("click", function (event) {
        // if (signaturePad.isEmpty()) {
        //     alert("Please provide a signature first.");
        // } else {
        //     var dataURL = signaturePad.toDataURL();
        //     download(dataURL, "signature.png");
        // }
        // });

        // saveJPGButton.addEventListener("click", function (event) {
        // if (signaturePad.isEmpty()) {
        //     alert("Please provide a signature first.");
        // } else {
        //     var dataURL = signaturePad.toDataURL("image/jpeg");
        //     download(dataURL, "signature.jpg");
        // }
        // });

        // saveSVGButton.addEventListener("click", function (event) {
        // if (signaturePad.isEmpty()) {
        //     alert("Please provide a signature first.");
        // } else {
        //     var dataURL = signaturePad.toDataURL('image/svg+xml');
        //     download(dataURL, "signature.svg");
        // }
        // });
       
    </script>

    
@endpush
