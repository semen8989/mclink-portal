<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MachineRequestController extends Controller
{
    public function index()
    {
        return view('machine_request.create_request');
    }
}
