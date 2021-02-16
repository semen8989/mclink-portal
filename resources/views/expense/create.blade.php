@extends('layout.master')

@section('content')
<div class="card-header">Add New Expense</div>
<form action="{{ route('expenses.store') }}" method="post" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="expense_type">Expense Type</label>
            <select id="expense_type_id" name="expense_type_id" class="form-control @error('expense_type_id') is-invalid @enderror" 
                value="{{ old('expense_type_id') }}">
                <option disabled selected>Select Expense Type</option>
                @foreach ($expense_types as $type)
                    <option value="{{ $type->id }}" {{ old('expense_type_id') == $type->id ? 'selected' : '' }}>{{ $type->expense_type }}</option>
                @endforeach
            </select>
            @error('expense_type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="purchase_date">Purchase Date</label>
                <input type="text" class="form-control date @error('purchase_date') is-invalid @enderror" id="purchase_date" 
                    name="purchase_date" placeholder="Purchase Date" value="{{ old('purchase_date') }}" readonly>
                @error('purchase_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="amount">Amount</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" 
                    placeholder="Amount" value="{{ old('amount') }}">
                @error('amount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="company_id">Company</label>
                <select id="company_id" name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                    <option selected disabled>Choose Company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="user_id">Purchase By</label>
                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                    <option selected disabled>Choose Employee</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <fieldset class="form-group col-md-4">
                <label for="bill_copy">Bill Copy</label>
                <input type="file" class="form-control-file @error('bill_copy') is-invalid @enderror" id="bill_copy" name="bill_copy">
                <small>Upload files only: gif,png,jpg,jpeg</small>
                @error('bill_copy')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </fieldset>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea class="form-control textarea" placeholder="Remarks" name="remarks" cols="8"
                rows="6" id="remarks">{{ old('remarks') }}</textarea>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
@stop

@push('stylesheets')
    <!-- Datetimepicker css dependency -->
    <link href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datetimepicker js dependency -->
    <script src="{{ asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yo73cb5kgrrh9v4jlpa391ee0axje0ckqg66pan5n8ksemva/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
        });
    </script>
@endpush