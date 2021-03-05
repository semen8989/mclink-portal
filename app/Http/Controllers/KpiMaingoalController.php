<?php

namespace App\Http\Controllers;

use App\Models\KpiRating;
use App\Models\KpiMaingoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KpiMaingoalDataTable;
use App\Http\Requests\StoreKpiMainRequest;

class KpiMaingoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataTables\KpiMaingoalDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KpiMaingoalDataTable $dataTable)
    {
        $dateFilter = KpiMaingoal::selectRaw("DATE_FORMAT(created_at, '%Y') AS year")
            ->where('user_id', auth()->user()->id)
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        return $dataTable->render('okr.kpi.maingoal.index', compact('dateFilter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('okr.kpi.maingoal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKpiMainRequest $request)
    {
        $validated = $request->validated();    
        $validated['user_id'] = auth()->user()->id;

        $result = true;
        
        try {
            DB::transaction(function () use ($validated) {
                KpiMaingoal::create($validated);
            });
        } catch (\Exception $e) {
            $result = false;
        }

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => 'KPI Main Goal', 'action' => 'created'])
            : __('label.global.response.error.general', ['action' => 'creating']);
        
        return redirect()->route('performance.okr.kpi-maingoals.index')->with($resultStatus, $msg);
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
    public function edit(KpiMaingoal $kpiMain)
    {
        $kpiMain->load(['kpiratings' => function ($query) {
            $query->orderBy('month', 'asc')->limit(1);
        }]);

        return view('okr.kpi.maingoal.edit', compact('kpiMain'));
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
       $kpiMain = KpiMaingoal::updateOrCreate($request->except('_token', '_method'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KpiMaingoal  $kpiMain
     * @return \Illuminate\Http\Response
     */
    public function destroy(KpiMaingoal $kpiMain)
    {
        $result = $kpiMain->delete();

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => 'KPI Main', 'action' => 'deleted'])
            : __('label.global.response.error.general', ['action' => 'deleting']);

        return back()->with($resultStatus, $msg);
    }

    /**
     * Fetch a rating based on the main kpi
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KpiMaingoal  $kpiMain
     * @return \Illuminate\Http\Response
     */
    public function getRating(Request $request, KpiMaingoal $kpiMain)
    {
        $kpiMain->load(['kpiratings' => function ($query) use ($request) {
            $query->where('month', $request->month);
        }]);

        return response()->json($kpiMain->kpiratings);
    }
}
