@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div class="col-md-12">
        <div id="calendar-1"></div>
    </div>
</div>
@stop

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('/plugin/fullcalendar-5.5.1/main.min.css') }}" />
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('plugin/fullcalendar-5.5.1/main.min.js') }}"></script>
    <script>
        var calendar;
        $(document).ready(function(){
            var calendarEl = document.getElementById('calendar-1')
            calendar = new FullCalendar.Calendar(calendarEl,{
                    header:{
                        left:"prev,next today",
                        center:"title",
                        right:"month,agendaWeek,agendaDay"
                    },
                    eventLimit:true,
                    locale:"En",
                    firstDay:0,
                    displayEventTime:true,
                    selectable:true,
                    initialView:"dayGridMonth",
                    headerToolbar:{
                        end:"today prev,next dayGridMonth timeGridWeek timeGridDay"
                    },
                    events: {!! $events !!},
                    select:function(selectionInfo){
                        alert(FullCalendar.formatDate(selectionInfo.start))
                    },
                    eventClick:function(event){
                        alert(event.event.title)
                    }
                },
            );
            calendar.render();
        });
    </script>
@endpush
