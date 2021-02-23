<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Company;
use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;

class HrCalendarController extends Controller
{
    public function index(Request $request)
    {
        $events = [];
        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2021-02-11T0800', //start time (you can also use Carbon instead of DateTime)
            '2021-02-12T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );

        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2021-02-14'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2021-02-14'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );
        $calendar = new Calendar();
                    $calendar->addEvents($events)
                    ->setOptions([
                        'locale' => 'En',
                        'firstDay' => 0,
                        'displayEventTime' => true,
                        'selectable' => true,
                        'initialView' => 'timeGridWeek',
                        'headerToolbar' => [
                            'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
                        ]
                    ]);
                    $calendar->setId('1');
                    $calendar->setCallbacks([
                        'select' => 'function(selectionInfo){}',
                        'eventClick' => 'function(event){}'
                    ]);
        return view('hr_calendar.index',compact('calendar'));
    }

}
