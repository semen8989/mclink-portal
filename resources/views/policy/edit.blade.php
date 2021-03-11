@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_policy') }}</div>
<form method="POST" id="policy_form" action="{{ route('policies.update',$policy->id) }}" novalidate>
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="company_id">{{ __('label.company') }}</label>
            <select class="form-control custom-select" name="company_id" id="company_id">
                <option></option>
                <option value="0" {{ $policy->company_id == 0 ? 'selected' : '' }}>{{ __('label.all_companies') }}</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $policy->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">{{ __('label.title') }}</label>
            <input class="form-control" name="title" id="title" value="{{ $policy->title }}">
        </div>
        <div class="form-group">
            <label for="description">{{ __('label.description') }}</label>
            <textarea class="form-control textarea" name="description" id="description" cols="8" rows="6">{{ $policy->description }}</textarea>
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
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_API') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function (){
            //TinyMCE
            tinymce.init({
                selector: 'textarea#description',
                height: 200,
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
            //Select2
            $('#company_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            //Policy form submit
            $('#policy_form').submit(function (e){
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: method,
                    success: function(){
                        window.location.href = '{{ route("policies.index") }}';
                    },
                    error: function(response){
                        //Scroll up
                        window.scrollTo({ top: 100, behavior: 'smooth' });
                        //Clear previous error messages
                        $(".invalid-feedback").remove();
                        $( ".form-control" ).removeClass("is-invalid");
                        //fetch and display error messages
                        var errors = response.responseJSON;
                        $.each(errors.errors, function (index, value) {
                            var id = $("#"+index);
                            id.closest('.form-control')
                            .addClass('is-invalid');
                            
                            if(id.next('.select2-container').length > 0){
                                id.next('.select2-container').after('<div class="invalid-feedback d-block">'+value+'</div>');
                            }else{
                                id.after('<div class="invalid-feedback d-block">'+value+'</div>');
                            }
                        });
                        
                    }
                })
            })
        })
    </script>
@endpush

