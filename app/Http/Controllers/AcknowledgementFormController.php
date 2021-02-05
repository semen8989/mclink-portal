<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\ServiceReport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\AcknowledgmentFormSubmitted;
use App\Http\Requests\StoreAcknowledgmentFormRequest;
use App\Mail\ServiceReportCopyReceivedMail;

class AcknowledgementFormController extends Controller
{
    /**
     * Show the form for acknowledging the service report.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ServiceReport $serviceReport)
    {
        return view('service_form.acknowledgement.create', [
            'serviceReport' => $serviceReport,
            'currentDate' => Carbon::now()->format('d/m/Y')
        ]);
    }

    public function store(StoreAcknowledgmentFormRequest $request, ServiceReport  $serviceReport)
    {
        $validated = $request->validated();

	    $image_parts = explode(";base64,", $validated['signatureDataUrl']);        
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);  

        $imgFile = uniqid() . '.'.$image_type;        
        $pdfFile = uniqid() . '.pdf';
      
        $serviceReport->report_pdf = $pdfFile;
        $serviceReport->signature_image = $imgFile;
        $serviceReport->signed_customer = $validated['signedCust'];
        $serviceReport->signed_date = Carbon::now();

        if ($serviceReport->save()) {           
            $pdf = PDF::loadView('pdf.service_report.form', ['serviceReport' => $serviceReport]);       

            Storage::put('service_report\signature\\' . $imgFile, $image_base64);
            Storage::put('service_report\pdf\\' . $pdfFile, $pdf->output());

            Mail::to($serviceReport->user->email)
                ->queue(new AcknowledgmentFormSubmitted($serviceReport));

            Mail::to($serviceReport->user->email)
                ->queue(new ServiceReportCopyReceivedMail($serviceReport));
        }
    }
}
