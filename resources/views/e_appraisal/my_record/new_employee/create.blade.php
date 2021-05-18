@extends('layout.master')

@section('content')
<form class="form-horizontal" id="serviceReportForm" action="{{ route('service.form.store') }}" method="POST">
  @csrf

  <div class="card-header">{{ __('label.service_report.form.header.main') }}</div>
  <div class="card-body">
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="customer">{{ __('label.service_report.form.label.cust_name') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <select class="form-control custom-select @error('customer') is-invalid @enderror" name="customer" id="customer"></select>
                @error('customer')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        {{-- <div class="form-group col-md-6">
            <label class="col-form-label" for="custEmail">{{ __('label.service_report.form.label.cust_email') }}</label>
            <div class="controls">
                <input class="form-control @error('custEmail') is-invalid @enderror" name="custEmail" id="custEmail" type="email" value="{{ old('custEmail', $csrNo ? '' : $serviceReport->customer->email) }}"> 
                @error('custEmail')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div> --}}
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label" for="review_period_from">{{ __('label.service_report.form.label.service_start') }}</label>
            <div class="controls">
                <input class="form-control @error('review_period_from') is-invalid @enderror" name="review_period_from" id="review_period_from" type="text" value=""> 
                @error('review_period_from')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="review_period_to">{{ __('label.service_report.form.label.service_end') }}</label>
            <div class="controls">
                <input class="form-control @error('review_period_to') is-invalid @enderror" name="review_period_to" id="review_period_to" type="text" value=""> 
                @error('review_period_to')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    {{-- <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="customer">{{ __('label.service_report.form.label.cust_name') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <select class="form-control" name="customer[]" id="customer" multiple></select>
                @error('customer')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        {{-- <div class="form-group col-md-6">
            <label class="col-form-label" for="custEmail">{{ __('label.service_report.form.label.cust_email') }}</label>
            <div class="controls">
                <input class="form-control @error('custEmail') is-invalid @enderror" name="custEmail" id="custEmail" type="email" value="{{ old('custEmail', $csrNo ? '' : $serviceReport->customer->email) }}"> 
                @error('custEmail')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div> --}}

    {{-- <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="csrNo">{{ __('label.service_report.form.label.csr_no') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <input class="form-control @error('csrNo') is-invalid @enderror" name="csrNo" id="csrNo" type="text" value="{{ old('csrNo', $csrNo ?? $serviceReport->csr_no) }}">
                @error('csrNo')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="date">{{ __('label.service_report.form.label.date') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <input class="form-control @error('date') is-invalid @enderror" name="date" id="date" type="text" value="{{ old('date', $csrNo ?: $serviceReport->date) ? date('d/m/Y H:i A', strtotime(old('date', $csrNo ?: $serviceReport->date))) : '' }}">
                @error('date')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="isNewCustomer"  id="isNewCustomer" value="true" {{ !old('isNewCustomer') ?: 'checked'  }}>
                <label class="custom-control-label" for="isNewCustomer">{{ __('label.service_report.form.label.add_customer') }}</label>
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="customer">{{ __('label.service_report.form.label.cust_name') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <select class="form-control custom-select @error('customer') is-invalid @enderror" name="customer" id="customer">
                @if ($serviceReport)
                    <option value="{{ $serviceReport->customer_id }}" selected>
                    {{ $serviceReport->customer->name }}
                    </option>
                @endif
                </select>
                @error('customer')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
                
                <input class="form-control @error('newCustomer') is-invalid @enderror" name="newCustomer" id="newCustomer" value="{{ old('newCustomer') }}" type="{{ old('isNewCustomer') ? 'text' : 'hidden' }}" {{ old('isNewCustomer') ?: 'disabled' }}> 
                @error('newCustomer')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="custEmail">{{ __('label.service_report.form.label.cust_email') }}</label>
            <div class="controls">
                <input class="form-control @error('custEmail') is-invalid @enderror" name="custEmail" id="custEmail" type="email" value="{{ old('custEmail', $csrNo ? '' : $serviceReport->customer->email) }}"> 
                @error('custEmail')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="address">{{ __('label.service_report.form.label.address') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="5">{{ old('address', $csrNo ? '' : $serviceReport->customer->address) }}</textarea>
                @error('address')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label" for="engineerId">{{ __('label.service_report.form.label.engineer_name') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <select class="form-control custom-select @error('engineerId') is-invalid @enderror" name="engineerId" id="engineerId">
                @if ($serviceReport)
                    <option value="{{ $serviceReport->engineer_id }}" selected>
                    {{ $serviceReport->user->name }}
                    </option>
                @endif
                </select>
                @error('engineerId')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="ticketReference">{{ __('label.service_report.form.label.ticket_reference') }}</label>
            <div class="controls">
                <input class="form-control @error('ticketReference') is-invalid @enderror" name="ticketReference" id="ticketReference" type="text" value="{{ old('ticketReference', $csrNo ? '' : $serviceReport->ticket_reference) }}"> 
                @error('ticketReference')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="serviceRendered">{{ __('label.service_report.form.label.service_rendered') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('serviceRendered') is-invalid @enderror" name="serviceRendered" id="serviceRendered">{{ old('serviceRendered', $csrNo ? '' : $serviceReport->service_rendered) }}</textarea>
                @error('serviceRendered')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label" for="engineerRemark">{{ __('label.service_report.form.label.engineer_remark') }}</label>
            <div class="controls">
                <textarea class="form-control @error('engineerRemark') is-invalid @enderror" name="engineerRemark" id="engineerRemark" rows="3">{{ old('engineerRemark', $csrNo ? '' : $serviceReport->engineer_remark) }}</textarea>
                @error('engineerRemark')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="statusAfterService">{{ __('label.service_report.form.label.status_after_service') }}</label>
            <div class="controls">
                <textarea class="form-control @error('statusAfterService') is-invalid @enderror" name="statusAfterService" id="statusAfterService" rows="3">{{ old('statusAfterService', $csrNo ? '' : $serviceReport->status_after_service) }}</textarea>
                @error('statusAfterService')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label" for="serviceStart">{{ __('label.service_report.form.label.service_start') }}</label>
            <div class="controls">
                <input class="form-control @error('serviceStart') is-invalid @enderror" name="serviceStart" id="serviceStart" type="text" value="{{ old('serviceStart', $csrNo ? '' : $serviceReport->service_start) ? date('d/m/Y H:i A', strtotime(old('serviceStart', $csrNo ?: $serviceReport->service_start))) : '' }}"> 
                @error('serviceStart')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="serviceEnd">{{ __('label.service_report.form.label.service_end') }}</label>
            <div class="controls">
                <input class="form-control @error('serviceEnd') is-invalid @enderror" name="serviceEnd" id="serviceEnd" type="text" value="{{ old('serviceEnd', $csrNo ? '' : $serviceReport->service_end) ? date('d/m/Y H:i A', strtotime(old('serviceEnd', $csrNo ?: $serviceReport->service_end))) : '' }}"> 
                @error('serviceEnd')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label" for="usedItCredit">{{ __('label.service_report.form.label.used_it_credit') }}</label>
            <div class="controls">
                <input class="form-control @error('usedItCredit') is-invalid @enderror" placeholder="{{ __('label.global.text.full_na') }}" name="usedItCredit" id="usedItCredit" data-decimals="1" min="0" max="100" step="0.5" type="number" value="{{ old('usedItCredit', $csrNo ? '' : $serviceReport->used_it_credit) }}"> 
                @error('usedItCredit')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        @if ($serviceReport)
        <div class="form-group col-md-6">
            <label class="col-form-label" for="status">{{ __('label.service_report.form.label.status') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
                    @foreach($status as $statusName => $statusId)
                        @if($statusId != 1)
                            <option value="{{ $statusId }}" {{ $statusId == $serviceReport->status ? 'selected' : '' }} >
                                {{ ucfirst($statusName) }}
                            </option>
                        @else
                            @if($serviceReport->status == 1)
                                <option value="{{ $statusId }}" selected disabled>{{ ucfirst($statusName) }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
                @error('status')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @else
        <input type="hidden" id="action" name="action">
        @endif
    </div> --}}

    <div class="row float-right mb-4 mt-3 mr-1">
        <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('service.form.index') }}">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
            </svg>
            {{ __('label.global.form.button.back') }}
        </a>
        <div class="btn-group">
            <button class="btn btn-success font-weight-bold px-3" value="sent" type="submit">
            <svg class="c-icon">
                <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-send') }}"></use>
            </svg>
            {{ __('label.service_report.form.button.send') }}
            </button>
            <button class="btn btn-success dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
            <button class="dropdown-item font-weight-bold px-3" value="draft" type="submit">
                {{ __('label.service_report.form.button.draft') }}
            </button>
            </div>
        </div>
    </div>

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
  <!-- TinyMCE js dependency -->
  <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_API') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- bootstrap-input-spinner js dependency -->
  <script src="{{ asset('plugin/bootstrap-input-spinner/js/bootstrap-input-spinner.js') }}"></script>
  <!-- select2 js dependency -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {

      // return formatted email for customer drop down
      function concatenateDesignation ($designation) {
        return ' ( ' + $designation + ' )';
      }

      // init Date field
      $dateField = $('#date').datetimepicker({
        format: 'DD/MM/YYYY',
      });

      // init Start of Service field
      $serviceStartField = $('#serviceStart').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      // init End of Service field
      $serviceEndField = $('#serviceEnd').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      // init Service Rendered field
      tinymce.init({
        selector: 'textarea#serviceRendered',
        height: 400,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | bold italic | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
      });

      // init IT Credit Used field
      $('#usedItCredit').inputSpinner();

      // init Customer Name select2
      $('#customer').select2({
        theme: "bootstrap",
        ajax: {
            url: "{{ route('get.employees') }}",
            type: 'get',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term || '',
                    page: params.page || 1
                }

                return query;
            },
            processResults: function (data, params) {

              params.page = params.page || 1;

              var items = data.data.map(function(item) {
                let designation = item.designation.designation_name ? concatenateDesignation(item.designation.designation_name) : '';

                return { 
                  id: item.id,
                  text: item.name + designation,
                  name: item.name
                };
              });
              
              return {
                results: items,
                pagination: {
                  more: (params.page * 10) < data.total
                }
              };
            },
            cache: true
        }
      });
      $('#customer').next().css('display', "{{ old('isNewCustomer') ? 'none' : 'block' }}");
      $('#customer').prop('disabled', "{{ old('isNewCustomer') }}");

      // init Service Engineer Name select2
      $('#engineerId').select2({
        theme: "bootstrap",
        ajax: {
            url: "{{ route('get.engineers') }}",
            type: 'get',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term || '',
                    page: params.page || 1
                }

                return query;
            },
            processResults: function (data, params) {

              params.page = params.page || 1;

              var items = data.data.map(function(item) {
                  return { 
                    id: item.id,
                    text: item.name
                  };
              });

              return {
                results: items,
                pagination: {
                  more: (params.page * 10) < data.total
                }
              };
            },
            cache: true
        }
      });

      $('#customer').on('select2:selecting', function (e) {
        var data = e.params.args.data;
        data.text = data.name;
      });

      $('#customer').on('select2:select', function (e) {
        var data = e.params.data;
        $('#custEmail').val(data.email);
        $('#address').val(data.address);
      });

      $('#isNewCustomer').change(function() {
        if (this.checked) {
          $('#newCustomer').val('');
          $('#custEmail').val('');
          $('#address').val('');
        }

        $('#customer').next().css('display',  this.checked ? 'none' : 'block');
        $('#customer ~ .help-block').css('display',  this.checked ? 'none' : 'block');
        $('#customer').prop('disabled', this.checked);
        $('#newCustomer').attr('type', this.checked ? 'text' : 'hidden');
        $('#newCustomer ~ .help-block').css('display',  this.checked ? 'block' : 'none');
        $('#newCustomer').prop('disabled', !this.checked);
      });
      
      $('#serviceReportForm').find(':submit').click(function() {
        $('#action').val($(this).val());
      });

      $('#serviceReportForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
        
        $dateField.data("DateTimePicker").format('YYYY-MM-DD');
        $serviceStartField.data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss');
        $serviceEndField.data("DateTimePicker").format('YYYY-MM-DD HH:mm:ss');
      });
    });
  </script>
@endpush