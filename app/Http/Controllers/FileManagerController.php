<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFileManagerRequest;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'File Manager';

        return view('file_manager.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Upload File';
        $departments = Department::all();
        $categories = File::CATEGORY;

        return view('file_manager.create',compact('title','departments','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileManagerRequest $request)
    {
        if($request->hasFile('file')){

            $extension = $request->file('file')->getClientOriginalExtension();
            $size = $request->file('file')->getSize();
            $name = $request->file('file')->getClientOriginalName();

            $fileName = date('Y-m-d').'_'.time().'_'.$request->file('file')->getClientOriginalName();

            $request->file('file')->storeAs('file_manager',$fileName);

        }

        $file = new File;
        $file->orig_filename = $name;
        $file->file_name = $fileName;
        $file->size = $size;
        $file->extension = $extension;
        $file->department_id = $request['department_id'];
        $file->category_id = $request['category_id'];
        $file->save();

        return session()->flash('success','File Uploaded Successfully!');
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
