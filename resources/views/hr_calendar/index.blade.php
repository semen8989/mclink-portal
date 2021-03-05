@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div class="col-md-12">
        <div id="calendar"></div>
    </div>
</div>
<!-- Create modals -->
@include('components.hr-calendar.create_modal')
<!-- View modals -->
@include('components.hr-calendar.show_modal')
<!-- Popover Content -->
<div id="popover-content" style="display: none">
    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#createEvent_modal">Events</a>
    <a class="btn btn-sm btn-info">Holidays</a>
</div>

@stop

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('/plugin/fullcalendar-5.5.1/main.min.css') }}" />
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom style -->
    <style>
        .fc-view{
            cursor: pointer;
        }
        .popover{
            width: 200px;
        }

        .popover-body .btn{
            display: block;
            color: #ffffff;
            font-weight: bold;
            text-align: left !important;
            margin-bottom: 5px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('plugin/fullcalendar-5.5.1/main.min.js') }}"></script>
    <script>
        var calendar;
        document.addEventListener('DOMContentLoaded',function(){
            var calendarEl = document.getElementById('calendar')
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
                    eventSources: [
                        {
                            url: '{{ route("hr_calendar.fetch_events") }}', 
                            color: '#355C7D',
                        },
                        {
                            url: '{{ route("hr_calendar.fetch_holidays") }}', 
                            color: '#2D95BF',
                        }
                    ],
                    eventClick:function(arg){
                        var id = arg.event.id;
                        var url = '{{ route("hr_calendar.view_event",":id") }}';
                        url = url.replace(':id',id);
                        $.ajax({
                            url: url,
                            type:"POST",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(data) {
                                    $('#view_company').val(data.company);
                                    $('#view_title').val(data.title);
                                    $('#view_start_date').val(data.start);
                                    $('#view_end_date').val(data.end);
                                    $('#view_note').val(data.note);
                                    $('#viewEvent_modal').modal('show');
                                }
                        });

                    },
                    dateClick: function(dateInfo){
                        $("#popover-content").removeAttr("style");
                        $(dateInfo.dayEl).popover({
                            html: true,
                            trigger: 'click',
                            title: 'Add Option',
                            container: '#calendar',
                            content: function() {
                                // for each opened popover...hide it
                                $("#calendar .popover.show").popover('hide');
                                //                   ^^^^^
                                return $("#popover-content");
                            }
                        })
                        $(dateInfo.dayEl).popover('toggle');
                    }
                    
                },
            );
            calendar.render();

            $('#createEvent_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    dataType: 'json',
                    encode: true,
                    success: function(data){
                        if(data.success == true){
                            //remove any form data
                            $('#createEvent_form').trigger("reset");
                            //close model
                            $('#createEvent_modal').modal('hide');
                            //Alert
                            alert(data.message);
                            //refetch events
                            calendar.refetchEvents();
                        }else if(data.success == false){
                            //Alert
                            alert(data.message);
                        }
                    }
                })
            });

            $('body').on('shown.bs.modal', function (e) {
                // for each opened popover...hide it
                $("#calendar .popover.show").hide();
            })
        });

    </script>
@endpush
