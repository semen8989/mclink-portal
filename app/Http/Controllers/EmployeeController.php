<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\OfficeShift;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\DataTables\EmployeeDataTable;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

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
        
        return $dataTable->render('employee.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add New Employee';

        $data = [
            'users' => User::all(),
            'companies' => Company::all(),
            'officeShifts' => OfficeShift::all(),
            'roles' => Role::all()
        ];

        return view('employee.create',compact('data','title'));
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
        $user->contact_number = $request['contact_number'];
        $user->report_to = $request['report_to'];
        $user->shift_id = $request['shift_id'];
        $user->email = $request['email'];
        $user->status = $request['status'];
        $user->password = Hash::make($request['password']);
        $user->save();

        foreach($request['role'] as $role){
            $user->assignRole($role);
        }

        return session()->flash('success','New Employee Record Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $title = 'View Employee Details';
        $status = Str::ucfirst(array_search($user->status, User::STATUS));
        
        return view('employee.show',compact('title','user','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Edit Employee Details';
        
        $selectedRole = array();
        
        foreach($user->roles as $role){
            array_push($selectedRole,$role->id);
        }

        $data = [
            'companies' => Company::all(),
            'departments' => Company::find($user->company_id)->departments,
            'designations' => Department::find($user->department_id)->designations,
            'officeShifts' => OfficeShift::all(),
            'roles' => Role::all(),
            'users' => User::all(),
            'selectedRole' => $selectedRole
        ];
        
        return view('employee.edit',compact('data','title','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, User $user)
    {
        $user->name = $request['name'];
        $user->employee_id = $request['employee_id'];
        $user->joining_date = $request['joining_date'];
        $user->gender = $request['gender'];
        $user->birth_date = $request['birth_date'];
        $user->company_id = $request['company_id'];
        $user->department_id = $request['department_id'];
        $user->designation_id = $request['designation_id'];
        $user->contact_number = $request['contact_number'];
        $user->report_to = $request['report_to'];
        $user->shift_id = $request['shift_id'];
        $user->email = $request['email'];
        $user->status = $request['status'];

        if(!empty($request['password'])){
            $user->password = Hash::make($request['password']);
        }
        
        if(count($request['role']) != count($user->roles)){
            DB::table('role_user')->where('user_id', $user->id)->delete();

            foreach($request['role'] as $role){
                $user->assignRole($role);
            }
            
        }

        $user->save();

        return session()->flash('success','Employee Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        $message = 'Employee Record Deleted Successfully!';
        
        return redirect()->route('employees.index')->with('success',$message);
    }
}
