<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceFormRequest;
use App\Models\Customer;
use App\Models\ServiceReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceFormController extends Controller
{
    /**
     * Show list of service forms.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('service_form.index', [
        ]);
    }

    /**
     * Show the form for creating a new service form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = Carbon::now()->format('Ymd');

        $recentServiceReport = ServiceReport::select('csr_no')
            ->where('date', $currentDate)
            ->orderByDesc('created_at')
            ->first();

        $runningNum = 1;
             
        if ($recentServiceReport) {
            $csrNo = $recentServiceReport->csr_no;

            $numIndex = strrpos($csrNo, '-') + 1;
            $runningNum += intval(substr($csrNo, $numIndex));
        }
        
        $fullCsrNo = $currentDate . '-' . $runningNum;
        
        return view('service_form.create', ['csrNo' => $fullCsrNo]);
    }


    public function store(StoreServiceFormRequest  $request)
    {
        $validated = $request->validated();
        // dd($validated);

        switch ($request->action) {
            case 'send':
                
                break;
    
            case 'save':
                
                break;
    
            case 'draft':

                break;
        }

        if ($request->action == 'send') {

        }

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
    }
}
