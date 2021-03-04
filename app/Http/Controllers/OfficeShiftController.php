<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\OfficeShift;
use Illuminate\Http\Request;
use App\DataTables\OfficeShiftDataTable;
use App\Http\Requests\StoreOfficeShiftRequest;

class OfficeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfficeShiftDataTable $dataTable)
    {
        $title = __('label.shifts');
        return $dataTable->render('office_shift.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_shift');
        $companies = Company::all();
        return view('office_shift.create',compact('title','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeShiftRequest $request)
    {
        OfficeShift::create($request->all());
        //Success flash message
        return session()->flash('success', 'Office Shift created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeShift $officeShift)
    {
        $title = __('label.view_shift');
        return view('office_shift.show',compact('title','officeShift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeShift $officeShift)
    {
        $title = __('label.edit_shift');
        $companies = Company::all();
        return view('office_shift.edit',compact('title','companies','officeShift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOfficeShiftRequest $request, OfficeShift $officeShift)
    {
        $officeShift->update($request->all());
        //Success flash message
        return session()->flash('success', 'Office Shift updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeShift $officeShift)
    {
        $officeShift->delete();
        return redirect()->route('office_shifts.index')->with('success', 'Office Shift deleted successfully.');
    }
}
