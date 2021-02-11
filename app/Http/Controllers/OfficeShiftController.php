<?php

namespace App\Http\Controllers;

use App\Models\OfficeShift;
use Illuminate\Http\Request;

class OfficeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('label.shifts');
        return view('office_shift.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_shift');
        return view('office_shift.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeShift $officeShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeShift $officeShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeShift $officeShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeShift  $officeShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeShift $officeShift)
    {
        //
    }
}
