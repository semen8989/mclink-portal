@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div id="calendar">

    </div>
</div>
@stop

@push('stylesheets')
<link rel="stylesheet" href="{{ asset('plugin/fullcalendar/fullcalendar.min.css') }}" />
@endpush

@push('scripts')
<script src="{{ asset('plugin/fullcalendar/fullcalendar.min.js') }}"></script>    
<script>
    $(document).ready(function (){

        var calendar = $('#calendar').fullCalendar({
            editable: true,
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