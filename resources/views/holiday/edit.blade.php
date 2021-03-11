@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_holiday') }}</div>

<form method="POST" id="holiday_form" action="{{ route('holidays.update',$holiday->id) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="company_id" class="control-label">{{ __('label.company') }}</label>
            <select class="form-control custom-select" name="company_id" id="company_id">
                    <option value="" disabled selected>{{ __('label.choose') }}</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $holiday->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="event_name">{{ __('label.event_name') }}</label>
            <input class="form-control" name="event_name" id="event_name" type="text" value="{{ $holiday->event_name }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">{{ __('label.start_date') }}</label>
                <input class="form-control date" name="start_date" id="start_date" type="text" value="{{ $holiday->start_date }}">
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">{{ __('label.end_date') }}</label>
                <input class="form-control date" name="end_date" id="end_date" type="text" value="{{ $holiday->end_date }}">
            </div>
        </div>
        <div class="form-group">
            <label for="description">{{ __('label.description') }}</label>
            <textarea class="form-control textarea" name="description" id="description">
                {{ $holiday->description }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="status">{{ __('label.status') }}</label>
            <select class="form-control custom-select" name="status" id="status">
                <option></option>
                @foreach($status as $statusName => $statusId)
                    <option value="{{ $statusId }}" {{ $statusId == $holiday->status ? 'selected' : '' }}>{{ ucfirst($statusName) }}</option>
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
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yo73cb5kgrrh9v4jlpa391ee0axje0ckqg66pan5n8ksemva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
            //Select2
            $('#company_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#status').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
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
            //Holiday form submit
            $('#holiday_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("holidays.index") }}';
                    },
                    error: function(response){
                        //Scroll up
                        window.scrollTo({ top: 100, behavior: 'smooth' });
                        //Clear previous error messages
                        $(".invalid-feedback").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            
                            if(id.next('.select2-container').length > 0){
                                id.next('.select2-container').after('<div class="invalid-feedback d-block">'+value+'</div>');
                            }else{
                                id.after('<div class="invalid-feedback d-block">'+value+'</div>');
                            }
                        });
                        
                    }
                })
            })
        });
    </script>
@endpush