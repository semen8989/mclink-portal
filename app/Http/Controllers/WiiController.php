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

    public function show(Wii $wii)
    {   
        $status = ucwords(array_search($wii->status, Wii::STATUS));
        $index = $wii->status;
        $statusArray = Wii::STATUS;
        
        if($index == 0){
            $badgeColor = 'dark';
        }else if($index == 1){
            $badgeColor = 'success';
        }else if($index == 2){
            $badgeColor = 'danger';
        }else if($index == 3){
            $badgeColor = 'warning';
        }

        return view('wii.show',compact('wii','status','statusArray','badgeColor'));
    }

    public function update(Request $request, Wii $wii)
    {
        $wii->remarks = $request->remarks;
        $wii->status = $request->status;

        if($request->incentive_payment !=  null){
            $wii->incentive_payment = $request->incentive_payment;
        }
        
        if($wii->save()){
            return back()->with('success', 'Wii Updated Successfully!');
        }

    }

    public function delete(Wii $wii)
    {
        
    }

    public function myWiiIndex(MyWiiDataTable $dataTable)
    {
        $title = 'My Wii';

        return $dataTable->render('wii.my_wii.index',compact('title'));
    }
}
