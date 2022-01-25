<?php

namespace App\Http\Controllers;


use App\Models\Handbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreHandbookRequest;

class HandbookController extends Controller
{
    public function indoctrinationIndex()
    {
        $title = 'Indoctrination';
        $data = [];
        $latestRecord = Handbook::where('type','=',1)->latest()->first();
        
        if($latestRecord){
            $files = Handbook::where([
                                ['id','!=',$latestRecord->id],
                                ['type','=',1],
                            ])
                            ->orderBy('id','DESC')
                            ->get();
            $data['latestRecord'] = $latestRecord;
            
            if($files->IsNotEmpty()){
                $data['files'] = $files;
            }
        }
        // return view('handbook.indoctrination',compact('files','latestRecord'));
        return view('handbook.indoctrination',compact('title','data'));
    }

    public function phHandbookIndex()
    {
        $title = 'PH Handbook';
        $data = [];
        $latestRecord = Handbook::where('type','=',2)->latest()->first();

        if($latestRecord){
            $files = Handbook::where([
                                ['id','!=',$latestRecord->id],
                                ['type','=',2],
                            ])
                            ->orderBy('id','DESC')
                            ->get();
            $data['latestRecord'] = $latestRecord;
            
            if($files->IsNotEmpty()){
                $data['files'] = $files;
            }
        }

        return view('handbook.ph_handbook',compact('title','data'));
    }

    public function chHandbookIndex()
    {
        $title = 'CH Handbook';
        $data = [];
        $latestRecord = Handbook::where('type','=',3)->latest()->first();

        if($latestRecord){
            $files = Handbook::where([
                                ['id','!=',$latestRecord->id],
                                ['type','=',3],
                            ])
                            ->orderBy('id','DESC')
                            ->get();
            $data['latestRecord'] = $latestRecord;
            
            if($files->IsNotEmpty()){
                $data['files'] = $files;
            }
        }

        return view('handbook.ch_handbook',compact('title','data'));
    }

    public function uploadHandbookIndex()
    {
        $title = 'Upload Handbook';

        return view('handbook.upload_handbook',compact('title'));
    }

    public function upload(StoreHandbookRequest $request)
    {
        if($request->hasFile('pdf_file')){
            
            switch($request['type']){

                case 1:
                    $folder = 'indoctrination';
                    break;
                case 2:
                    $folder = 'ph_handbook';
                    break;
                case 3:
                    $folder = 'ch_handbook';
                    break;
                default:
                    $folder = '';
        
            }
            
            $storagePath = Storage::putFile('handbook/'.$folder, $request->file('pdf_file'));
            $fileName = basename($storagePath);
            
            $upload = new Handbook;
            $upload->orig_filename = $request->file('pdf_file')->getClientOriginalName();
            $upload->file_name = $fileName;
            $upload->type = $request['type'];
            $upload->save();

            return session()->flash('success','Custom Files Uploaded Successfully');

        }
    }
}
