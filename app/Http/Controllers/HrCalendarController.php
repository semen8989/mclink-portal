<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Event;
use App\Models\Company;
use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;

class HrCalendarController extends Controller
{
    public function index(Request $request)
    {
       $events = Event::all();
       $event = [];
        foreach($events as $row) {
            $end_date = $row->end_date."24:00:00";
            $event[] = \Calendar::event(
                $row->title, //event title
                true, //full day event?
                new DateTime($row->start_date), //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
                new DateTime($row->end_date), //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
                $row->id, //optional event ID
                [
                    'color' => $row->color
                ]
            );
        }
        $calendar = new Calendar();
            $calendar->addEvents($event)
            ->setOptions([
                'locale' => 'En',
                'firstDay' => 0,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'dayGridMonth',
                'headerToolbar' => [
                    'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
                ]
            ]);
            $calendar->setId('1');
            $calendar->setCallbacks([
                'select' => 'function(selectionInfo){
                    alert(FullCalendar.formatDate(selectionInfo.start))
                }',
                'eventClick' => 'function(event){
                    alert(FullCalendar.formatDate(event.event.start))
                }'
            ]);

        return view('hr_calendar.index', compact('calendar'));
    }

    public function store(Request $request)
    {
        
    }

}
