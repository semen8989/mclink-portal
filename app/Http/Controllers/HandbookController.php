<?php

namespace App\Http\Controllers;

use App\Models\Handbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HandbookController extends Controller
{
    public function index()
    {
        $latestRecord = Handbook::latest()->first();
        $files = Handbook::where('id','!=',$latestRecord->id)->orderBy('id','DESC')->get();
        return view('handbook.index',compact('files','latestRecord'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')){
            $storagePath = Storage::putFile('handbook', $request->file('upload'));
            $fileName = basename($storagePath);
            
            $upload = new Handbook;
            $upload->orig_filename = 'MCA Indoctrination Version 2022';
            $upload->file_name = $fileName;
            $upload->save();

            return back()->with('success','Custom Files Uploaded Successfully');

        }
    }
}
