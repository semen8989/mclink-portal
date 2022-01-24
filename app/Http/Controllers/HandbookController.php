<?php

namespace App\Http\Controllers;


use App\Models\Handbook;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class HandbookController extends Controller
{
    public function indoctrinationIndex()
    {
        // $latestRecord = Handbook::latest()->first();
        // $files = Handbook::where('id','!=',$latestRecord->id)->orderBy('id','DESC')->get();
        // return view('handbook.indoctrination',compact('files','latestRecord'));
        return view('handbook.indoctrination');
    }

    public function phHandbookIndex()
    {
        return view('handbook.ph_handbook');
    }

    public function chHandbookIndex()
    {
        return view('handbook.ch_handbook');
    }

    public function uploadHandbookIndex()
    {
        return view('handbook.upload_handbook');
    }

    public function upload(Request $request)
    {

        if($request->hasFile('pdf_file')){
            
            $storagePath = Storage::putFile('handbook', $request->file('pdf_file'));
            $fileName = basename($storagePath);
            
            $upload = new Handbook;
            $upload->orig_filename = $request->file('pdf_file')->getClientOriginalName();
            $upload->file_name = $fileName;
            $upload->type = $request['type'];
            $upload->save();

            return back()->with('success','Custom Files Uploaded Successfully');

        }
    }
}
