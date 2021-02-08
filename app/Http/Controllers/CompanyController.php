<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        $title = __('label.companies');
        return view('company.index', compact('companies','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_company');
        return view('company.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        //File upload
       if($request->hasFile('logo')){
            //Get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = time().'.'.$extension;
            //Upload image
            $path = $request->file('logo')->storeAs('public/company_logos',$fileNameToStore);
       } else {
            $fileNameToStore = '';
       }
        //Inserting new data
        $data = $request->except('logo');
        $data['user_id'] = auth()->user()->id;
        $data['logo'] = $fileNameToStore;
        Company::create($data);
        //Redirect after success
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $title = __('label.view_company');
        return view('company.show',compact('company','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $title = __('label.edit_company');
        return view('company.edit',compact('company','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
