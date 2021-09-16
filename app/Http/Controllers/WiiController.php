<?php

namespace App\Http\Controllers;

use App\Models\Wii;
use Illuminate\Http\Request;
use App\DataTables\MyWiiDataTable;
use App\Http\Requests\StoreWiiRequest;

class WiiController extends Controller
{
    public function create()
    {
        $title = 'Submit Wii';
        
        return view('wii.create',compact('title'));
    }

    public function store(StoreWiiRequest $request)
    {
        $request['user_id'] = auth()->user()->id;

        $store = Wii::create($request->all());

        if($store){
            return session()->flash('success','Wii Submitted');
        }

    }

    public function myWiiIndex(MyWiiDataTable $dataTable)
    {
        $title = 'My Wii';

        return $dataTable->render('wii.my_wii.index',compact('title'));
    }
}
