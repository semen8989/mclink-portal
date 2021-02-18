@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div id="external-events">
                <div id="external-events-listing" class="fc-events-container">
                    <div class="fc-event" data-color="#2D95BF" style="background-color: rgb(45, 149, 191); border-color: rgb(45, 149, 191);">Holidays</div>
                    <div class="fc-event" data-color="#48CFAE" style="background-color: rgb(72, 207, 174); border-color: rgb(72, 207, 174);">Leave Request</div>
                    <div class="fc-event" data-color="#50C1E9" style="background-color: rgb(80, 193, 233); border-color: rgb(80, 193, 233);">Travel Request</div>
                    <div class="fc-event" data-color="#FB6E52" style="background-color: rgb(251, 110, 82); border-color: rgb(251, 110, 82);">Upcoming Birthday</div>
                    <div class="fc-event" data-color="#ED5564" style="background-color: rgb(237, 85, 100); border-color: rgb(237, 85, 100);">Trainings</div>
                    <div class="fc-event" data-color="#355C7D" style="background-color: rgb(53, 92, 125); border-color: rgb(53, 92, 125);">Events</div>
                    <div class="fc-event" data-color="#547A8B" style="background-color: rgb(84, 122, 139); border-color: rgb(84, 122, 139);">Meetings</div>
                    <div class="fc-event" data-color="#3EACAB" style="background-color: rgb(62, 172, 171); border-color: rgb(62, 172, 171);">Goals</div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div id="calendar"></div>
        </div>
    </div>
</div>
@stop

@push('stylesheets')
<link rel="stylesheet" href="{{ asset('plugin/fullcalendar/main.min.css') }}" />
<style>
    #external-events{
        width: 240px;
        padding: 0 10px;
        border: 1px solid #ccc;
        background: #eee;
        text-align: left;
    }
    
    #external-events .fc-event {
        margin: 10px 0;
        padding: 2px !important;
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('plugin/fullcalendar/main.min.js') }}"></script>    
<script>
    $(document).ready(function (){
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek'
            },
            events: '{{ route("hr_calendar") }}',
            displayEventTime: false,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                        event.allDay = true;
                } else {
                        event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    $.ajax({
                        url: '{{ route("hr_calendar.ajax") }}',
                        data: {
                            _token: "{{ csrf_token() }}",
                            title: title,
                            start: start,
                            end: end,
                            type: 'add'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Event Created Successfully");
                            calendar.fullCalendar('renderEvent',
                                {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                },true);

                            calendar.fullCalendar('unselect');
                        }
                    });
                }
            },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                $.ajax({
                    url: '{{ route("hr_calendar.ajax") }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        title: event.title,
                        start: start,
                        end: end,
                        id: event.id,
                        type: 'update'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event Updated Successfully");
                    }
                });
            },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: '{{ route("hr_calendar.ajax") }}',
                        data: {
                                _token: "{{ csrf_token() }}",
                                id: event.id,
                                type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event Deleted Successfully");
                        }
                    });
                }
            }
        })
    });

    function displayMessage(message) {
        alert(message);
    } 
</script>
@endpush