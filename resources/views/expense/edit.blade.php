@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.edit_expense') }}</div>
<form action="{{ route('expenses.update',$expense->id) }}" id="expense_form" method="post" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="expense_type">{{ __('label.expense_type') }}</label>
            <select id="expense_type_id" name="expense_type_id" id="expense_type_id" class="form-control custom-select">
                <option></option>
                @foreach ($expense_types as $type)
                    <option value="{{ $type->id }}" {{ $expense->expense_type_id == $type->id ? 'selected' : '' }}>{{ $type->expense_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="purchase_date">{{ __('label.purchase_date') }}</label>
                <input type="text" class="form-control date" id="purchase_date" name="purchase_date" value="{{ $expense->purchase_date }}">
            </div>
            <div class="form-group col-md-6">
                <label for="amount">{{ __('label.amount') }}</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $expense->amount }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="company_id">{{ __('label.company') }}</label>
                <select id="company_id" name="company_id" class="form-control custom-select">
                    <option></option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $expense->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="employee_id">{{__('label.purchase_by') }}</label>
                <select id="employee_id" name="employee_id" class="form-control custom-select">
                    <option></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $expense->employee_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="status">{{ __('label.status') }}</label>
                <select id="status" name="status" class="form-control custom-select">
                    <option></option>
                    @foreach($status as $statusName => $statusId)
                        <option value="{{ $statusId }}" {{ $statusId == $expense->status ? 'selected' : '' }}>{{ ucfirst($statusName) }}</option>
                    @endforeach
                </select>
            </div>
            <fieldset class="form-group col-md-6">
                <label for="bill_copy">{{ __('label.update_bill_copy') }}</label>
                <input type="file" class="form-control-file" id="bill_copy" name="bill_copy">
                <small>{{ __('label.upload_format') }}</small>
            </fieldset>
        </div>
        <div class="form-group">
            <label for="remarks">{{ __('label.remarks') }}</label>
            <textarea class="form-control textarea" name="remarks" cols="8" rows="6" id="remarks">{{ $expense->remarks }}</textarea>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">{{ __('label.save') }}</button>
    </div>
</form>
@stop

@push('stylesheet')
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- select2 css dependency -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('plugin/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datetimepicker js dependency -->
    <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yo73cb5kgrrh9v4jlpa391ee0axje0ckqg66pan5n8ksemva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- select2 js dependency -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function (){
            //Datetimepicker
            $('.date').datetimepicker({
                defaultDate: new Date(),
                ignoreReadonly: true,
                format: 'YYYY-MM-DD',
                widgetPositioning: {
                    vertical: 'bottom'
                }
            });
            //TinyMCE
            tinymce.init({
                selector: 'textarea#remarks',
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
            $('#expense_type_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#company_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#employee_id').select2({
                theme: "bootstrap",
                placeholder: '{{ __('label.choose') }}',
                allowClear: true
            });
            $('#status').select2({
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
                        $('#employee_id').empty();
                        $('#employee_id').append('<option></option>');
                        $.each(result, function (key, value) {
                            $('#employee_id').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                        });
                    }
                })
            });
            //Expense form
            $('#expense_form').submit(function (e){
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
                        window.location.href = '{{ route("expenses.index") }}';
                    },
                    error: function(response){
                        //Scroll up
                        window.scrollTo({ top: 0, behavior: 'smooth' });
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
            });
        });
    </script>
@endpush