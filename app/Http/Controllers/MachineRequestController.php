<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MachineRequest;
use App\Http\Requests\StoreMachineRequest;
use App\DataTables\PendingMachineRequestDataTable;
use App\DataTables\CompletedMachineRequestDatatable;

class MachineRequestController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('machine_request.create',compact('users'));
    }

    public function store(StoreMachineRequest $request)
    {
       if($request['data_check'] == "on")
       {
            $request['requester_id'] = auth()->user()->id;
            $request['technician_id'] = implode(',', $request->technician_id);
            
            MachineRequest::create($request->all());
            
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
        return view('machine_request.show',compact('machineRequest','status'));
    }
    
    public function pendingRequestIndex(PendingMachineRequestDataTable $dataTable)
    {
        return $dataTable->render('machine_request.pending_request.index');
    }

    public function completedRequestIndex(CompletedMachineRequestDatatable $dataTable)
    {
        return $dataTable->render('machine_request.completed_request.index');
    }

}
