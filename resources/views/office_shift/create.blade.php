@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_shift') }}</div>
<form action="{{ route('office-shifts.store') }}" id="shift_form" method="post" autocomplete="off">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.company') }}</label>
                    <div class="col-md-4">
                        <select class="form-control custom-select" name="company_id" id="company_id">
                            <option></option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.shift_name') }}</label>
                    <div class="col-md-4">
                        <input class="form-control" name="shift_name" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.monday') }}</label>
                    <div class="col-md-4">
                    <input class="form-control timepicker clear-1" placeholder="{{ __('label.in_time') }}" name="monday_in_time" type="text">
                    </div>
                    <div class="col-md-4">
                    <input class="form-control timepicker clear-1" placeholder="{{ __('label.out_time') }}" name="monday_out_time" type="text">
                    </div>
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="1">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.tuesday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-2" placeholder="{{ __('label.in_time') }}" name="tuesday_in_time" type="text">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-2" placeholder="{{ __('label.out_time') }}" name="tuesday_out_time" type="text">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="2">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.wednesday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-3" placeholder="{{ __('label.in_time') }}" name="wednesday_in_time" type="text">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-3" placeholder="{{ __('label.out_time') }}" name="wednesday_out_time" type="text">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="3">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.thursday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-4" placeholder="{{ __('label.in_time') }}" name="thursday_in_time" type="text">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-4" placeholder="{{ __('label.out_time') }}" name="thursday_out_time" type="text">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="4">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.friday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-5" placeholder="{{ __('label.in_time') }}" name="friday_in_time" type="text">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-5" placeholder="{{ __('label.out_time') }}" name="friday_out_time" type="text">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="5">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.saturday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-6" placeholder="{{ __('label.in_time') }}" name="saturday_in_time" type="text">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-6" placeholder="{{ __('label.out_time') }}" name="saturday_out_time" type="text">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="6">{{ __('label.clear') }}</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">{{ __('label.sunday') }}</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-7" placeholder="{{ __('label.in_time') }}" name="sunday_in_time" type="text">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-7" placeholder="{{ __('label.out_time') }}" name="sunday_out_time" type="text">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="7">{{ __('label.clear') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop

@push('stylesheet')
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datetimepicker js dependency -->
    <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
            //Select2
            $('#company_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
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
                        window.location.href = '{{ route("office-shifts.index") }}';
                    },
                    error: function(response){
                        //Scroll up
                        window.scrollTo({ top: 70, behavior: 'smooth' });
                        //Clear previous error messages
                        $(".help-block").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var name = $('[name="'+index+'"]');
                            name.closest('.form-control')
                            .addClass('is-invalid');

                            if(name.next('.select2-container').length > 0){
                                name.next('.select2-container').after('<div class="help-block text-danger">'+value+'</div>');
                            }else{
                                name.after('<div class="help-block text-danger">'+value+'</div>');
                            }
                        });
                        
                    }
                })
            })
        })
    </script>
@endpush
