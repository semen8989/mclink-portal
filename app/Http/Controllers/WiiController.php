<?php

namespace App\Http\Controllers;

use App\Models\Wii;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWiiRequest;

class WiiController extends Controller
{
    public function create()
    {
        return view('wii.create');
    }

    public function store(StoreWiiRequest $request)
    {
        $request['user_id'] = auth()->user()->id;

        $store = Wii::create($request->all());

        if($store){
            return session()->flash('success','Wii Submitted');
        }

    }
}
