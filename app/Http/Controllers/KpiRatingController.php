<?php

namespace App\Http\Controllers;

use App\Models\KpiRating;
use Illuminate\Http\Request;

class KpiRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO check if this function still needed (paul)
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
     * @param  \App\Models\KpiRating  $kpiRating
     * @return \Illuminate\Http\Response
     */
    public function show(KpiRating $kpiRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KpiRating  $kpiRating
     * @return \Illuminate\Http\Response
     */
    public function edit(KpiRating $kpiRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KpiRating  $kpiRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KpiRating $kpiRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KpiRating  $kpiRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(KpiRating $kpiRating)
    {
        //
    }
}
