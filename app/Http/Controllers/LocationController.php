<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;
use App\DataTables\LocationDataTable;
use App\Http\Requests\StoreLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LocationDataTable $dataTable)
    {
        $title = __('label.locations');
        return $dataTable->render('location.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $title = __('label.add_location');
        return view('location.create',compact('title','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        $location = new Location;
        $location->company_id = $validated['company_id'];
        $location->location_name = $validated['location_name'];
        $location->email = $validated['email'];
        $location->phone = $validated['phone'];
        $location->fax_num = $validated['fax_num'];
        $location->location_head = $validated['location_head'];
        $location->address_1 = $validated['address_1'];
        $location->address_2 = $validated['address_2'];
        $location->city = $validated['city'];
        $location->state = $validated['state'];
        $location->zip_code = $validated['zip_code'];
        $location->country = $validated['country'];
        $location->current_user_id = auth()->user()->id;
        
        $location->save();
        
        return session()->flash('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $title = __('label.view_location');
        return view('location.show',compact('title','location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $title = __('label.edit_location');
        $companies = Company::all();
        $users = Company::find($location->company_id)->company_users;
        return view('location.edit',compact('title','location','companies','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLocationRequest $request, Location $location)
    {
        $validated = $request->validated();

        $location = new Location;
        $location->company_id = $validated['company_id'];
        $location->location_name = $validated['location_name'];
        $location->email = $validated['email'];
        $location->phone = $validated['phone'];
        $location->fax_num = $validated['fax_num'];
        $location->location_head = $validated['location_head'];
        $location->address_1 = $validated['address_1'];
        $location->address_2 = $validated['address_2'];
        $location->city = $validated['city'];
        $location->state = $validated['state'];
        $location->zip_code = $validated['zip_code'];
        $location->country = $validated['country'];
        $location->current_user_id = auth()->user()->id;

        $location->save();
        
        return session()->flash('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
