@extends('layout.master')

@section('content')
<div class="card-header">Edit Policy</div>
<form method="POST" action="{{ route('policies.update',$policy->id) }}" novalidate>
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="company_id">Company</label>
            <select class="form-control" name="company_id">
                <option value="" {{ old('company_id') == '' ? 'selected' : '' }}>All Companies</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id',$policy->company_id) == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department_name">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title" 
                value="{{ old('title',$policy->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control textarea" placeholder="Description" name="description" cols="8"
                rows="6" id="description">{{ old('description',$policy->description) }}</textarea>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
@stop

@push('scripts')
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yo73cb5kgrrh9v4jlpa391ee0axje0ckqg66pan5n8ksemva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
@endpush

