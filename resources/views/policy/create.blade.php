@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.add_policy') }}</div>
<form method="POST" id="policy_form" action="{{ route('policies.store') }}" novalidate>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="company_id">{{ __('label.company') }}</label>
            <select class="form-control" name="company_id" id="company_id">
                <option value="">{{ __('label.all_companies') }}</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department_name">{{ __('label.title') }}</label>
            <input class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">{{ __('label.description') }}</label>
            <textarea class="form-control textarea" name="description" id="description" cols="8" rows="6"></textarea>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop

@push('scripts')
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yo73cb5kgrrh9v4jlpa391ee0axje0ckqg66pan5n8ksemva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(document).ready(function (){
            //TinyMCE
            tinymce.init({
                selector: 'textarea#description',
                height: 400,
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
