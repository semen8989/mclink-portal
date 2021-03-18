<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\DataTables\CompanyDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyDataTable $dataTable)
    {
        $title = __('label.companies');

        return $dataTable->render('company.index',compact('title'));
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
       if($request->hasFile('logo')){
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/company_logos',$fileNameToStore);
       } else {
            $fileNameToStore = '';
       }

        $data = $request->except('logo');
        $data['user_id'] = auth()->user()->id;
        $data['logo'] = $fileNameToStore;
        
        Company::create($data);

        $action = __('label.global.response.action.created');
        $message = __('label.global.response.success.general', ['module' => __('label.company'), 'action' => $action]);
        
        return session()->flash('success',$message);
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
        if($request->hasFile('logo')){
            Storage::delete('public/cover_images/'.$company->logo);

            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/company_logos',$fileNameToStore);
        }else{
            $fileNameToStore = $company->logo;
        }
        $data = $request->except('logo');
        $data['logo'] = $fileNameToStore;

        $company->update($data);
        
        $action = __('label.global.response.action.updated');
        $message = __('label.global.response.success.general', ['module' => __('label.company'), 'action' => $action]);
        
        return session()->flash('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Storage::delete('public/company_logos/'.$company->logo);

        $company->delete();

        $action = __('label.global.response.action.deleted');
        $message = __('label.global.response.success.general', ['module' => __('label.company'), 'action' => $action]);

        return redirect()->route('companies.index')->with('success', $message);
    }
}
