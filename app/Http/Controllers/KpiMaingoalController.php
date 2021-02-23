<?php

namespace App\Http\Controllers;

use App\DataTables\KpiMaingoalDataTable;
use App\Models\KpiMaingoal;
use Illuminate\Http\Request;

class KpiMaingoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KpiMaingoalDataTable $dataTable)
    {
        return $dataTable->render('okr.kpi.maingoal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\KpiMaingoal  $kpiMaingoal
     * @return \Illuminate\Http\Response
     */
    public function show(KpiMaingoal $kpiMaingoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KpiMaingoal  $kpiMaingoal
     * @return \Illuminate\Http\Response
     */
    public function edit(KpiMaingoal $kpiMaingoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KpiMaingoal  $kpiMaingoal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KpiMaingoal $kpiMaingoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KpiMaingoal  $kpiMaingoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(KpiMaingoal $kpiMaingoal)
    {
        //
    }
}
