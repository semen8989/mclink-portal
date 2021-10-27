<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SalesLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\SalesLeadDataTable;
use App\DataTables\AssignSalesLeadDataTable;
use App\Http\Requests\StoreSalesLeadRequest;

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
        $request['user_id'] = Auth::user()->id;
        SalesLead::create($request->all());

        return session()->flash('success','Sales Lead Created Successfully!');
    }

    public function assignIndex(AssignSalesLeadDataTable $dataTable)
    {
        $title = 'Assign';
        return $dataTable->render('sales_lead.assign.index',compact('title'));
    }

    public function show(SalesLead $salesLead)
    {
        return view('sales_lead.assign.show',compact('salesLead'));
    }

}
