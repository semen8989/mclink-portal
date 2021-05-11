<?php

namespace App\Http\Controllers;

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
        $title = __('label.e_appraisal_my_record.title.new_index');

        return $dataTable->render('e_appraisal.my_record.index', compact('title'));
    }
}
