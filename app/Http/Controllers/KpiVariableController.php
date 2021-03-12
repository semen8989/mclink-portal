<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KpiVariable;
use Illuminate\Http\Request;
use App\Traits\YearRangeTrait;
use Illuminate\Support\Facades\DB;
use App\DataTables\KpiVariableDataTable;
use App\Http\Requests\StoreKpiVariableRequest;

class KpiVariableController extends Controller
{
    use YearRangeTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KpiVariableDataTable $dataTable)
    {
        $title = __('label.kpi_main.title.index');
        $departmentUsers = null;

        if (auth()->user()->isDepartmentHead()) {
            $departmentUsers = User::select(['id', 'name'])
                ->where([
                    ['department_id', auth()->user()->department_id],
                    ['company_id', auth()->user()->company_id],
                ])->get();
        }

        $quarterFilter = KpiVariable::QUARTER;

        $yearFilter = KpiVariable::select('variable_year as year')
            ->where('user_id', auth()->user()->id)
            ->groupBy('variable_year')
            ->orderBy('variable_year', 'desc')
            ->get();

        return $dataTable->render('okr.kpi.variable.index', compact('title', 'yearFilter', 'quarterFilter', 'departmentUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.kpi_variable.title.create');
        $yearList = $this->getYearRange(5, 5);

        return view('okr.kpi.variable.create', compact('title', 'yearList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKpiVariableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKpiVariableRequest $request)
    {
        $validated = $request->validated();    
        $validated['user_id'] = auth()->user()->id;

        $result = true;
        
        try {
            DB::transaction(function () use ($validated) {
                KpiVariable::create($validated);
            });
        } catch (\Exception $e) {
            $result = false;
        }

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => 'KPI Main Goal', 'action' => 'created'])
            : __('label.global.response.error.general', ['action' => 'creating']);
        
        return redirect()->route('okr.kpi.variables.index')->with($resultStatus, $msg);
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
     * @param  \App\Models\KpiVariable  $kpiVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(KpiVariable $kpiVariable)
    {
        $title = __('label.kpi_main.title.edit');
        $yearList = $this->getYearRange(5, 5, $kpiVariable->variable_year);

        $kpiVariable->load(['kpiratings' => function ($query) {
            $query->where('month', date('n'));
        }]);

        return view('okr.kpi.variable.edit', compact('title', 'kpiVariable', 'yearList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Fetch a rating based on the main kpi
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KpiVariable  $kpiVariable
     * @return \Illuminate\Http\Response
     */
    public function getRating(Request $request, KpiVariable $kpiVariable)
    {
        $kpiVariable->load(['kpiratings' => function ($query) use ($request) {
            $query->where('month', $request->month);
        }]);

        return response()->json($kpiVariable->kpiratings);
    }
}
