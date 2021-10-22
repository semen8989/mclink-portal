<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SalesLead;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSalesLeadRequest;

class SalesLeadController extends Controller
{
    public function index()
    {
        return view('sales_lead.index');
    }

    public function create()
    {
        $users = User::all('id','name');
        return view('sales_lead.create',compact('users'));
    }

    public function store(StoreSalesLeadRequest $request)
    {
        SalesLead::create($request->all());

        return session()->flash('success','Sales Lead Created Successfully!');
    }

}
