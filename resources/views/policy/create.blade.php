@extends('layout.master')

@section('content')
<div class="card-header">Add New Policy</div>
<form method="POST" action="{{ route('policies.store') }}" novalidate>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select class="form-control" name="company_id">
                        <option value="" {{ old('company_id') == '' ? 'selected' : '' }}>All Companies</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->company_name }}
                            </option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_name">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title" 
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control textarea" placeholder="Description" name="description" cols="8"
                        rows="6" id="description">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
</form>
<script>
    $(document).ready(function (){
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
@endsection
