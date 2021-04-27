<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KpiReport;
use App\Models\KpiMaingoal;
use App\Models\KpiVariable;
use Illuminate\Http\Request;
use App\Exports\EmployeeKpiExport;

class KpiReportController extends Controller
{
    /**
     * Display the initial page of the module
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kpiTypes = KpiReport::getKpiTypes();
        $quarters = KpiReport::getQuarterList();

        $mainYear = KpiMaingoal::selectRaw("DATE_FORMAT(created_at, '%Y') AS year")->get();
        $variableYear = KpiVariable::select('variable_year as year')->get();

        $years = $mainYear->concat($variableYear)->groupBy('year')->all();

        return view('kpi_report.index', compact('kpiTypes', 'quarters', 'years'));     
    }

    public function download(Request $request)
    {
        return new EmployeeKpiExport($request, User::all());
    }
}