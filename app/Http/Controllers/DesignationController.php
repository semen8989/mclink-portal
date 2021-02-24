<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\DataTables\DesignationDataTable;
use App\Http\Requests\StoreDesignationRequest;

class DesignationController extends Controller
{
    protected $actions = ['create'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DesignationDataTable $dataTable)
    {
        $title = __('label.designations');
        return $dataTable->render('designation.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_designation');
        $companies = Company::all();
        return view('designation.create',compact('title','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesignationRequest $request)
    {
        Designation::create($request->all());
        return session()->flash('success', 'Designation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        $title = __('label.edit_designation');
        $companies = Company::all();
        $departments = Company::find($designation->company_id)->departments;
        return view('designation.edit',compact('title','companies','departments','designation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDesignationRequest $request, Designation $designation)
    {
        $designation->update($request->all());
        return session()->flash('success', 'Designation created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect()->route('designations.index')->with('success', 'Designation deleted successfully.');
    }
}
