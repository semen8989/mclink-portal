@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_designation') }}</div>
<form method="POST" id="designation_form" action="{{ route('designations.store') }}">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="designation_name">{{ __('label.designation_name') }}</label>
            <input class="form-control" name="designation_name" id="designation_name" type="text">
        </div>
        <div class="form-group">
            <label for="company_id" class="control-label">{{ __('label.company') }}</label>
            <select class="form-control dynamic" name="company_id" id="company_id">
                <option value="" disabled selected>{{ __('label.choose') }}</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department_id" class="control-label">{{ __('label.department') }}</label>
            <select class="form-control" name="department_id" id="department_id">
                <option disabled selected>{{ __('label.choose') }}</option>
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
        $(document).ready(function (){
            //Dynamic Company Dropdown
            $('#company_id').change(function(){
                var value = $('#company_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('fetch_department') }}",
                    method: "POST",
                    data: {
                        value: value,
                        _token:_token
                    },
                    dataType: 'json',
                    success:function(result){
                        $('#department_id').empty();
                        $('#department_id').append('<option selected disabled>{{ __("label.choose") }}</option>');
                        $.each(result, function (key, value) {
                            $('#department_id').append('<option value="' + value['id'] + '">' + value['department_name'] + '</option>');
                        });
                    }
                })
            })
            //Designation form submit
            $('#designation_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("designations.index") }}';
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
