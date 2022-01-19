@extends('layout.master')

@section('content')
    <div class="card-header">Edit Role Details</div>
    <form method="POST" id="role_form" action="{{ route('roles.update',$role->id) }}" autocomplete="off" novalidate>
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="department_name">Role Name</label>
                <input class="form-control" name="name" id="name" type="text" value="{{ $role->name }}">
            </div>
            <div class="form-group">
                <label for="department_name">Label</label>
                <input class="form-control" name="label" id="label" type="text" value="{{ $role->label }}">
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
        </div>
    </form>
@stop

@push('scripts')
    <script>
        $(document).ready(function(){

            $('#role_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("roles.index") }}';
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
                            
                        });

                        if($(".is-invalid").length) {
                            $('html, body').animate({
                                    scrollTop: ($(".is-invalid").first().offset().top - 95)
                            },500);
                        }
                        
                    }
                })
            })
        });
    </script>
@endpush