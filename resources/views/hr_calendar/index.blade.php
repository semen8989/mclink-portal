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

        })
    })
</script>
@endpush