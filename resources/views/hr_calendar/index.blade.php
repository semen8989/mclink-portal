@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div class="col-md-12">
        <div id="calendar-1"></div>
    </div>
</div>
<!-- Create event modal -->
<div class="modal fade" id="createEvent_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="createEvent_form" action="{{ route('hr_calendar.store_event') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_id" class="col-form-label">Company ID</label>
                    <select class="form-control" name="company_id" id="company_id">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title"></input>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_date">Start Date</label>
                        <input type="text" class="form-control" name="start_date" id="start_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_date">End Date</label>
                        <input type="text" class="form-control" name="end_date" id="end_date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="note">Event Note</label>
                        <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
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
                    events: "{{ route('hr_calendar.fetch_events') }}",
                    select:function(selectionInfo){
                        $('#createEvent_modal').modal('show');
                        $('#start_date').val(FullCalendar.formatDate(selectionInfo.start));
                        $('#end_date').val(FullCalendar.formatDate(selectionInfo.end));
                    },
                    eventClick:function(event){
                        alert(event.event.title);
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
        });
         // so your code will be
         $('#createEvent_modal').on('hidden.bs.modal', function () {
            
        });

    </script>
@endpush
