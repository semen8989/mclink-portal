<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MachineRequest;
use App\Mail\MachineRequestSent;
use Illuminate\Support\Facades\Mail;
use App\Mail\MachineRequestCompleted;
use App\Http\Requests\StoreMachineRequest;
use App\DataTables\PendingMachineRequestDataTable;
use App\DataTables\CompletedMachineRequestDatatable;

class MachineRequestController extends Controller
{
    public function pendingRequestIndex(PendingMachineRequestDataTable $dataTable)
    {
        $title = __('label.machine_request.title.pending_index');

        return $dataTable->render('machine_request.pending_request.index',compact('title'));
    }

    public function completedRequestIndex(CompletedMachineRequestDatatable $dataTable)
    {
        $title = __('label.machine_request.title.completed_index');

        return $dataTable->render('machine_request.completed_request.index',compact('title'));
    }

    public function create()
    {
        $users = User::all();
        $title = __('label.machine_request.title.create_index');
        
        return view('machine_request.create',compact('users','title'));
    }

    public function store(StoreMachineRequest $request)
    {
       if($request['data_check'] == "on")
       {
            $machineRequest = new MachineRequest;
            
            $machineRequest->requester_id = auth()->user()->id;
            $machineRequest->model = $request['model'];
            $machineRequest->qty = $request['qty'];
            $machineRequest->system = $request['system'];
            $machineRequest->cassette_no = $request['cassette_no'];
            $machineRequest->contract_period = $request['contract_period'];
            $machineRequest->special_requirement = $request['special_requirement'];
            $machineRequest->company_name = $request['company_name'];
            $machineRequest->billing_address = $request['billing_address'];
            $machineRequest->office_contact_no = $request['office_contact_no'];
            $machineRequest->installation_address = $request['installation_address'];
            $machineRequest->person_in_charge = $request['person_in_charge'];
            $machineRequest->contact_no = $request['contact_no'];
            $machineRequest->installation_date = $request['installation_date'];
            $machineRequest->technician_id = $request['technician_id'];
            $machineRequest->cc_user_id = implode(',',$request['cc_user_id']);
            $machineRequest->status = 0;
            $machineRequest->save();
            
            $cc = $request['cc_user_id'];
            $cc_emails[] = User::find($cc)->pluck('email');

            Mail::to($machineRequest->technician->email)
                ->cc($cc_emails[0])    
                ->queue(new MachineRequestSent($machineRequest));
           
            return session()->flash('success','Machine Request Submitted'); 

            $data['success'] = true;
        
        }
       else
       {
            $data['success'] = false;
       }
            return response()->json($data);
    }


    public function show(MachineRequest $machineRequest)
    {
        $status = MachineRequest::STATUS;
        $title = __('label.machine_request.title.show');

        return view('machine_request.show',compact('machineRequest','status','title'));
    }

    public function requestDetails(MachineRequest $machineRequest)
    {
        if($machineRequest->technician->id == auth()->user()->id && $machineRequest->status == 1)
        {
            return redirect()->route('machine_request.pending_index')->with('error','Machine Request Cannot Be Found.');
        }
        else
        {
            return redirect()->route('machine_request.pending',['machineRequest' => $machineRequest]);
        }
    }

    public function mark(MachineRequest $machineRequest)
    {
        $machineRequest->update(array('status' => 1));

        Mail::to($machineRequest->user->email)
            ->queue(new MachineRequestCompleted($machineRequest));

        return redirect()->route('machine_request.completed_index')->with('success', 'Machine Request Approved.');
    }

}
