@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_designation') }}</div>
<form method="POST" id="designation_form" action="{{ route('designations.update',$designation->id) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="designation_name">{{ __('label.designation_name') }}</label>
            <input class="form-control" name="designation_name" id="designation_name" type="text" value="{{ $designation->designation_name }}">
        </div>
        <div class="form-group">
            <label for="company_id" class="control-label">{{ __('label.company') }}</label>
            <select class="form-control custom-select dynamic" name="company_id" id="company_id">
                <option></option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $designation->company->id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department_id" class="control-label">{{ __('label.department') }}</label>
            <select class="form-control custom-select" name="department_id" id="department_id">
                <option></option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $designation->department_id == $department->id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop

@push('stylesheet')
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function (){
             //Select2
             $('#company_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#department_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            //Dynamic Company Dropdown
            $('#company_id').change(function(){
                var value = $('#company_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('fetch_department') }}",
                    method: "POST",
                    data: {
                        value: value,
                        _token:_token
                    },
                    dataType: 'json',
                    success:function(result){
                        $('#department_id').empty();
                        $('#department_id').append('<option></option>');
                        $.each(result, function (key, value) {
                            $('#department_id').append('<option value="' + value['id'] + '">' + value['department_name'] + '</option>');
                        });
                    }
                })
            })
            //Designation form submit
            $('#designation_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("designations.index") }}';
                    },
                    error: function(response){
                        //Clear previous error messages
                        $(".help-block").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
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
                        
                    }
                })
            })
        
        })
        
    </script>
@endpush
