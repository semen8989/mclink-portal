@extends('layout.master')

@section('content')
<div class="card-header">Add New Policy</div>
<form method="POST" action="#" novalidate>
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select class="form-control" name="company_id">
                            <option value="" disabled selected>Select Company</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_name">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title">
                    @error('title')
                        
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control textarea" placeholder="Description" name="description" cols="8"
                        rows="6" id="description"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-primary">Save</button>
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
