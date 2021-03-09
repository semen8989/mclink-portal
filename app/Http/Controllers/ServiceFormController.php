<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use App\Models\ServiceReport;
use Illuminate\Support\Facades\DB;
use App\Events\AcknowledgementFormSent;
use Illuminate\Support\Facades\Storage;
use App\DataTables\ServiceReportDataTable;
use App\Http\Requests\StoreServiceReportRequest;
use App\Http\Requests\UpdateServiceReportRequest;

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
     * Show the data related to a specific service form.
     *
     * @param  ServiceReport  $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceReport  $serviceReport)
    {
        $serviceReport->status = Str::ucfirst(array_search($serviceReport->status, ServiceReport::STATUS));
        
        return view('service_form.show', ['serviceReport' => $serviceReport]);
    }

    /**
     * Show the form for creating a new service form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recentServiceReport = ServiceReport::select('csr_no')
            ->withTrashed()
            ->orderByDesc('created_at')
            ->first();

        $csrNo = 1;
        $csrNo += $recentServiceReport
            ? intval($recentServiceReport->csr_no)
            : ServiceReport::MODEL_START;
        
        return view('service_form.create', ['csrNo' => $csrNo]);
    }

    public function store(StoreServiceReportRequest  $request)
    {
        $validated = $request->validated();

        $serviceReport = new ServiceReport;
    
        $serviceReport->id = Str::uuid();
        $serviceReport->csr_no = $validated['csrNo'];
        $serviceReport->date = $validated['date'];
        $serviceReport->ticket_reference = $validated['ticketReference'];
        $serviceReport->service_rendered = $validated['serviceRendered'];
        $serviceReport->engineer_remark = $validated['engineerRemark'];
        $serviceReport->status_after_service = $validated['statusAfterService'];
        $serviceReport->service_start = $validated['serviceStart'];
        $serviceReport->service_end = $validated['serviceEnd'];
        $serviceReport->used_it_credit = $validated['usedItCredit'];
        $serviceReport->current_user_id = auth()->user()->id;
        $serviceReport->engineer_id = $validated['engineerId'];
        $serviceReport->status = ServiceReport::STATUS[$validated['action']];

        if ($request->isNewCustomer) {
            $customer = new Customer;
            $customer->name = $validated['newCustomer'];
        } else {
            $customer = Customer::find($validated['customer']);
        }
    
        $customer->email = $validated['custEmail'];
        $customer->address = $validated['address'];

        $result = true;

        try {
            DB::transaction(function () use ($serviceReport, $customer) {
                $customer->save();
            
                $serviceReport->customer()->associate($customer);                  
                $serviceReport->save();
            });
        } catch (\Exception $e) {
            $result = false;
        }

        if ($result && ServiceReport::STATUS[$validated['action']] == 2) {
            AcknowledgementFormSent::dispatch($serviceReport);
        }

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result 
            ? __('label.global.response.success.general', ['module' => 'Service report', 'action' => 'created'])
            : __('label.global.response.error.general', ['action' => 'creating']);

        return redirect()->route('service.form.index')->with($resultStatus, $msg);
    }

    public function edit(ServiceReport  $serviceReport)
    {
        return view('service_form.edit', ['serviceReport' => $serviceReport]);
    }

    public function update(UpdateServiceReportRequest  $request, ServiceReport  $serviceReport)
    {
        $validated = $request->validated();

        $serviceReport->id = Str::uuid();
        $serviceReport->csr_no = $validated['csrNo'];
        $serviceReport->date = $validated['date'];
        $serviceReport->ticket_reference = $validated['ticketReference'];
        $serviceReport->service_rendered = $validated['serviceRendered'];
        $serviceReport->engineer_remark = $validated['engineerRemark'];
        $serviceReport->status_after_service = $validated['statusAfterService'];
        $serviceReport->service_start = $validated['serviceStart'];
        $serviceReport->service_end = $validated['serviceEnd'];
        $serviceReport->used_it_credit = $validated['usedItCredit'];
        $serviceReport->current_user_id = auth()->user()->id;
        $serviceReport->engineer_id = $validated['engineerId'];

        if ($request->isNewCustomer) {
            $customer = new Customer;
            $customer->name = $validated['newCustomer'];           
        } else {
            $serviceReport->customer_id = $validated['customer'];
            $customer = $serviceReport->customer;
        }

        $customer->email = $validated['custEmail'];
        $customer->address = $validated['address'];

        $currentStatus = $serviceReport->status;

        if ($currentStatus == 1) {
            $serviceReport->report_pdf = null;
            $serviceReport->signature_image = null;
            $serviceReport->signed_customer = null;
            $serviceReport->signed_date = null;
        }

        $serviceReport->status = $validated['status'];
      
        $result = true;

        try {
            DB::transaction(function () use ($serviceReport, $customer) {
                $customer->save();
                
                $serviceReport->customer()->associate($customer);                
                $serviceReport->save();
            });
        } catch (\Exception $e) {
            $result = false;
        }

        if ($result && $validated['status'] == 2) {
            AcknowledgementFormSent::dispatch($serviceReport);
        }

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result 
            ? __('label.global.response.success.general', ['module' => 'Service report', 'action' => 'updated'])
            : __('label.global.response.error.general', ['action' => 'updating']);

        return redirect()->route('service.form.show', [$serviceReport->csr_no])->with($resultStatus, $msg);
    }

    public function destroy(ServiceReport  $serviceReport)
    {
        $result = $serviceReport->delete();

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => 'Service report', 'action' => 'deleted'])
            : __('label.global.response.error.general', ['action' => 'deleting']);

        return back()->with($resultStatus, $msg);
    }

    public function download(ServiceReport  $serviceReport)
    {
        return Storage::download('service_report\pdf\\' . $serviceReport->report_pdf, 'service_report.pdf');
    }
}
