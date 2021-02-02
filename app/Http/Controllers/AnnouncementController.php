<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Models\Announcement;
use App\Models\Company;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcement.index',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('announcement.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnouncementRequest $request)
    {
        Announcement::create($request->all());
        //Redirect after success
        return redirect()->route('announcement.index')->with('success', 'Announcement created successfully.');

    }

    public function fetch_department(Request $request)
    {
        $value = $request->get('value');
        $data = Company::find($value)->departments;
        $output = '<option value="" disabled selected>Select Department</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->department_name.'</option>';
        }
        echo $output;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);
        return view('announcement.view',compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        $companies = Company::all();
        return view('announcement.edit',compact('announcement','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnnouncementRequest $request, $id)
    {
        Announcement::whereId($id)->update($request->except(['_token','_method']));

        return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully.');
    }
}
