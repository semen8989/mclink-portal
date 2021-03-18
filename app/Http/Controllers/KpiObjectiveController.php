<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use App\Models\KpiObjective;
use Illuminate\Http\Request;
use App\Traits\YearRangeTrait;
use Illuminate\Support\Facades\DB;
use App\DataTables\KpiObjectiveDataTable;
use App\Http\Requests\StoreKpiObjectiveRequest;
use App\Http\Requests\UpdateKpiObjectiveRequest;

class KpiObjectiveController extends Controller
{
    use YearRangeTrait;

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataTables\KpiObjectiveDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KpiObjectiveDataTable $dataTable)
    {
        $title = __('label.kpi_objective.title.index');
        $departmentUsers = null;

        if (auth()->user()->isDepartmentHead()) {
            $departmentUsers = User::select(['id', 'name'])
                ->where([
                    ['department_id', auth()->user()->department_id],
                    ['company_id', auth()->user()->company_id],
                ])->get();
        }

        $quarterFilter = KpiObjective::QUARTER;

        $yearFilter = KpiObjective::select('objective_year as year')
            ->where('user_id', auth()->user()->id)
            ->groupBy('objective_year')
            ->orderBy('objective_year', 'desc')
            ->get();

        return $dataTable->render('okr.kpi.objective.index', compact('title', 'yearFilter', 'quarterFilter', 'departmentUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.kpi_objective.title.create');
        $yearList = $this->getYearRange(5, 5);

        return view('okr.kpi.objective.create', compact('title', 'yearList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKpiObjectiveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKpiObjectiveRequest $request)
    {
        $validated = $request->validated();    
        $validated['user_id'] = auth()->user()->id;

        $result = true;
        
        try {
            DB::transaction(function () use ($validated) {
                KpiObjective::create($validated);
            });
        } catch (\Exception $e) {
            $result = false;
        }

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => 'KPI Objective', 'action' => 'created'])
            : __('label.global.response.error.general', ['action' => 'creating']);
        
        return redirect()->route('okr.kpi.objectives.index')->with($resultStatus, $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KpiObjective $kpiObjective
     * @return \Illuminate\Http\Response
     */
    public function show(KpiObjective $kpiObjective)
    {
        $title = __('label.kpi_objective.title.show');
        $kpiObjective->load('kpiratings');

        return view('okr.kpi.objective.show', compact('title', 'kpiObjective'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KpiObjective  $kpiObjective
     * @return \Illuminate\Http\Response
     */
    public function edit(KpiObjective $kpiObjective)
    {
        $title = __('label.kpi_objective.title.edit');

        $kpiObjective->load(['kpiratings' => function ($query) {
            $query->where('month', date('n'));
        }]);

        return view('okr.kpi.objective.edit', compact('title', 'kpiObjective'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKpiObjectiveRequest  $request
     * @param  \App\Models\KpiObjective  $kpiObjective
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKpiObjectiveRequest $request, KpiObjective $kpiObjective)
    {
        $validated = $request->validated();
        
        $ratingInput = array();
        $kpiRating = null;
        
        if (!empty($validated['kpi_ratings'])) {
            $kpiObjective->load(['kpiratings' => function ($query) use ($validated) {
                $query->where('month', $validated['kpi_ratings']['month']);
            }]);
    
            $ratingInput['month'] = $validated['kpi_ratings']['month']; 
            $ratingInput['rating'] = $validated['kpi_ratings']['rating']; 
            $ratingInput['manager_comment'] = $validated['kpi_ratings']['manager_comment'];
    
            if ($kpiObjective->kpiratings->isNotEmpty()) {
                $kpiRating = $kpiObjective->kpiratings[0];
    
                $ratingInput['kpi_ratable_id'] = $kpiRating->kpi_ratable_id;
                $ratingInput['kpi_ratable_type'] = $kpiRating->kpi_ratable_type;
            } else {
                $kpiRating = $kpiObjective->kpiratings();
            }
        }

        $result = true;
        
        try {
            DB::transaction(function () use ($kpiObjective, $kpiRating, $ratingInput, $validated) { 
                $kpiObjective->update(Arr::except($validated, ['kpi_ratings']));

                if ($kpiRating) {
                    if ($kpiObjective->kpiratings->isNotEmpty()) {            
                        $kpiRating->update($ratingInput);
                    } else {
                        $kpiRating->create($ratingInput);
                    }
                }      
            });
        } catch (\Exception $e) {
            $result = false;
        }

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result 
            ? __('label.global.response.success.general', ['module' => 'KPI Objective', 'action' => 'updated'])
            : __('label.global.response.error.general', ['action' => 'updating']);

        return redirect()->route('okr.kpi.objectives.show', [$kpiObjective->id])->with($resultStatus, $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KpiObjective  $kpiObjective
     * @return \Illuminate\Http\Response
     */
    public function destroy(KpiObjective $kpiObjective)
    {
        $result = $kpiObjective->delete();

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => 'KPI Objective', 'action' => 'deleted'])
            : __('label.global.response.error.general', ['action' => 'deleting']);

        return back()->with($resultStatus, $msg);
    }

    /**
     * Fetch a rating based on the objective kpi
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KpiObjective  $kpiObjective
     * @return \Illuminate\Http\Response
     */
    public function getRating(Request $request, KpiObjective $kpiObjective)
    {
        $kpiObjective->load(['kpiratings' => function ($query) use ($request) {
            $query->where('month', $request->month);
        }]);

        return response()->json($kpiObjective->kpiratings);
    }
}
