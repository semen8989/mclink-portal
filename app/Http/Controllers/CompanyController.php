<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $companies = DB::table('company')
                ->join('users','company.user_id','=','users.id')
                ->select('company.*','users.name')
                ->latest()
                ->paginate(5);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating fields before insert
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:50',
            'company_type' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email|filter',
            'website' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
        ]);
        //Inserting new data
        $validatedData['user_id'] = Auth::user()->id;
        Company::create($validatedData);
        //Redirect after success
        return redirect()->route('company.index')->with('success', 'Company created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = DB::table('company')
                ->join('users','company.user_id','=','users.id')
                ->select('company.*','users.name')
                ->where('company.company_id','=',$id)
                ->first();

        return view('company.view',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit',compact('company'));
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
        //Validating fields before update
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:50',
            'company_type' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email|filter',
            'website' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
        ]);
        Company::where('company_id',$id)
                ->update($validatedData);

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');

    }
}
