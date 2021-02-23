<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHolidayRequest;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('label.holidays');
        $holidays = Holiday::all();
        return view('holiday.index',compact('title','holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_holiday');
        $companies = Company::all();
        return view('holiday.create',compact('title','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHolidayRequest $request)
    {
        Holiday::create($request->all());
        //Success flash message
        return session()->flash('success','Holiday created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {
        $title = __('label.view_holiday');
        return view('holiday.show',compact('title','holiday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Holiday $holiday)
    {
        $title = __('label.edit_holiday');
        $companies = Company::all();
        return view('holiday.edit',compact('title','companies','holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHolidayRequest $request, Holiday $holiday)
    {
        $holiday->update($request->all());
        //Success flash message
        return session()->flash('success','Holiday updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect()->route('holidays.index')->with('success', 'Holiday deleted successfully.');
    }
}
