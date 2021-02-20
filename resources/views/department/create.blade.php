@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_department') }}</div>
<form method="POST" action="{{ route('departments.store') }}" novalidate>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="department_name">{{ __('label.department_name') }}</label>
            <input class="form-control @error('department_name') is-invalid @enderror" name="department_name" id="department_name" value="{{ old('department_name') }}" type="text">
            @error('department_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="company_id">{{ __('label.company') }}</label>
            <select class="form-control @error('company_id') is-invalid @enderror" name="company_id" id="company_id">
                    <option value="" disabled selected>{{ __('label.choose') }}</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option>        
                @endforeach 
            </select>
            @error('company_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="user_id">{{ __('label.department_head') }}</label>
            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                    <option value="" disabled selected>{{ __('label.choose') }}</option>
            </select>
            @error('user_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
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
        })
    </script>
@endpush