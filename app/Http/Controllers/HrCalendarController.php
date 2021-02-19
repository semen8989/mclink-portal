<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Company;
use Illuminate\Http\Request;

class HrCalendarController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::all();
        if($request->ajax()){

            $data = Event::whereDate('start','>=',$request->start)
                        ->whereDate('end','<=',$request->end)
                        ->get(['id','title', 'start', 'end']);

            return response()->json($data);

        }
        return view('hr_calendar.index',compact('companies'));
    }

    public function ajax(Request $request)
    {
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'company_id' => $request->company_id,
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}
