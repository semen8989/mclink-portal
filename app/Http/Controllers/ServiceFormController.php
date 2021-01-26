<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceFormController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('service_form.index', [
        ]);
    }
}
