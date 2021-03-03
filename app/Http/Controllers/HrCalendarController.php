<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Event;
use App\Models\Company;
use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;

class HrCalendarController extends Controller
{
    public function index()
    {
        $data = [];
        $result = Event::all();
        foreach($result as $row) {
            $data[] = [
                'id' => $row->id,
                'title' => $row->title,
                'start' => $row->start_date,
                'end' => $row->end_date,
                'color' => $row->color,
            ];
        }
        $companies = Company::all('id','company_name');
        return view('hr_calendar.index',compact('companies'));
    }

    public function fetch_events(){
        $data = [];
        $result = Event::all();
        foreach($result as $row) {
            $data[] = [
                'id' => $row->id,
                'title' => $row->title,
                'start' => $row->start_date,
                'end' => $row->end_date,
                'color' => $row->color,
            ];
        }

        echo json_encode($data);
    }
    
    public function store_event(Request $request)
    {
        $insert = [
            'company_id' => $request->company_id,
            'title'      => $request->title,
            'color'      => '#355C7D',
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date'   => date('Y-m-d', strtotime($request->end_date)),
            'note'       => $request->note
        ];
        $create = Event::create($insert);
        if($create){
            $data['success'] = true;
            $data['message'] = "Event created successfully";
        }else{
            $data['success'] = false;
            $data['message'] = "Error while creating successfully";
        }

        echo json_encode($data);
    }

}
