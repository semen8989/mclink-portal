<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MyRecordAppraisalDataTable;
use App\Models\EmployeeAppraisal;
use App\Models\NewEmployeeAppraisal;

class NewRecordAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\DataTables\MyRecordAppraisalDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, MyRecordAppraisalDataTable $dataTable)
    {
        $title = __('label.e_appraisal_my_record.title.new_index');

        return $dataTable->render('e_appraisal.my_record.new_employee.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.e_appraisal_my_record.title.new_index');

        $purposeOptions = NewEmployeeAppraisal::getPurposeOptionList();
        $appraisalStatus = NewEmployeeAppraisal::getAppraisalStatusList();
        $progressStatus = NewEmployeeAppraisal::getProgressStatusList();
        $recommendationOptions = NewEmployeeAppraisal::getrecommendationOptionList();   

        return view('e_appraisal.my_record.new_employee.create', compact('title', 'purposeOptions', 'appraisalStatus', 'progressStatus', 'recommendationOptions'));
    }

    /**
     * Remove the specified resource from storage (soft delete).
     *
     * @param  \App\Models\EmployeeAppraisal  $newEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeAppraisal $newEmployee)
    {
        $result = $newEmployee->delete();
        
        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => __('label.e_appraisal_my_record.modal.msg.delete_new'), 'action' => __('label.global.response.action.deleted')])
            : __('label.global.response.error.general', ['action' => __('label.global.response.action.deleting')]);

        return back()->with($resultStatus, $msg);
    }
}
