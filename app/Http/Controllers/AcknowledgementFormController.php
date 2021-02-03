<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ServiceReport;
use Illuminate\Support\Facades\Storage;
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
	    $image_parts = explode(";base64,", $request->signatureDataUrl);        
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	    $image_base64 = base64_decode($image_parts[1]);    
        $file = uniqid() . '.'.$image_type;

        // $request->signatureDataUrl = $image_base64;

        Storage::put('service_report\signature\\' . $file, $image_base64);
      
        $request->validated();
    }
}
