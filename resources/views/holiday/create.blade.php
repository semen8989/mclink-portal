@extends('layout.master')

@section('content')
<div class="card-header">Add New Holiday</div>

<form method="POST" action="{{ route('holidays.store') }}">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="company_id" class="control-label">Company</label>
            <select class="form-control @error('company_id') is-invalid @enderror dynamic" name="company_id" id="company_id"
                data-placeholder="Company">
                    <option value="" disabled selected>Select Company</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>
            @error('company_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="event_name">Event Name</label>
            <input class="form-control  @error('event_name') is-invalid @enderror" placeholder="Enter Event Name" 
                name="event_name" type="text" value="{{ old('event_name') }}">
            @error('event_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Start Date</label>
                <input class="form-control date @error('start_date') is-invalid @enderror" placeholder="Start Date" 
                    readonly name="start_date" type="text" value="{{ old('start_date') }}">
                @error('start_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">End Date</label>
                <input class="form-control date @error('end_date') is-invalid @enderror" placeholder="End Date" 
                    readonly name="end_date" type="text" value="{{ old('end_date') }}">
                @error('end_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control textarea" placeholder="Description" name="description" id="description">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="published">Published</option>
                    <option value="unPublished">Un Published</option>
            </select>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
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
                height: 300,
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
        });
    </script>
@endpush
