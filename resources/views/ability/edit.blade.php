@extends('layout.master')

@section('content')
    <div class="card-header">Edit Ability Details</div>
    <form method="POST" id="ability_form" action="{{ route('abilities.update',$ability->id) }}" autocomplete="off" novalidate>
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Ability Name</label>
                <input class="form-control" name="name" id="name" type="text" value="{{ $ability->name }}">
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input class="form-control" name="label" id="label" type="text" value="{{ $ability->label }}">
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

            $('#ability_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("abilities.index") }}';
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

            });
        
        });
    </script>
@endpush