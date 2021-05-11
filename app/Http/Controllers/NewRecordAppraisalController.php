<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\NewRecordAppraisalDataTable;
use App\Models\EmployeeAppraisal;

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

        return $dataTable->render('e_appraisal.my_record.new_employee.index', compact('title'));
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
