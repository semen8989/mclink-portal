<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\DataTables\AnnouncementDataTable;
use App\Http\Requests\StoreAnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AnnouncementDataTable $dataTable)
    {
        $title = __('label.announcements');
        
        return $dataTable->render('announcement.index',compact('title'));
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
        
        $action = __('label.global.response.action.created');
        $message = __('label.global.response.success.general', ['module' => __('label.announcement'), 'action' => $action]);
        
        return session()->flash('success',$message);
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
        
        return view('announcement.show',compact('announcement','title'));
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
        $departments = Company::find($announcement->company_id)->departments;
        
        return view('announcement.edit',compact('announcement','companies','departments','title'));
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
        $announcement->update($request->all());
        $action = __('label.global.response.action.updated');
        $message = __('label.global.response.success.general', ['module' => __('label.announcement'), 'action' => $action]);
        
        return session()->flash('success',$message);
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

        $action = __('label.global.response.action.deleted');
        $message = __('label.global.response.success.general', ['module' => __('label.announcement'), 'action' => $action]);
        
        return redirect()->route('announcements.index')->with('success',$message);
    }
}
