<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SalesLead;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SalesLeadCreated;
use App\Mail\SalesLeadAssigned;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\DataTables\SalesLeadDataTable;
use App\DataTables\ApprovalLeadDataTable;
use App\DataTables\AssignedToMeDataTable;
use App\DataTables\AssignSalesLeadDataTable;
use App\Http\Requests\StoreSalesLeadRequest;
use App\Http\Requests\UpdateSalesLeadRequest;

class SalesLeadController extends Controller
{
    public function index(SalesLeadDataTable $dataTable)
    {
        $title = 'Sales Lead';
        
        return $dataTable->render('sales_lead.index',compact('title'));
    }

    public function create()
    {
        $users = User::all('id','name');
        return view('sales_lead.create',compact('users'));
    }

    public function store(StoreSalesLeadRequest $request)
    {
        if($request['data_check'] == "on")
        {
            $salesLead = new SalesLead;
            $salesLead->user_id = Auth::user()->id;
            $salesLead->company_name = $request['company_name'];
            $salesLead->tel_num = $request['tel_num'];
            $salesLead->address = $request['address'];
            $salesLead->contact_person = $request['contact_person'];
            $salesLead->department = $request['department'];
            $salesLead->mclink_base_reason = $request['mclink_base_reason'];
            $salesLead->mclink_base_model = $request['mclink_base_model'];
            $salesLead->serial_number = $request['serial_number'];
            $salesLead->valid_until = $request['valid_until'];
            $salesLead->existing_brand = $request['existing_brand'];
            $salesLead->non_mclink_base_model = $request['non_mclink_base_model'];
            $salesLead->assigned_sales = $request['assigned_sales'];
            $salesLead->reason = $request['reason'];
            $salesLead->model_closed_and_qty = $request['model_closed_and_qty'];
            $salesLead->amount_payable = $request['amount_payable'];
            $salesLead->sales_manager = $request['sales_manager'];
            $salesLead->approve_by = $request['approve_by'];
            $salesLead->save();

            Mail::to($salesLead->salesManagerUser->email)
                ->queue(new SalesLeadCreated($salesLead));
            
            return session()->flash('success','Sales Lead Created Successfully!');

            $data['success'] = true;
        }
        else
        {
            $data['success'] = false;
        }

        return response()->json($data);
    }

    public function edit(SalesLead $salesLead)
    {
        $users = User::all('id','name');
        $status = SalesLead::STATUS;
        
        return view('sales_lead.edit',compact('salesLead','users','status'));
    }

    public function update(StoreSalesLeadRequest $request, SalesLead $salesLead)
    {
        if($request['data_check'] == "on")
        {
            $salesLead->update($request->all());

            return session()->flash('success','Sales Lead Updated Successfully!');

            $data['success'] = true;
        }
        else
        {
            $data['success'] = false;
        }

        return response()->json($data);

    }

    public function destroy(SalesLead $salesLead)
    {
        $salesLead->delete();

        return redirect()->route('sales_lead.index')->with('success','Sales Lead Deleted Successfully!');
    }

    public function assignIndex(AssignSalesLeadDataTable $dataTable)
    {
        $title = 'Assign';
        return $dataTable->render('sales_lead.assign.index',compact('title'));
    }

    public function assignSalesMan(Request $request, SalesLead $salesLead)
    {
        $request->validate([
            'assigned_sales' => 'required',
        ]);

        $currentDate = date('Y-m-d');
        $validity = date('Y-m-d', strtotime('+6 months', strtotime($currentDate)));  

        $salesLead->assigned_sales = $request->assigned_sales;
        $salesLead->status = 1;
        $salesLead->valid_until = $validity;
        $salesLead->save();

        Mail::to($salesLead->assignedSalesUser->email)
            ->queue(new SalesLeadAssigned($salesLead));

        return session()->flash('success','Salesman Assigned Successfully!');
    }

    public function show(SalesLead $salesLead)
    {
        $users = User::all('id','name');

        return view('sales_lead.assign.show',compact('salesLead','users'));
    }

    public function assignedToMeIndex(AssignedToMeDataTable $dataTable)
    {
        $title = 'Assign To Me';
        return $dataTable->render('sales_lead.assigned_to_me.index',compact('title'));
    }

    public function assignedToMeDetails(SalesLead $salesLead)
    {
        $title = 'Assign To Me';
        $status = SalesLead::STATUS;
        return view('sales_lead.assigned_to_me.edit',compact('title','salesLead','status'));
    }

    public function updateLeadDetails(UpdateSalesLeadRequest $request, SalesLead $salesLead)
    {
        if($request['data_check'] == "on")
        {
            $salesLead->update($request->all());

            return session()->flash('success','Sales Lead Updated Successfully!');

            $data['success'] = true;
        }
        else
        {
            $data['success'] = false;
        }

        return response()->json($data);
    }

    public function approvalIndex(ApprovalLeadDataTable $dataTable)
    {
        $title = 'Approval';
        return $dataTable->render('sales_lead.approval.index',compact('title'));
    }

    public function approvalDetails(SalesLead $salesLead)
    {
        $users = User::all('id','name');
        return view('sales_lead.assign.show',compact('salesLead','users'));
    }

    public function approve(Request $request, SalesLead $salesLead)
    {
        if($request['confirm'] == 'on')
        {
            $update = [
                'amount_payable' => $request->amount_payable,
                'is_approved' => 1
            ];

            $salesLead->update($update);

            return session()->flash('success','Sales Lead Updated Successfully!');

            $data['success'] = true;
        }
        else
        {
            $data['success'] = false;
        }

        return response()->json($data);
    }


}
