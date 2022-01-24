<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Ability;
use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $dataTable)
    {
        $title = 'Roles';

        return $dataTable->render('role.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add New Role';

        $abilities = Ability::all();

        return view('role.create',compact('title','abilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());

        foreach($request['abilities'] as $ability)
        {
            $role->allowTo($ability);
        }

        return session()->flash('success','New Role Record Added Successfully!');
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
    public function edit(Role $role)
    {
        $title = 'Edit Role Details';

        $abilities = Ability::all();

        $selectedAbility = array();

        foreach($role->abilities as $ability){
            array_push($selectedAbility,$ability->id);
        }

        return view('role.edit',compact('role','title','abilities','selectedAbility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, Role $role)
    {
        $role->update($request->all());

        if(count($request['abilities']) != count($role->abilities)){
            DB::table('ability_role')->where('role_id', $role->id)->delete();

            foreach($request['abilities'] as $ability){
                $role->allowTo($ability);
            }
            
        }

        return session()->flash('success','Role Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        $message = 'Role Record Deleted Successfully!';

        return redirect()->route('roles.index')->with('success',$message);


    }
}
