<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Holiday;
use Illuminate\Http\Request;
use App\DataTables\HolidayDataTable;
use App\Http\Requests\StoreHolidayRequest;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HolidayDataTable $dataTable)
    {
        $title = __('label.holidays');
        
        return $dataTable->render('holiday.index',compact('title'));
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
        $status = Holiday::STATUS;
        
        return view('holiday.create',compact('title','companies','status'));
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
        
        $action = __('label.global.response.action.created');
        $message = __('label.global.response.success.general', ['module' => __('label.holiday'), 'action' => $action]);

        return session()->flash('success',$message);
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
        $status = Holiday::STATUS;

        return view('holiday.edit',compact('title','companies','holiday','status'));
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
        
        $action = __('label.global.response.action.updated');
        $message = __('label.global.response.success.general', ['module' => __('label.holiday'), 'action' => $action]);

        return session()->flash('success',$message);
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

        $action = __('label.global.response.action.deleted');
        $message = __('label.global.response.success.general', ['module' => __('label.holiday'), 'action' => $action]);

        return redirect()->route('holidays.index')->with('success',$message);
    }
}
