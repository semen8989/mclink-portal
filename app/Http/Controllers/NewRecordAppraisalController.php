<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\EmployeeAppraisal;
use Illuminate\Support\Facades\DB;
use App\Models\NewEmployeeAppraisal;
use App\DataTables\MyRecordAppraisalDataTable;
use App\Events\AppraisalCreated;
use App\Http\Requests\StoreNewRecordAppraisalRequest;

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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewRecordAppraisalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewRecordAppraisalRequest $request)
    {
        $appraisal = null;
        $result = true;

        $validated = $request->validated(); 
        $validated['user_id'] = auth()->user()->id;
        $mainAppraisalCols = [
            'user_id',
            'employee_id',
            'review_period_from',
            'review_period_to',
            'review_date',
            'total_score'
        ];

        try {
            DB::transaction(function () use (&$appraisal, $validated, $mainAppraisalCols) {
                $appraisal = EmployeeAppraisal::create(Arr::only($validated, $mainAppraisalCols));
                $validated['employee_appraisal_id'] = $appraisal->id;
                $appraisal->newEmployeeAppraisal()->create(Arr::except($validated, $mainAppraisalCols));

                foreach ($validated['shared'] as $user) {
                    $appraisal->sharedUsers()->attach($user, [
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);
                }
            });
        } catch (\Exception $event) {
            $result = false;
        }

        if ($result) {
            AppraisalCreated::dispatch($appraisal);
        }

        $resultStatus = $result ? 'success' : 'error';

        $msg = $result
            ? __('label.global.response.success.general', ['module' => 'e-Appraisal', 'action' => 'created'])
            : __('label.global.response.error.general', ['action' => 'creating']);
        
        return redirect()->route('appraisal.my.record.new.employee.index')->with($resultStatus, $msg);
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
