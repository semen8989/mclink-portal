@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div id="external-events">
                <div id="external-events-listing" class="fc-events-container">
                    <div class="fc-event" data-color="#2D95BF"
                        style="background-color: rgb(45, 149, 191); border-color: rgb(45, 149, 191);">Holidays</div>
                    <div class="fc-event" data-color="#48CFAE"
                        style="background-color: rgb(72, 207, 174); border-color: rgb(72, 207, 174);">Leave Request
                    </div>
                    <div class="fc-event" data-color="#50C1E9"
                        style="background-color: rgb(80, 193, 233); border-color: rgb(80, 193, 233);">Travel Request
                    </div>
                    <div class="fc-event" data-color="#FB6E52"
                        style="background-color: rgb(251, 110, 82); border-color: rgb(251, 110, 82);">Upcoming Birthday
                    </div>
                    <div class="fc-event" data-color="#ED5564"
                        style="background-color: rgb(237, 85, 100); border-color: rgb(237, 85, 100);">Trainings</div>
                    <div class="fc-event" data-color="#355C7D"
                        style="background-color: rgb(53, 92, 125); border-color: rgb(53, 92, 125);">Events</div>
                    <div class="fc-event" data-color="#547A8B"
                        style="background-color: rgb(84, 122, 139); border-color: rgb(84, 122, 139);">Meetings</div>
                    <div class="fc-event" data-color="#3EACAB"
                        style="background-color: rgb(62, 172, 171); border-color: rgb(62, 172, 171);">Goals</div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div id="calendar"></div>
        </div>
    </div>
</div>
<!-- Calendar Modal -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Event Title">
                </div>
                <div class="form-group">
                    <label for="start">Start Date</label>
                    <input type="text" name="start" id="start" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="start">End Date</label>
                    <input type="text" name="end" id="end" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="submit" id="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- View Calendar Info Modal -->
<div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Event Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong><label for="title">Title</label></strong>
                    <input type="text" name="title_view" id="title_view" class="form-control-plaintext" readonly>
                </div>
                <div class="form-group">
                    <strong><label for="start">Start Date</label></strong>
                    <input type="text" name="start_view" id="start_view" class="form-control-plaintext" readonly>
                </div>
                <div class="form-group">
                    <strong><label for="start">End Date</label></strong>
                    <input type="text" name="end_view" id="end_view" class="form-control-plaintext" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop

@push('stylesheets')
<link rel="stylesheet" href="{{ asset('plugin/fullcalendar/main.min.css') }}" />
<style>
    #external-events {
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
    $(document).ready(function () {
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
            //When u select some space in the calendar do the following:
            select: function (start, end, allDay) {
                $('#start').val($.fullCalendar.formatDate(start, "Y-MM-DD"));
                $('#end').val($.fullCalendar.formatDate(end, "Y-MM-DD"));
                $('#createEventModal').modal('show');
            },
            //When u drop an event in the calendar do the following:
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
            //When u click an event in the calendar do the following:
            eventClick: function (event) {
                $('#title_view').val(event.title);
                $('#start_view').val($.fullCalendar.formatDate(event.start, "Y-MM-DD"));
                $('#end_view').val($.fullCalendar.formatDate(event.end, "Y-MM-DD"));
                $('#viewEventModal').modal('show');
            }
        });

        $('#submit').on('click', function(e){
            //Initialize variables
            var start = $('#start').val();
            var end = $('#end').val();
            var title = $('#title').val();
            //We don't want this to act as a link so cancel the link action
            e.preventDefault();
            //Hide the modal
            $("#createEventModal").modal('hide');
            //Submit via ajax
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
                            end: end
                        },true);
                    calendar.fullCalendar('unselect');
                }
            });
        });


        function displayMessage(message) {
            alert(message);
        } 
    });

</script>
@endpush
