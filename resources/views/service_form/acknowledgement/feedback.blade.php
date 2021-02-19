@extends('layout.guest.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="clearfix text-center">            
                <h3 class="mb-4">{{ __('label.service_report.page_text.feedback_header') }}</h3>
                <p class="text-muted">
                    {!! __('label.service_report.page_text.feedback_body', ['customer' => session('serviceReport') ? session('serviceReport')->customer->name : '']) !!}
                </p>
            </div>
        </div>
    </div>
@stop