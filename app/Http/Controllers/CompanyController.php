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
            'company_name' => 'required',
            'company_type' => 'required',
            'trading_name' => 'required',
            'registration_no' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'username' => 'required',
            'password' => 'required',
            'xin_gtax' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'city' => 'required',
            'state' => 'required',
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
