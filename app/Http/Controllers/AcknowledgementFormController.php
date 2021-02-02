<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceReport;

class AcknowledgementFormController extends Controller
{
    /**
     * Show the form for acknowledging the service report.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ServiceReport $uuid)
    {
        return view('service_form.acknowledgement.create', ['serviceReport' => $uuid]);
    }

    public function store(Request $request, ServiceReport  $uuid)
    {
        dd($request->input());
        // $request->validated();

        // $serviceReport = new ServiceReport;
    
        // $serviceReport->id = Str::uuid();
        // $serviceReport->csr_no = $request->csrNo;
        // $serviceReport->date = $request->date;
        // $serviceReport->ticket_reference = $request->ticketReference;
        // $serviceReport->call_status = $request->callStatus;
        // $serviceReport->engineer_remark = $request->engineerRemark;
        // $serviceReport->status_after_service = $request->statusAfterService;
        // $serviceReport->service_rendered = $request->serviceRendered;
        // $serviceReport->service_start = $request->serviceStart;
        // $serviceReport->service_end = $request->serviceEnd;
        // $serviceReport->used_it_credit = $request->usedItCredit;    
        // $serviceReport->engineer_id = $request->engineerId;
        // $serviceReport->current_user_id = auth()->user()->id;
        // $serviceReport->status = ServiceReport::STATUS[$request->action];

        // if ($request->isNewCustomer) {
        //     $customer = new Customer;
        //     $customer->name = $request->newCustomer;
        // } else {
        //     $customer = Customer::find($request->customer);
        // }
    
        // $customer->email = $request->custEmail;
        // $customer->address = $request->address;

        // DB::transaction(function () use ($serviceReport, $customer) {
        //     $customer->save();
            
        //     $serviceReport->customer()->associate($customer);
                  
        //     $serviceReport->save();
        // });

        // if ($request->action == 'send' && $request->custEmail) {
        //     Mail::to($request->custEmail)->queue(new ServiceFormSent($serviceReport));
        // }

        // return redirect()->route('service.form.index')->with('success', 'Service report successfully sent');
    }
}
