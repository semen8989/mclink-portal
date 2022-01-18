<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\OfficeShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\EmployeeDataTable;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTable $dataTable)
    {
        $title = 'Employees';
        
        return $dataTable->render('employees.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $departments = Department::all();
        $designations = Designation::all();
        $officeShifts = OfficeShift::all();
        return view('employees.create',compact('companies','departments','designations','officeShifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $user = new User;
        $user->name = $request['name'];
        $user->employee_id = $request['employee_id'];
        $user->joining_date = $request['joining_date'];
        $user->gender = $request['gender'];
        $user->birth_date = $request['birth_date'];
        $user->company_id = $request['company_id'];
        $user->department_id = $request['department_id'];
        $user->designation_id = $request['designation_id'];
        //$user->role_id = $request['role_id'];
        $user->contact_number = $request['contact_number'];
        $user->shift_id = $request['shift_id'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return session()->flash('success','New Employee Data Added Successfully!');
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
    public function edit(User $id)
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
