@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_department') }}</div>
<form method="POST" id="department_form" action="{{ route('departments.update',$department->id) }}" novalidate>
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="department_name">{{ __('label.department_name') }}</label>
            <input class="form-control" name="department_name" id="department_name" value="{{ $department->department_name }}" type="text">
        </div>
        <div class="form-group">
            <label for="company_id">{{ __('label.company') }}</label>
            <select class="form-control" name="company_id" id="company_id">
                    <option value="" disabled selected>{{ __('label.choose') }}</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $department->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option>        
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">{{ __('label.department_head') }}</label>
            <select class="form-control" name="user_id" id="user_id">
                    <option value="" disabled selected>{{ __('label.choose') }}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $department->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
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
                        $('#user_id').append('<option selected disabled>{{ __("label.choose") }}</option>');
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
                        $(".invalid-feedback").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            id.after('<div class="invalid-feedback">'+value+'</div>');
                        });
                        
                    }
                })
            })

        })
    </script>
@endpush
