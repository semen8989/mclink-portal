<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Department;
use App\DataTables\DepartmentDataTable;
use App\Http\Requests\StoreDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepartmentDataTable $dataTable)
    {
        $title = __('label.departments');
        
        return $dataTable->render('department.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_department');
        $companies = Company::all('id','company_name');
        
        return view('department.create',compact('companies','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->all());
        
        $action = __('label.global.response.action.created');
        $message = __('label.global.response.success.general', ['module' => __('label.department'), 'action' => $action]);
        
        return session()->flash('success',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {   
        $title = __('label.edit_department');
        $companies = Company::all('id','company_name');
        $users = Company::find($department->company_id)->company_users;
        
        return view('department.edit',compact('department', 'companies', 'users', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartmentRequest $request, Department $department)
    {
        $department->update($request->all());
        
        $action = __('label.global.response.action.updated');
        $message = __('label.global.response.success.general', ['module' => __('label.department'), 'action' => $action]);
        
        return session()->flash('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        $action = __('label.global.response.action.deleted');
        $message = __('label.global.response.success.general', ['module' => __('label.department'), 'action' => $action]);

        return redirect()->route('departments.index')->with('success',$message);
    }
}
