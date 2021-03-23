@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_department') }}</div>
<form method="POST" id="department_form" action="{{ route('departments.store') }}" novalidate>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="department_name">{{ __('label.department_name') }}</label>
            <input class="form-control" name="department_name" id="department_name" type="text">
        </div>
        <div class="form-group">
            <label for="company_id">{{ __('label.company') }}</label>
            <select class="form-control custom-select" name="company_id" id="company_id">
                <option></option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">
                        {{ $company->company_name }}
                    </option>        
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">{{ __('label.department_head') }}</label>
            <select class="form-control custom-select" name="user_id" id="user_id">
                <option></option>
                <option value="">{{__('label.none')}}</option>
            </select>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
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
             $('#company_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#user_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            //Dynamic Company Dropdown
            $('#company_id').change(function(){
                var value = $('#company_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('fetch_user') }}",
                    method: "POST",
                    data: {
                        value: value,
                        _token: _token
                    },
                    dataType: 'json',
                    success: function(result){
                        $('#user_id').empty();
                        $('#user_id').append('<option></option>');
                        $.each(result, function (key, value) {
                            $('#user_id').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                        });
                    }
                })
            })
            //Department form submit
            $('#department_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("departments.index") }}';
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
                            
                        });

                        if($(".is-invalid").length) {
                            $('html, body').animate({
                                    scrollTop: ($(".is-invalid").first().offset().top - 95)
                            },500);
                        }
                        
                    }
                })
            })

        })
    </script>
@endpush