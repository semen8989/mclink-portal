@extends('layout.master')

@section('content')
<div class="card-header">Edit Office Shift</div>
<form action="{{ route('office_shifts.update',$officeShift->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="time" class="col-md-2">Company</label>
                    <div class="col-md-4">
                        <select class="form-control @error('company_id') is-invalid @enderror" name="company_id" id="company_id">
                            <option value="" disabled selected>Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id',$officeShift->company_id) == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Shift Name</label>
                    <div class="col-md-4">
                        <input class="form-control @error('shift_name') is-invalid @enderror" placeholder="Shift Name" name="shift_name" type="text" 
                            value="{{ old('shift_name',$officeShift->shift_name) }}" id="shift_name">
                        @error('shift_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Monday</label>
                    <div class="col-md-4">
                    <input class="form-control timepicker clear-1" placeholder="In Time" readonly name="monday_in_time" type="text" value="{{ old('monday_in_time',$officeShift->monday_in_time) }}">
                    </div>
                    <div class="col-md-4">
                    <input class="form-control timepicker clear-1" placeholder="Out Time" readonly name="monday_out_time" type="text" value="{{ old('monday_out_time',$officeShift->monday_out_time) }}">
                    </div>
                    <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="1">Clear</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Tuesday</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-2" placeholder="In Time" readonly name="tuesday_in_time" type="text" value="{{ old('tuesday_in_time',$officeShift->tuesday_in_time) }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-2" placeholder="Out Time" readonly name="tuesday_out_time" type="text" value="{{ old('tuesday_out_time',$officeShift->tuesday_out_time) }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="2">Clear</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Wednesday</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-3" placeholder="In Time" readonly name="wednesday_in_time" type="text" value="{{ old('wednesday_in_time',$officeShift->wednesday_in_time) }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-3" placeholder="Out Time" readonly name="wednesday_out_time" type="text" value="{{ old('wednesday_out_time',$officeShift->wednesday_out_time) }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="3">Clear</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Thursday</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-4" placeholder="In Time" readonly name="thursday_in_time" type="text" value="{{ old('thursday_in_time',$officeShift->thursday_in_time) }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-4" placeholder="Out Time" readonly name="thursday_out_time" type="text" value="{{ old('thursday_out_time',$officeShift->thursday_out_time) }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="4">Clear</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Friday</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-5" placeholder="In Time" readonly name="friday_in_time" type="text" value="{{ old('friday_in_time',$officeShift->friday_in_time) }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-5" placeholder="Out Time" readonly name="friday_out_time" type="text" value="{{ old('friday_out_time',$officeShift->friday_out_time) }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="5">Clear</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Saturday</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-6" placeholder="In Time" readonly name="saturday_in_time" type="text" value="{{ old('saturday_in_time',$officeShift->saturday_in_time) }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-6" placeholder="Out Time" readonly name="saturday_out_time" type="text" value="{{ old('saturday_out_time',$officeShift->saturday_out_time) }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="6">Clear</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-2">Sunday</label>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-7" placeholder="In Time" readonly name="sunday_in_time" type="text" value="{{ old('sunday_in_time',$officeShift->sunday_in_time) }}">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control timepicker clear-7" placeholder="Out Time" readonly name="sunday_out_time" type="text" value="{{ old('sunday_out_time',$officeShift->sunday_out_time) }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary clear-time" data-clear-id="7">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
<script>
    $(document).ready(function(){
        $('.timepicker').datetimepicker({
            ignoreReadonly: true,
            format: 'HH:mm',
        });
        $(".clear-time").click(function(){
            var clear_id  = $(this).data('clear-id');
            $(".clear-"+clear_id).val('');
        });
    })
</script>
@stop