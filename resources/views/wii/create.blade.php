@extends('layout.master')

@section('content')
<div class="card-header">Wii Form (Work Improvement Ideas)</div>
<form method="POST" id="wii_form" action="{{ route('wii.store') }}" autocomplete="off" novalidate>
    @csrf
    <div class="card-body">
        @include('components.wii.nav-tabs')
        <div class="tab-content mt-3">
            <div class="form-group">
                <label for="title">Purpose</label>
                <input class="form-control" name="purpose" id="purpose" type="text">
            </div>
            <div class="form-group">
                <label for="title">Current Problem</label>
                <textarea class="form-control" name="problem" id="problem" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Suggestion to resolve</label>
                <textarea class="form-control" name="solution" id="solution" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <span class="badge badge-light" style="font-size: 15px"><em>All information / suggestions will be strictly kept as confidential</em></span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group mt-2 text-right">
            <button type="submit" class="btn btn-success btn-submit">Submit</button>
        </div>
    </div>
</form>
@stop

@push('scripts')
    <script>
        $('document').ready(function (){
            $('#wii_form').submit(function (e){
                e.preventDefault();
                
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("wii.create") }}'
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
                            
                            id.after('<div class="help-block text-danger">'+value+'</div>');

                            if($(".is-invalid").length) {
                                $('html, body').animate({
                                        scrollTop: ($(".is-invalid").first().offset().top - 95)
                                },500);
                            }
                            
                        });
                    }
                });
            });
        });
    </script>
@endpush