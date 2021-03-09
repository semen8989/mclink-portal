@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div class="col-md-12">
        <div id="calendar"></div>
    </div>
</div>
<!-- Popover Content -->
<div id="popover-content" style="display: none">
    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#createEvent_modal">Events</a>
    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#createHoliday_modal">Holidays</a>
</div>
<!-- Input hidden exact date -->
<input type="hidden" name="exact_date" id="exact_date">
<!-- Create modals -->
@include('components.hr-calendar.create_modal')
<!-- View modals -->
@include('components.hr-calendar.show_modal')
@stop

@push('stylesheet')
    <!-- Fullcalendar 5 CSS Dependency-->
    <link rel="stylesheet" href="{{ asset('/plugin/fullcalendar-5.5.1/main.min.css') }}" />
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
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
    <!-- Fullcalendar 5 JS Dependency-->
    <script src="{{ asset('plugin/fullcalendar-5.5.1/main.min.js') }}"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_API') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Datetimepicker js dependency -->
    <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        //Global Variables
        var calendar;
        var form;
        // A $( document ).ready() block.
        $(document).ready(function(){
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
                    displayEventTime:false,
                    allDaySlot: true,
                    selectable:true,
                    initialView:"dayGridMonth",
                    headerToolbar:{
                        end:"today prev,next dayGridMonth timeGridWeek timeGridDay"
                    },
                    eventSources: [
                        {
                            url: '{{ route("hr_calendar.fetch_events") }}', //unq_id = 1
                            color: '#355C7D'
                        },
                        {
                            url: '{{ route("hr_calendar.fetch_holidays") }}', //unq_id = 2
                            color: '#2D95BF'
                        }
                    ],
                    eventClick: function (arg){
                        //id and unq_id for fetching clicked event
                        id = arg.event.id;
                        unq_id = arg.event.extendedProps.unq_id;
                        var url;
                        //Fetch event info based on unq_id assigned in every modules.
                        if(unq_id == 1)
                        {
                            url = '{{ route("hr_calendar.view_event",":id") }}'
                            url = url.replace(':id',id)
                        }
                        else if(unq_id == 2)
                        {
                            url = '{{ route("hr_calendar.view_holiday",":id") }}'
                            url = url.replace(':id',id)
                        }
                        //Submit using AJAX
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(data){
                                $('#view_data').empty();
                                $('#view_data').append(data.html);
                                $('#modal_title').text(data.title);
                                $('#view_modal').modal('show');
                            }
                        });
    
                    },
                    dateClick: function(dateInfo){
                        $('#exact_date').val(dateInfo.dateStr);
                        $(dateInfo.dayEl).popover({
                            html: true,
                            trigger: 'click',
                            title: 'Add Option',
                            sanitize: false,
                            container: '#calendar',
                            content: function() {
                                // Remove previous popover
                                $('#calendar .popover').remove();
                                //                   ^^^^^
                                return $("#popover-content").html();
                            }
                        })
                        $(dateInfo.dayEl).popover('show');
                        $('#exact_date').val(dateInfo.dateStr);
                    },
                   
                    
                },
            );
            calendar.render();

            $('div.modal').on('shown.bs.modal', function (e) {
                // Remove previous popover
                $('#calendar .popover').remove();
                //Initialize chosen date
                var date = $('#exact_date').val();
                //Fill start and end date fields on shown modal
                $(this).find('input[id="start_date"]').val(date);
                $(this).find('input[id="end_date"]').val(date);
                //Initialize modal id and form id
                modal = $(this).attr('id');
                form = $(this).find('form').attr('id');
                //Submit form
                $('#'+form).submit(function (e){
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
                                //Alert
                                alert(data.message);
                                //remove any form data
                                $('#'+form).trigger("reset");
                                //close modal
                                $('#'+modal).modal('hide');
                                $('#'+modal).trigger('click');
                                //refetch events
                                calendar.refetchEvents();
                            }else if(data.success == false){
                                //Alert
                                alert(data.message);
                            }
                        }
                    })
                });
            })

        });
    </script>
@endpush
