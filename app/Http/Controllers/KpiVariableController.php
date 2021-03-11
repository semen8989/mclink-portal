<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KpiVariable;
use Illuminate\Http\Request;
use App\DataTables\KpiVariableDataTable;

class KpiVariableController extends Controller
{
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

        $dateFilter = KpiVariable::select('variable_year as year')
            ->where('user_id', auth()->user()->id)
            ->groupBy('variable_year')
            ->orderBy('variable_year', 'desc')
            ->get();

        return $dataTable->render('okr.kpi.variable.index', compact('title', 'dateFilter', 'departmentUsers'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
