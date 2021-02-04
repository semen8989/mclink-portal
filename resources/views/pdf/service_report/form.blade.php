<!DOCTYPE html>

<html lang="en">
     <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Service Report</title>
        <style>
            table, th, td {
                border: 1px solid black;
                width: 100%;
            }
            th {
                text-align: center; 
                vertical-align: middle;
                color: #0c4474;
                background-color: rgb(224, 218, 218);
            }
            td {
                vertical-align: top;
                font-size: 13px;
            }
            img {    
                height: 50;
                background-color: yellow;
            }
            .header-wrapper {
                text-align: center;
            }
            .info-wrapper {
                font-size: 13.5px;
                width: 70%;
                margin-top: -30px;
            }
            .large-text {
                height: 150px;
            }
            .medium-text {
                height: 100px;
            }
        </style>
    </head>
    <body>   
        <div>
            <div class="header-wrapper">
                <img src="{{ asset('assets/brand/mps_logo.png') }}" alt="MPS Solutions Logo">
                <div class="info-wrapper">
                    <p>dadasdas dad as da das dada dsdad adsa</p>
                </div>
            </div> 
            <table cellspacing="0" cellpadding="6">
                <tr>
                    <th colspan="2">CUSTOMER SERVICE REPORT</th>
                </tr>
                <tr>
                    <td><b>CSR No: </b></td>
                    <td><b>Date: </b></td>
                </tr>
                <tr>
                    <td><b>Customer Name: </b></td>
                    <td><b>Customer Email: </b></td>
                </tr>
                <tr>
                    <td colspan="2" class="medium-text"><b>Address: </b></td>
                </tr>
                <tr>
                    <td><b>Engineer Name: </b></td>
                    <td><b>Ticket No. Reference: </b></td>
                </tr>
                <tr>
                    <td colspan="2" class="large-text"><b>Service Rendered: </b></td>
                </tr>
                <tr>
                    <td class="medium-text"><b>Engineer's Remarks: </b></td>
                    <td class="medium-text"><b>Status after Service: </b></td>
                </tr>
                <tr>
                    <td><b>Start of Service: </b></td>
                    <td><b>End of Service: </b></td>
                </tr>
                <tr>
                    <td colspan="2"><b>IT Credit Used: </b></td>
                </tr>
            </table>
            <br>
            <table cellspacing="0" cellpadding="6">
                <tr>
                    <th colspan="2">CUSTOMER ACKNOWLEDGMENT</th>
                </tr>
                <tr>
                    <td><b>Name Designation: </b></td>
                    <td><b>Date: </b></td> 
                </tr>
                <tr>
                    <td colspan="2" class="large-text"><b>Signature: </b></td>
                </tr>
            </table>

                    {{-- <div class="row">
                        <div class="col-md-1">
                            <p class="guest-form-label font-weight-bold">CSR No.</p>
                            <p class="guest-form-data">{{ $serviceReport->csr_no }}</p>
                        </div>
                        <div class="col-md-1">
                            <p class="guest-form-label font-weight-bold">Date</p>
                            <p class="guest-form-data">{{ $serviceReport->date }}</p>
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
                                    
                                    {{-- @error('csrNo')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror          --}}
                                {{-- </div>
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
                        
                    </form>                    --}}

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </body>
</html>