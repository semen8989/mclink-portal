<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ServiceReport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\AcknowledgmentFormSubmitted;
use App\Http\Requests\StoreAcknowledgmentFormRequest;

class AcknowledgementFormController extends Controller
{
    /**
     * Show the form for acknowledging the service report.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ServiceReport $uuid)
    {
        return view('service_form.acknowledgement.create', [
            'serviceReport' => $uuid,
            'currentDate' => Carbon::now()->format('d-m-Y')
        ]);
    }

    public function store(StoreAcknowledgmentFormRequest $request, ServiceReport  $uuid)
    {
        $validated = $request->validated();

	    $image_parts = explode(";base64,", $validated['signatureDataUrl']);        
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	    $image_base64 = base64_decode($image_parts[1]);    
        $file = uniqid() . '.'.$image_type;

        Storage::put('service_report\signature\\' . $file, $image_base64);

        $uuid->signature_image = $file;
        $uuid->signed_customer = $validated['signedCust'];
        $uuid->signed_date = Carbon::now();

        if ($uuid->save()) {
            Mail::to($uuid->user->email)->queue(new AcknowledgmentFormSubmitted($uuid));
        }
    }
}
