@extends('layout.master')

@section('content')
    <div class="card-header">Upload File</div>
    <form method="POST" id="file_form" action="{{ route('file-manager.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="department_id">Department</label>
                <select id="department_id" name="department_id" id="department_id" class="form-control custom-select">
                    <option></option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" id="category_id" class="form-control custom-select">
                    <option></option>
                    @foreach ($categories as $name => $value)
                        <option value="{{ $value }}">{{ ucwords($name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="file">Document File</label>
                <input type="file" class="form-control-file" id="file" name="file">
                <small>Upload files only gif,png,pdf,txt,doc,docx,csv,xlsx,zip</small>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">Save</button>
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
        $(document).ready(function(){
             //Select2
             $('.custom-select').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });

            $('#file_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = new FormData(this);
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    processData: false,
                    contentType: false,
                    success: function(){
                        window.location.href = '{{ route("file-manager.index") }}';
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

                            if($(".is-invalid").length) {
                                $('html, body').animate({
                                        scrollTop: ($(".is-invalid").first().offset().top - 95)
                                },500);
                            }
                            
                        });
                        
                    }
                })
            });
        });
    </script>
@endpush