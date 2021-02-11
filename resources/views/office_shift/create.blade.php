@extends('layout.master')

@section('content')
<div class="card-header">Add New Office Shift</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label for="time" class="col-md-2">Company</label>
                <div class="col-md-4">
                    <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="Company">
                        <option value=""></option>
                        <option value="4">McLink Asia Pte Ltd</option>
                        <option value="6">MPS Solutions Pte Ltd</option>
                        <option value="7">MPS Malaysia Sdn Bhd</option>
                        <option value="8">Guangzhou Maijia Office Equipment Co. Ltd. </option>
                        <option value="9">Mclink Copy Services Philippines Inc</option>
                        <option value="10">MPO Services Pte Ltd</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Shift Name</label>
                <div class="col-md-4">
                    <input class="form-control" placeholder="Shift Name" name="shift_name" type="text" value="" id="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Monday</label>
                <div class="col-md-4">
                  <input class="form-control timepicker clear-1" placeholder="In Time" readonly name="monday_in_time" type="text" value="">
                </div>
                <div class="col-md-4">
                  <input class="form-control timepicker clear-1" placeholder="Out Time" readonly name="monday_out_time" type="text" value="">
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary clear-time" data-clear-id="1">Clear</button>
                </div>
              </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Tuesday</label>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-2" placeholder="In Time" readonly name="tuesday_in_time" type="text" value="">
                </div>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-2" placeholder="Out Time" readonly name="tuesday_out_time" type="text" value="">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="2">Clear</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Wednesday</label>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-3" placeholder="In Time" readonly name="wednesday_in_time" type="text" value="">
                </div>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-3" placeholder="Out Time" readonly name="wednesday_out_time" type="text" value="">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="3">Clear</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Thursday</label>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-4" placeholder="In Time" readonly name="thursday_in_time" type="text" value="">
                </div>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-4" placeholder="Out Time" readonly name="thursday_out_time" type="text" value="">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="4">Clear</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Friday</label>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-5" placeholder="In Time" readonly name="friday_in_time" type="text" value="">
                </div>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-5" placeholder="Out Time" readonly name="friday_out_time" type="text" value="">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="5">Clear</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Saturday</label>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-6" placeholder="In Time" readonly name="saturday_in_time" type="text" value="">
                </div>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-6" placeholder="Out Time" readonly name="saturday_out_time" type="text" value="">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="6">Clear</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2">Sunday</label>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-7" placeholder="In Time" readonly name="sunday_in_time" type="text" value="">
                </div>
                <div class="col-md-4">
                    <input class="form-control timepicker clear-7" placeholder="Out Time" readonly name="sunday_out_time" type="text" value="">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary clear-time" data-clear-id="7">Clear</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.timepicker').datetimepicker({
            ignoreReadonly: true,
            format: 'HH:mm:ss',
        });
        $(".clear-time").click(function(){
            var clear_id  = $(this).data('clear-id');
            $(".clear-"+clear_id).val('');
        });
    })
</script>
@stop