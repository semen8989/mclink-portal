<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Str;
use App\Mail\ServiceFormSent;
use App\Models\ServiceReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\DataTables\ServiceReportDataTable;
use App\Http\Requests\StoreServiceFormRequest;

class ServiceFormController extends Controller
{
    /**
     * Show list of service forms.
     *
     * @return \Illuminate\View\View
     */
    public function index(ServiceReportDataTable $dataTable)
    {
        return $dataTable->render('service_form.index');
    }

    /**
     * Show the form for creating a new service form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recentServiceReport = ServiceReport::select('csr_no')
            ->orderByDesc('created_at')
            ->first();

        $csrNo = 1;
        $csrNo += $recentServiceReport ? intval($recentServiceReport->csr_no) : 100000;
        
        return view('service_form.create', ['csrNo' => $csrNo]);
    }


    public function store(StoreServiceFormRequest  $request)
    {
        $request->validated();

        $serviceReport = new ServiceReport;
    
        $serviceReport->id = Str::uuid();
        $serviceReport->csr_no = $request->csrNo;
        $serviceReport->date = $request->date;
        $serviceReport->ticket_reference = $request->ticketReference;
        $serviceReport->call_status = $request->callStatus;
        $serviceReport->engineer_remark = $request->engineerRemark;
        $serviceReport->status_after_service = $request->statusAfterService;
        $serviceReport->service_rendered = $request->serviceRendered;
        $serviceReport->service_start = $request->serviceStart;
        $serviceReport->service_end = $request->serviceEnd;
        $serviceReport->used_it_credit = $request->usedItCredit;    
        $serviceReport->engineer_id = $request->engineerId;
        $serviceReport->current_user_id = auth()->user()->id;
        $serviceReport->status = ServiceReport::STATUS[$request->action];

        if ($request->isNewCustomer) {
            $customer = new Customer;
            $customer->name = $request->newCustomer;
        } else {
            $customer = Customer::find($request->customer);
        }
    
        $customer->email = $request->custEmail;
        $customer->address = $request->address;

        DB::transaction(function () use ($serviceReport, $customer) {
            $customer->save();
            
            $serviceReport->customer()->associate($customer);
                  
            $serviceReport->save();
        });

        if ($request->action == 'send' && $request->custEmail) {
            Mail::to($request->custEmail)->queue(new ServiceFormSent($serviceReport));
        }

        return redirect()->route('service.form.index')->with('success', 'Service report successfully sent');
    }

    public function show(ServiceReport  $serviceReport)
    {
        $serviceReport->status = Str::ucfirst(array_search($serviceReport->status, ServiceReport::STATUS));
        
        return view('service_form.show', ['serviceReport' => $serviceReport]);
    }

    public function edit(ServiceReport  $serviceReport)
    {
        dd('test');
        return view('service_form.show', ['serviceReport' => $serviceReport]);
    }


    public function download(ServiceReport  $serviceReport)
    {
        return response()->download(public_path('storage\service_report\pdf\\' . $serviceReport->report_pdf), 'service_report.pdf');
    }

    public function getAcknowledgmentForm(ServiceReport $uuid)
    {   
        return view('service_form.acknowledgement.create', ['serviceReport' => $uuid]);
    }
}
