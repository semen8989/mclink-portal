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
        $title = __('label.announcement');
        $announcements = Announcement::all();
        return view('announcement.index',compact('announcements','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_announcement');
        $companies = Company::all();
        return view('announcement.create',compact('companies','title'));
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
        echo json_encode($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $title = __('label.view_announcement');
        return view('announcement.view',compact('announcement','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $title = __('label.edit_announcement');
        $companies = Company::all();
        return view('announcement.edit',compact('announcement','companies','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnnouncementRequest $request, Announcement $announcement)
    {
        $announcement->update($request->except(['_token','_method']));
        return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully.');
    }
}
