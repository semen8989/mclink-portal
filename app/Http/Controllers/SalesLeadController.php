<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesLeadController extends Controller
{
    public function index()
    {
        return view('sales_lead.index');
    }

    public function create()
    {
        return view('sales_lead.create');
    }

}
