<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Event;
use App\Models\Company;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\StoreHolidayRequest;

class HrCalendarController extends Controller
{
    public function index()
    {
        $companies = Company::all('id','company_name');
        return view('hr_calendar.index',compact('companies'));
    }

    public function fetch_events()
    {
        $data = [];
        $result = Event::all();
        foreach($result as $row) {
            $data[] = [
                'id' => $row->id,
                'title' => $row->title,
                'start' => $row->start_date,
                'end' => $row->end_date == $row->start_date ? $row->end_date : $row->end_date." 23:59:00",
                'unq_id' => 1
            ];
        }

        echo json_encode($data);
    }
    
    public function store_event(StoreEventRequest $request)
    {
        $insert = [
            'company_id' => $request->company_id,
            'title'      => $request->title,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
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

    public function view_event(Event $event)
    {
        $title = __('label.view_event');
        $html  = '';
        $html .= '<tr>';
        $html .= '<th>'.__('label.company').'</th>';
        $html .= '<td>'.$event->company->company_name.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.title').'</th>';
        $html .= '<td>'.$event->title.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.start_date').'</th>';
        $html .= '<td>'.$event->start_date.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.end_date').'</th>';
        $html .= '<td>'.$event->end_date.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.note').'</th>';
        $html .= '<td>'.$event->note.'</td>';
        $html .= '</tr>';

        $data = array(
            'html' => $html,
            'title' => $title
        );

        echo json_encode($data);
    }
    //Holidays
    public function fetch_holidays()
    {
        $data = [];
        $result = Holiday::all();
        foreach($result as $row) {
            $data[] = [
                'id' => $row->id,
                'title' => $row->event_name,
                'start' => $row->start_date,
                'end' => $row->end_date == $row->start_date ? $row->end_date : $row->end_date." 23:59:00",
                'unq_id' => 2
            ];
        }

        echo json_encode($data);
    }

    public function store_holiday(StoreHolidayRequest $request)
    {
        $insert = [
            'company_id'  => $request->company_id,
            'event_name'  => $request->event_name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
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

    public function view_holiday(Holiday $holiday)
    {
        $title = __('label.view_holiday');
        $html  = '';
        $html .= '<tr>';
        $html .= '<th>'.__('label.company').'</th>';
        $html .= '<td>'.$holiday->company->company_name.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.event_name').'</th>';
        $html .= '<td>'.$holiday->event_name.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.start_date').'</th>';
        $html .= '<td>'.$holiday->start_date.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.end_date').'</th>';
        $html .= '<td>'.$holiday->end_date.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.description').'</th>';
        $html .= '<td>'.$holiday->description.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>'.__('label.status').'</th>';
        $html .= '<td>'.ucfirst($holiday->status).'</td>';
        $html .= '</tr>';

        $data = array(
            'html' => $html,
            'title' => $title
        );

        echo json_encode($data);
    }



}
