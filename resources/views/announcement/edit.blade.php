@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_announcement') }}</div>
<form method="POST" id="announcement_form" action="{{ route('announcements.update',$announcement->id) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="title">{{ __('label.title') }}</label>
            <input class="form-control" name="title" type="text" id="title" value="{{ $announcement->title }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">{{ __('label.start_date') }}</label>
                <input class="form-control date" name="start_date" id="start_date" value="{{ $announcement->start_date }}">
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">{{ __('label.end_date') }}</label>
                <input class="form-control date" name="end_date" id="end_date" value="{{ $announcement->end_date }}">
            </div>
        </div>
        <div class="form-group">
            <label for="company_id" class="control-label">{{ __('label.company') }}</label>
            <select class="form-control dynamic" name="company_id" id="company_id">
                    <option value="" disabled selected>{{ __('label.choose') }}</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $announcement->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department" class="control-label">{{ __('label.department') }}</label>
            <select class="form-control" name="department_id" id="department_id">
                <option disabled selected>{{ __('label.choose') }}</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $announcement->department_id == $department->id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="summary">{{ __('label.summary') }}</label>
            <textarea class="form-control" name="summary" cols="30" rows="3" id="summary">{{ $announcement->summary }}</textarea>
        </div>
        <div class="form-group">
            <label for="description">{{ __('label.description') }}</label>
            <textarea class="form-control textarea" name="description" cols="8" rows="6" id="description">{{ $announcement->description }}</textarea>
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
            //TinyMCE
            tinymce.init({
                selector: 'textarea#description',
                height: 200,
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
                        $('#department_id').append('<option selected disabled>{{ __("label.choose") }}</option>');
                        $.each(result, function (key, value) {
                            $('#department_id').append('<option value="' + value['id'] + '">' + value['department_name'] + '</option>');
                        });
                    }
                })
            })
            //Announcement form submit
            $('#announcement_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("announcements.index") }}';
                    },
                    error: function(response){
                        //Scroll up
                        window.scrollTo({ top: 103, behavior: 'smooth' });
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
