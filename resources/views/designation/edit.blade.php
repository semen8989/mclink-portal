@extends('layout.master')

@section('content')
<div class="card-header">Edit Designation</div>
<form method="POST" action="{{ route('designations.update',$designation->id) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="col-md-6">
            <div class="form-group">
                <label for="designation_name">Designation</label>
                <input class="form-control  @error('designation_name') is-invalid @enderror" placeholder="Enter Designation_Name" 
                    name="designation_name" type="text" value="{{ old('designation_name',$designation->designation_name) }}">
                @error('designation_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="company_id" class="control-label">Company</label>
                <select class="form-control @error('company_id') is-invalid @enderror dynamic" name="company_id" id="company_id"
                    data-placeholder="Company">
                        <option value="" disabled selected>Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id',$designation->company->id) == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                        @endforeach
                </select>
                @error('company_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="department_id" class="control-label">Department</label>
                <select class="form-control @error('department_id') is-invalid @enderror" name="department_id" id="department_id"
                    data-selected-department="{{ old('department_id') }}">
                    <option disabled selected>Select Department</option>
                </select>
                @error('department_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
<script>
    $(document).ready(function (){
        //Datepicker
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
        //Call function on load
        department_dropdown();
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
                    $('#department_id').append('<option selected disabled>Select Department</option>');
                    $.each(result, function (key, value) {
                        $('#department_id').append('<option value="' + value['id'] + '">' + value['department_name'] + '</option>');
                    });
                }
            })
        })
        //Function
        function department_dropdown(){
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
                    $('#department_id').append('<option selected disabled>Select Department</option>');
                    $.each(result, function (key, value) {
                        $('#department_id').append('<option value="' + value['id'] + '">' + value['department_name'] + '</option>');
                    });
                    var department_selected = $("#department_id").attr("data-selected-department");
                    if(department_selected !== ''){                    
                        $("#department_id").val(department_selected);
                    }
                }
            })
        }
       
    })
    
</script>
@stop
