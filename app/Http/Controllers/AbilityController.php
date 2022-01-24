<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\AbilityDataTable;
use App\Http\Requests\StoreAbilityRequest;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AbilityDataTable $dataTable)
    {
        $title = 'Abilities';

        return $dataTable->render('ability.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add New Ability';

        return view('ability.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbilityRequest $request)
    {
        $name = Str::of(strtolower($request['name']))->slug('-');

        $request = $request->all();
        $request['name'] = $name;

        Ability::create($request);

        return session()->flash('success','New Ability Record Added Successfully!');
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
    public function edit(Ability $ability)
    {
        $title = 'Edit Ability Details';

        return view('ability.edit',compact('ability','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAbilityRequest $request, Ability $ability)
    {
        $name = Str::of(strtolower($request['name']))->slug('-');
        
        $request = $request->all();
        $request['name'] = $name;

        $ability->update($request);

        return session()->flash('success','Ability Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability)
    {
        $ability->delete();

        $message = 'Ability Record Deleted Successfully!';

        return redirect()->route('abilities.index')->with('success',$message);
    }
}
