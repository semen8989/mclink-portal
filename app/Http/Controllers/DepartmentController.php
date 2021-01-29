<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = DB::table('department')
                        ->join('users','department.user_id','=','users.id')
                        ->join('company','department.company_id','=','company.id')
                        ->select('department.*','company.company_name','users.name')
                        ->latest()
                        ->paginate(10);

        return view('department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all('id','company_name');
        $users = User::all('id','name');
        return view('department.create',compact('companies','users'));
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
        return redirect()->route('department.index')->with('success', 'Department created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        
        $companies = Company::all('id','company_name');
        $users = User::all('id','name');
        return view('department.edit',compact('department','companies','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartmentRequest $request, $id)
    {
        Department::whereId($id)->update($request->except(['_token','_method']));

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}
