<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MachineRequest;
use App\Http\Requests\StoreMachineRequest;
use App\DataTables\PendingMachineRequestDataTable;

class MachineRequestController extends Controller
{
    public function create_request()
    {
        $users = User::all();
        return view('machine_request.create_request',compact('users'));
    }

    public function store_request(StoreMachineRequest $request)
    {
        $request['requester_id'] = auth()->user()->id;

        MachineRequest::create($request->all());
        
        return session()->flash('success','Machine Request Submitted');
    }
    
    public function pending_request(PendingMachineRequestDataTable $dataTable)
    {
        return $dataTable->render('machine_request.pending_request.index');
    }
}
