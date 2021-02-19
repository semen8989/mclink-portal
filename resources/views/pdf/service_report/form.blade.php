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
                font-size: 12.5px;
            }
            .header-wrapper > img {
                height: 50;
            }
            .header-wrapper {
                text-align: center;
            }
            .info-wrapper {
                text-align: center;
                font-size: 11px;
                margin-top: -20px;
            }
            .contact-wrapper {
                margin-top: -12px;
            }
            .contact-wrapper > span {
                padding: 0 12px 0 12px;
            }
            .signature-wrapper {
                text-align: center;
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
                    <p>8 Kaki Bukit Road 2 #04-34, Ruby Warehouse Complex, Singapore 417841</p>
                    <p class="contact-wrapper"><span>Tel: +65 6846 8589</span><span>Fax: +65 6846 7123</span></p>                  
                </div>
            </div> 
            <table cellspacing="0" cellpadding="6">
                <tr>
                    <th colspan="2">CUSTOMER SERVICE REPORT</th>
                </tr>
                <tr>
                    <td><b>CSR No: </b>{{ $serviceReport->csr_no }}</td>
                    <td><b>Date: </b>{{ $serviceReport->date->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td><b>Customer Name: </b>{{ $serviceReport->customer->name }}</td>
                    <td><b>Customer Email: </b>{{ $serviceReport->customer->email }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="medium-text"><b>Address: </b>{{ $serviceReport->customer->address }}</td>
                </tr>
                <tr>
                    <td><b>Engineer Name: </b>{{ $serviceReport->user->name }}</td>
                    <td><b>Ticket No. Reference: </b>{{ $serviceReport->ticket_reference }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="large-text"><b>Service Rendered: </b>{!! $serviceReport->service_rendered !!}</td>
                </tr>
                <tr>
                    <td class="medium-text"><b>Engineer's Remarks: </b>{{ $serviceReport->engineer_remark }}</td>
                    <td class="medium-text"><b>Status after Service: </b>{{ $serviceReport->status_after_service }}</td>
                </tr>
                <tr>
                    <td><b>Start of Service: </b>{{ $serviceReport->service_start ? $serviceReport->service_start->format('d/m/Y h:i:s A') : '' }}</td>
                    <td><b>End of Service: </b>{{ $serviceReport->service_end ? $serviceReport->service_end->format('d/m/Y h:i:s A') : '' }}</td>
                </tr>
                <tr>
                    <td colspan="2"><b>IT Credit Used: </b>{{ $serviceReport->used_it_credit ?? 'N/A' }}</td>
                </tr>
            </table>
            <br>
            <table cellspacing="0" cellpadding="6">
                <tr>
                    <th colspan="2">CUSTOMER ACKNOWLEDGMENT</th>
                </tr>
                <tr>
                    <td><b>Name / Designation: </b>{{ $serviceReport->signed_customer }}</td>
                    <td><b>Date: </b>{{ $serviceReport->signed_date->format('d/m/Y') }}</td> 
                </tr>
                <tr>
                    <td colspan="2" class="large-text">
                        <b>Signature: </b>                   
                        <div class="signature-wrapper">
                            <img src="{{ public_path('storage/service_report/signature/') . $serviceReport->signature_image }}" alt="customer signature">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>