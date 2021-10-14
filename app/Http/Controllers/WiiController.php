<?php

namespace App\Http\Controllers;

use App\Models\Wii;
use App\Models\User;
use App\Mail\WiiRequestSent;
use Illuminate\Http\Request;
use App\DataTables\MyWiiDataTable;
use App\DataTables\AllWiiDataTable;
use Illuminate\Support\Facades\Mail;
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
        $mngmtEmail = User::find(1);

        $wii = new Wii;
        $wii->purpose = $request['purpose'];
        $wii->problem = $request['problem'];
        $wii->solution = $request['solution'];
        $wii->user_id =  auth()->user()->id;
        $wii->save();

        Mail::to($mngmtEmail->email)
            ->queue(new WiiRequestSent($wii));

        return session()->flash('success','Wii Submitted');
        

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

    public function edit(Wii $wii)
    {
        $title = 'Update Wii';
        
        return view('wii.my_wii.edit',compact('title','wii'));
    }

    public function updateStatus(Request $request, Wii $wii)
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

    public function update(StoreWiiRequest $request, Wii $wii)
    {
        $wii->purpose = $request['purpose'];
        $wii->problem = $request['problem'];
        $wii->solution = $request['solution'];
        
        if($wii->save()){
            return session()->flash('success', 'Wii Updated Successfully!');
        }


    }

    public function destroy(Wii $wii)
    {
        if($wii->delete()){
            return redirect()->route('wii.my_wii')->with('success','Wii deleted succssfully');
        }
    }

    public function myWiiIndex(MyWiiDataTable $dataTable)
    {
        $title = 'My Wii';

        return $dataTable->render('wii.my_wii.index',compact('title'));
    }

    public function allWiiIndex(AllWiiDataTable $dataTable)
    {
        if(auth()->user()->id == 1){
            
            $title = 'All Wii';
            
            return $dataTable->render('wii.all_wii.index',compact('title'));
        
        }else{
            abort(403);
        }
        
    }
    
}
