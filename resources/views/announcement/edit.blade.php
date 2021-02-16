@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_announcement') }}</div>
<form method="POST" action="{{ route('announcements.update',$announcement->id) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="title">{{ __('label.title') }}</label>
            <input class="form-control  @error('title') is-invalid @enderror" name="title" type="text" value="{{ old('title',$announcement->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">{{ __('label.start_date') }}</label>
                <input class="form-control date @error('start_date') is-invalid @enderror" name="start_date" type="text" value="{{ old('start_date',$announcement->start_date) }}">
                @error('start_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">{{ __('label.end_date') }}</label>
                <input class="form-control date @error('end_date') is-invalid @enderror" name="end_date" type="text" value="{{ old('end_date',$announcement->end_date) }}">
                @error('end_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="company_id" class="control-label">{{ __('label.company') }}</label>
            <select class="form-control @error('company_id') is-invalid @enderror dynamic" name="company_id" id="company_id">
                    <option value="" disabled selected>{{ __('label.select_company') }}</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id',$announcement->company_id) == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                    @endforeach
            </select>
            @error('company_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="department" class="control-label">{{ __('label.department') }}</label>
            <select class="form-control @error('department_id') is-invalid @enderror" name="department_id" id="department_id" data-selected-department="{{ old('department_id') }}">
                <option disabled selected>{{ __('label.select_department') }}</option>
            </select>
            @error('department_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="summary">{{ __('label.summary') }}</label>
            <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" cols="30" rows="3" id="summary">{{ old('summary',$announcement->summary) }}</textarea>
            @error('summary')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">{{ __('label.description') }}</label>
            <textarea class="form-control textarea" name="description" cols="8" rows="6" id="description">{{ old('description',$announcement->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
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
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yo73cb5kgrrh9v4jlpa391ee0axje0ckqg66pan5n8ksemva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(document).ready(function (){
            //Datetimepicker
            $('.date').datetimepicker({
                defaultDate: new Date(),
                ignoreReadonly: true,
                format: 'YYYY-MM-DD',
                widgetPositioning: {
                    vertical: 'bottom'
                }
            });
            //Call on load
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
                        var current_department = '{{ $announcement->department_id }}';
                        if(department_selected !== ''){                    
                            $("#department_id").val(department_selected);
                        }else{
                            $("#department_id").val(current_department);
                        }
                    }
                })
            }
            //TinyMCE
            tinymce.init({
                selector: 'textarea#description',
                height: 400,
                menubar: false,
                plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        })
        
    </script>
@endpush
