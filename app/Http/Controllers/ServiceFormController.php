<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceFormController extends Controller
{
    /**
     * Show list of service forms.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('service_form.index', [
        ]);
    }

    /**
     * Show the form for creating a new service form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service_form.create');
    }


    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'save':
                // Save model
                break;
    
            case 'preview':
                // Preview model
                break;
    
            case 'advanced_edit':
                // Redirect to advanced edit
                break;
        }
    }
}
