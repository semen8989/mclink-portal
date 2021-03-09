<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Company;
use Illuminate\Http\Request;
use App\DataTables\PolicyDataTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePolicyRequest;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PolicyDataTable $dataTable)
    {
        $title = __('label.policies');
        return $dataTable->render('policy.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_policy');
        $companies = Company::all();  
        return view('policy.create',compact('companies','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePolicyRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        Policy::create($request->all());
        //Success flash message
        return session()->flash('success','Policy created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        $title = __('label.view_policy');
        return view('policy.show',compact('title','policy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        $title = __('label.edit_policy');
        $companies = Company::all();  
        return view('policy.edit',compact('title','companies','policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePolicyRequest $request, Policy $policy)
    {
        $policy->update($request->all());
        //Success flash message
        return session()->flash('success','Policy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        $policy->delete();
        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }
}
