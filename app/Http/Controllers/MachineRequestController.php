<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MachineRequest;
use App\Http\Requests\StoreMachineRequest;

class MachineRequestController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('machine_request.create_request',compact('users'));
    }

    public function store_request(StoreMachineRequest $request)
    {
        MachineRequest::create($request->all());
        return session()->flash('success','Machine Request Submitted');
    }
}
