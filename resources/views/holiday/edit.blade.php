@extends('layout.master')

@section('content')
<div class="card-header">Edit Holiday</div>

<form method="POST" action="{{ route('holidays.update',$holiday->id) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_id" class="control-label">Company</label>
                    <select class="form-control @error('company_id') is-invalid @enderror dynamic" name="company_id" id="company_id"
                        data-placeholder="Company">
                            <option value="" disabled selected>Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id',$holiday->company_id) == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
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
                        name="event_name" type="text" value="{{ old('event_name',$holiday->event_name) }}">
                    @error('event_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input class="form-control date @error('start_date') is-invalid @enderror" placeholder="Start Date" 
                                readonly name="start_date" type="text" value="{{ old('start_date',$holiday->start_date) }}">
                            @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input class="form-control date @error('end_date') is-invalid @enderror" placeholder="End Date" 
                                readonly name="end_date" type="text" value="{{ old('end_date',$holiday->end_date) }}">
                            @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control textarea" placeholder="Description" name="description" id="description">
                        {{ old('description',$holiday->description) }}
                    </textarea>
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
                            <option value="published" {{ old('status',$holiday->status) == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="unPublished" {{ old('status',$holiday->status) == 'unPublished' ? 'selected' : '' }}>Un Published</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
@stop