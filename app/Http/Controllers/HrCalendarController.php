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
        return view('hr_calendar.index',['events' => json_encode($data)]);
    }
    
}
