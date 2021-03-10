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
                        var id = arg.event.id;
                        var unq_id = arg.event.extendedProps.unq_id;
                        var url;

                        if(unq_id == 1){
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
                        
                        
                    },
                   
                    
                },
            );
            calendar.render();

            $('div.modal').on('shown.bs.modal', function (e) {
                resetForm();

                $('#calendar .popover').remove();

                var date = $('#exact_date').val();

                $(this).find('input[name="start_date"]').val(date);
                $(this).find('input[name="end_date"]').val(date);

                modal = $(this).attr('id');
                form = $(this).find('form').attr('id');

                $('#'+form).off().submit(function (e){

                    var url = $(this).attr('action');
                    var method = $(this).attr('method');
                    var data = $(this).serialize();

                    $.ajax({
                        url: url,
                        data: data,
                        method: method,
                        encode: true,
                        success: function(data){
                            window.location.reload();
                        },
                        error: function(response){
                            $('#'+modal).animate({ scrollTop: 45 }, 'smooth');

                            $('#'+form).find(".invalid-feedback").remove();
                            $('#'+form).find( ".form-control" ).removeClass("is-invalid");
                            
                            var errors = response.responseJSON;
                            
                            $.each(errors.errors, function (index, value){
                                var name = $('#'+form).find('[name="'+index+'"]');
                                name.closest('.form-control')
                                .addClass('is-invalid');
                                
                                if(name.next('.select2-container').length > 0){
                                    name.next('.select2-container').after('<div class="invalid-feedback d-block">'+value+'</div>');
                                }else{
                                    name.after('<div class="invalid-feedback d-block">'+value+'</div>');
                                }

                            });
                        }
                    })
                    
                    e.preventDefault();
                });
            })
            //Function
            function resetForm(){
                $('#'+form).find(".invalid-feedback").remove();
                $('#'+form).find( ".form-control" ).removeClass("is-invalid");
                $('#'+form).trigger("reset");
            }
            //Datetimepicker
           $('.date').datetimepicker({
                ignoreReadonly: true,
                format: 'YYYY-MM-DD',
                widgetPositioning: {
                    vertical: 'bottom'
                }
            });
            //TinyMCE
            tinymce.init({
                selector: 'textarea.tinymce-editor',
                height: 200,
                menubar: false,
                plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
            //Select2
            $('.select2').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            
        });
    </script>
@endpush
