<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KpiMaingoal;
use Illuminate\Http\Request;
use App\DataTables\NewRecordAppraisalDataTable;

class NewRecordAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\DataTables\NewRecordAppraisalDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, NewRecordAppraisalDataTable $dataTable)
    {
        // $title = __('label.kpi_main.title.index');
        $departmentUsers = null;

        if (auth()->user()->isDepartmentHead()) {
            $departmentUsers = User::select(['id', 'name'])
                ->where([
                    ['department_id', auth()->user()->department_id],
                    ['company_id', auth()->user()->company_id],
                ])->get();
        }

        $dateFilter = KpiMaingoal::selectRaw("DATE_FORMAT(created_at, '%Y') AS year")
            ->where('user_id', auth()->user()->id)
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        return $dataTable->render('e_appraisal.my_record.index', compact('dateFilter', 'departmentUsers'));
    }
}
