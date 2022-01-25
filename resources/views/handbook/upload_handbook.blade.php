@extends('layout.master')

@section('content')
    @include('components.handbook.card_header')
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="uploadHandbook">
            <form action="{{ route('handbook.upload') }}" id="handbook_form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="pdf_file" class="col-sm-2 col-form-label">Upload Indoctrination</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control-file" name="pdf_file" id="pdf_file">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="type" id="type">
                            <option></option>
                            <option value="1">MCA Indoctrination</option>
                            <option value="2">Philippines Handbook</option>
                            <option value="3">China Handbook</option>
                        </select>
                    </div>
                  </div>
                <button class="btn btn-primary font-weight-bold mb-2" type="submit">
                    Upload
                </button>
            </form>
        </div>
    </div>
@stop

@push('stylesheet')
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Page js codes -->
    <script>
        
        $(document).ready(function (){
            //Select2
            $('#type').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });

            $('#handbook_form').submit(function (e){
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
                        window.location.href = '{{ route("handbook.upload_handbook") }}';
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