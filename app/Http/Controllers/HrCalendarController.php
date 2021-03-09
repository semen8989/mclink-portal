<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Event;
use App\Models\Company;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;

class HrCalendarController extends Controller
{
    public function index()
    {
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
                'unq_id' => 1
            ];
        }

        echo json_encode($data);
    }
    
    public function store_event(Request $request)
    {
        $insert = [
            'company_id' => $request->company_id,
            'title'      => $request->title,
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
            $data['message'] = "Error while creating event";
        }

        echo json_encode($data);
    }

    public function view_event(Event $event){
        $title = __('label.view_event');
        $html  = '';
        $html .= '<tr>';
        $html .= '<th>Company</th>';
        $html .= '<td>'.$event->company->company_name.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>Title</th>';
        $html .= '<td>'.$event->title.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>Start Date</th>';
        $html .= '<td>'.$event->start_date.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>End Date</th>';
        $html .= '<td>'.$event->end_date.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>Note</th>';
        $html .= '<td>'.$event->note.'</td>';
        $html .= '</tr>';

        $data = array(
            'html' => $html,
            'title' => $title
        );

        echo json_encode($data);
    }
    //Holidays
    public function fetch_holidays(){
        $data = [];
        $result = Holiday::all();
        foreach($result as $row) {
            $data[] = [
                'id' => $row->id,
                'title' => $row->event_name,
                'start' => date('Y-m-d', strtotime($row->start_date)),
                'end' => date('Y-m-d', strtotime($row->end_date)),
                'unq_id' => 2
            ];
        }

        echo json_encode($data);
    }

    public function store_holiday(Request $request)
    {
        $insert = [
            'company_id'  => $request->company_id,
            'event_name'  => $request->event_name,
            'start_date'  => date('Y-m-d', strtotime($request->start_date)),
            'end_date'    => date('Y-m-d', strtotime($request->end_date)),
            'description' => $request->description,
            'status'      => $request->status
        ];
        $create = Holiday::create($insert);
        if($create){
            $data['success'] = true;
            $data['message'] = "Holiday created successfully";
        }else{
            $data['success'] = false;
            $data['message'] = "Error while creating holiday";
        }

        echo json_encode($data);
    }



}
