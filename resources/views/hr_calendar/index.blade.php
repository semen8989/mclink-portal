@extends('layout.master')

@section('content')
<div class="card-header">Hr Calendar</div>
<div class="card-body">
    <div class="col-md-12">
        {!! $calendar->calendar() !!}
    </div>
</div>
@stop

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('/plugin/fullcalendar-5.5.1/main.min.css') }}" />
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
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
            color: white;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('plugin/fullcalendar-5.5.1/main.min.js') }}"></script>
    {!! $calendar->script() !!}
@endpush
