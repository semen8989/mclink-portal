@extends('layout.master')

@section('content')
<div class="card-header">Add New Employee</div>
<form method="POST" id="employee_form" action="{{ route('employees.store') }}" autocomplete="off" novalidate>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" id="name" type="text">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="employee_id">Employee ID</label>
                            <input class="form-control" name="employee_id" id="employee_id" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="joining_date">Joining Date</label>
                            <input class="form-control date" name="joining_date" id="joining_date" type="text" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control custom-select" name="gender" id="gender">
                                <option></option>
                                <option value="male"> Male</option>
                                <option value="female"> Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="birth_date">Date of Birth</label>
                            <input class="form-control date" name="birth_date" id="birth_date" type="text" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_id">Company</label>
                            <select class="form-control custom-select" name="company_id" id="company_id">
                                <option></option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="department_id">Department</label>
                            <select class="form-control custom-select" name="department_id" id="department_id">
                                <option></option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="designation_id">Designation</label>
                            <select class="form-control custom-select" name="designation_id" id="designation_id">
                                <option></option>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="role_id">Role</label>
                            <select class="form-control custom-select" name="role_id" id="role_id">
                                <option></option>
                                <option value="1"> Administrator</option>
                                <option value="2"> Employee</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="contact_number">Contact Number</label>
                            <input class="form-control" name="contact_number" id="contact_number" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="role_id">Shift</label>
                            <select class="form-control custom-select" name="shift_id" id="shift_id">
                                <option></option>
                                @foreach($officeShifts as $officeShift)
                                    <option value="{{ $officeShift->id }}">{{ $officeShift->shift_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input class="form-control" name="email" id="email" type="text">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input class="form-control" name="password" id="password" type="password">
                        </div>
                        <div class="col-md-6">
                            <label for="password2">Confirm Password</label>
                            <input class="form-control" name="password_confirmation" id="password_confirmation" type="password">
                        </div>
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
           $('.date').datetimepicker({
                ignoreReadonly: true,
                format: 'YYYY-MM-DD'
            });
            //Select2
            $('.custom-select').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });

            //Employee form submit
            $('#employee_form').submit(function (e){
                e.preventDefault();
                
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    beforeSend: function() { 
                        $(".help-block").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                    },
                    success: function(){
                        window.location.href = '{{ route("employees.index") }}';
                    },
                    error: function(response){
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            
                            if(id.next('.select2-container').length > 0){
                                id.next('.select2-container').after('<div class="help-block text-danger">'+value+'</div>');
                            }else{
                                id.after('<div class="help-block text-danger">'+value+'</div>');
                            }

                        });

                        if($(".is-invalid").length) {
                            $('html, body').animate({
                                    scrollTop: ($(".is-invalid").first().offset().top - 95)
                            },500);
                        }
                        
                    }
                })

            })
        });
    </script>
@endpush
