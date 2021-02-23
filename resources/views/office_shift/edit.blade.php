@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_shift') }}</div>
<form action="{{ route('office_shifts.update',$officeShift->id) }}" id="shift_form" method="post">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.company') }}</label>
                    <div class="col-md-4">
                        <select class="form-control" name="company_id" id="company_id">
                            <option value="" disabled selected>{{ __('label.choose') }}</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ $officeShift->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.shift_name') }}</label>
                    <div class="col-md-4">
                        <input class="form-control" name="shift_name" id="shift_name" type="text" value="{{ $officeShift->shift_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.monday') }}</label>
                    <div class="col-md-4">
                    <input class="form-control timepicker clear-1" placeholder="{{ __('label.in_time') }}" name="monday_in_time" id="monday_in_time" type="text" value="{{ $officeShift->monday_in_time }}">
                    </div>
                    <div class="col-md-4">
                    <input class="form-control timepicker clear-1" placeholder="{{ __('label.out_time') }}" name="monday_out_time" id="monday_out_time" type="text" value="{{ $officeShift->monday_out_time }}">
                    </div>
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="1">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.tuesday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-2" placeholder="{{ __('label.in_time') }}" name="tuesday_in_time" id="tuesday_in_time" type="text" value="{{ $officeShift->tuesday_in_time }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-2" placeholder="{{ __('label.out_time') }}" name="tuesday_out_time" id="tuesday_out_time" type="text" value="{{ $officeShift->tuesday_out_time }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="2">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.wednesday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-3" placeholder="{{ __('label.in_time') }}" name="wednesday_in_time" id="wednesday_in_time" type="text" value="{{ $officeShift->wednesday_in_time }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-3" placeholder="{{ __('label.out_time') }}" name="wednesday_out_time" id="wednesday_out_time" type="text" value="{{ $officeShift->wednesday_out_time }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="3">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.thursday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-4" placeholder="{{ __('label.in_time') }}" name="thursday_in_time" id="thursday_in_time" type="text" value="{{ $officeShift->thursday_in_time }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-4" placeholder="{{ __('label.out_time') }}" name="thursday_out_time" id="thursday_out_time" type="text" value="{{ $officeShift->thursday_out_time }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="4">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.friday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-5" placeholder="{{ __('label.in_time') }}" name="friday_in_time" id="friday_in_time" type="text" value="{{ $officeShift->friday_in_time }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-5" placeholder="{{ __('label.out_time') }}" name="friday_out_time" id="friday_out_time" type="text" value="{{ $officeShift->friday_out_time }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="5">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.saturday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-6" placeholder="{{ __('label.in_time') }}" name="saturday_in_time" id="saturday_in_time" type="text" value="{{ $officeShift->saturday_in_time }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-6" placeholder="{{ __('label.out_time') }}" name="saturday_out_time" id="saturday_out_time" type="text" value="{{ $officeShift->saturday_out_time }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="6">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.sunday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-7" placeholder="{{ __('label.in_time') }}" name="sunday_in_time" id="sunday_in_time" type="text" value="{{ $officeShift->sunday_in_time }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-7" placeholder="{{ __('label.out_time') }}" name="sunday_out_time" id="sunday_out_time" type="text" value="{{ $officeShift->sunday_out_time }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="7">{{ __('label.clear') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
@stop

@push('stylesheets')
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datetimepicker js dependency -->
    <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            //Datetimepicker
            $('.timepicker').datetimepicker({
                ignoreReadonly: true,
                format: 'HH:mm',
                widgetPositioning: {
                    vertical: 'bottom'
                }
            });
            //CLear time value fields
            $(".clear-time").click(function(){
                var clear_id  = $(this).data('clear-id');
                $(".clear-"+clear_id).val('');
            });
            //Shift form
            $('#shift_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("office_shifts.index") }}';
                    },
                    error: function(response){
                        //Clear previous error messages
                        $(".invalid-feedback").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            id.after('<div class="invalid-feedback">'+value+'</div>');
                        });
                        
                    }
                })
            })
        })
    </script>
@endpush