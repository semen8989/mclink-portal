@extends('layout.master')

@section('content')
<form class="form-horizontal" id="appraisalForm" action="{{ route('appraisal.my.record.new.employee.store') }}" method="POST">
  @csrf

  <div class="card-header">{{ __('label.e_appraisal_my_record.form.header.new_employee_appraisal') }}</div>
  <div class="card-body">
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="employee_id">{{ __('label.e_appraisal_my_record.form.label.employee') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <select class="form-control custom-select @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id"></select>
                @error('employee_id')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="review_period_from">{{ __('label.e_appraisal_my_record.form.label.review_from') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <input class="form-control @error('review_period_from') is-invalid @enderror" name="review_period_from" id="review_period_from" type="text" value="{{ old('review_period_from') }}"> 
                @error('review_period_from')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="review_period_to">{{ __('label.e_appraisal_my_record.form.label.review_to') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <input class="form-control @error('review_period_to') is-invalid @enderror" name="review_period_to" id="review_period_to" type="text" value="{{ old('review_period_to') }}"> 
                @error('review_period_to')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold">{{ __('label.e_appraisal_my_record.form.label.appraisal_purpose') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">               
                @foreach($purposeOptions as $optionKey => $optionVal)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="purpose" id="purpose{{ $optionKey }}" value="{{ $optionKey }}" @if (old('purpose') == $optionKey) checked="checked" @endif>
                        <label class="form-check-label" for="purpose{{ $optionKey }}">{{ $optionVal }} </label>
                    </div>  
                @endforeach
                @error('purpose')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="pf_score">{{ __('label.e_appraisal_my_record.form.label.criteria_one') }} <span class="font-weight-bold">*</span></label><br>
            <span>{{ __('label.e_appraisal_my_record.form.label.score_range') }} </span>
            <div class="controls pt-2">
                <input class="form-control score-factor @error('pf_score') is-invalid @enderror" name="pf_score" id="pf_score" type="text" value="{{ old('pf_score') }}" placeholder="ex. 2.5"> 
                @error('pf_score')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="qow_score">{{ __('label.e_appraisal_my_record.form.label.criteria_two') }} <span class="font-weight-bold">*</span></label><br>
            <span>{{ __('label.e_appraisal_my_record.form.label.score_range') }}</span>
            <div class="controls pt-2">
                <input class="form-control score-factor @error('qow_score') is-invalid @enderror" name="qow_score" id="qow_score" type="text" value="{{ old('qow_score') }}" placeholder="ex. 2.5"> 
                @error('qow_score')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="wh_score">{{ __('label.e_appraisal_my_record.form.label.criteria_three') }} <span class="font-weight-bold">*</span></label><br>
            <span>{{ __('label.e_appraisal_my_record.form.label.score_range') }}</span>
            <div class="controls pt-2">
                <input class="form-control score-factor @error('wh_score') is-invalid @enderror" name="wh_score" id="wh_score" type="text" value="{{ old('wh_score') }}" placeholder="ex. 2.5"> 
                @error('wh_score')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold">{{ __('label.e_appraisal_my_record.form.label.criteria_two_desc') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                @foreach($appraisalStatus as $statusKey => $statusVal)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="qow_level" id="qow_level{{ $statusKey }}" value="{{ $statusKey }}" @if (old('qow_level') == $statusKey) checked="checked" @endif>
                        <label class="form-check-label" for="qow_level{{ $statusKey }}">{{ $statusVal }} </label>
                    </div>  
                @endforeach
                @error('qow_level')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold">{{ __('label.e_appraisal_my_record.form.label.criteria_three_desc') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                @foreach($appraisalStatus as $statusKey => $statusVal)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="wh_level" id="wh_level{{ $statusKey }}" value="{{ $statusKey }}" @if (old('wh_level') == $statusKey) checked="checked" @endif>
                        <label class="form-check-label" for="wh_level{{ $statusKey }}">{{ $statusVal }} </label>
                    </div>  
                @endforeach
                @error('wh_level')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="qow_comment">{{ __('label.e_appraisal_my_record.form.label.comment') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('qow_comment') is-invalid @enderror" name="qow_comment" id="qow_comment" rows="5">{{ old('qow_comment') }}</textarea>
                @error('qow_comment')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="wh_comment">{{ __('label.e_appraisal_my_record.form.label.comment') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('wh_comment') is-invalid @enderror" name="wh_comment" id="wh_comment" rows="5">{{ old('wh_comment') }}</textarea>
                @error('wh_comment')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="jk_score">{{ __('label.e_appraisal_my_record.form.label.criteria_four') }} <span class="font-weight-bold">*</span></label><br>
            <span>{{ __('label.e_appraisal_my_record.form.label.score_range') }}</span>
            <div class="controls pt-2">
                <input class="form-control score-factor @error('jk_score') is-invalid @enderror" name="jk_score" id="jk_score" type="text" value="{{ old('jk_score') }}" placeholder="ex. 2.5"> 
                @error('jk_score')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="bro_score">{{ __('label.e_appraisal_my_record.form.label.criteria_five') }} <span class="font-weight-bold">*</span></label><br>
            <span>{{ __('label.e_appraisal_my_record.form.label.score_range') }}</span>
            <div class="controls pt-2">
                <input class="form-control score-factor @error('bro_score') is-invalid @enderror" name="bro_score" id="bro_score" type="text" value="{{ old('bro_score') }}" placeholder="ex. 2.5"> 
                @error('bro_score')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold">{{ __('label.e_appraisal_my_record.form.label.criteria_four_desc') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                @foreach($appraisalStatus as $statusKey => $statusVal)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk_level" id="jk_level{{ $statusKey }}" value="{{ $statusKey }}" @if (old('jk_level') == $statusKey) checked="checked" @endif>
                        <label class="form-check-label" for="jk_level{{ $statusKey }}">{{ $statusVal }} </label>
                    </div>
                @endforeach
                @error('jk_level')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold">{{ __('label.e_appraisal_my_record.form.label.criteria_five_desc') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                @foreach($appraisalStatus as $statusKey => $statusVal)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bro_level" id="bro_level{{ $statusKey }}" value="{{ $statusKey }}" @if (old('bro_level') == $statusKey) checked="checked" @endif>
                        <label class="form-check-label" for="bro_level{{ $statusKey }}">{{ $statusVal }} </label>
                    </div>  
                @endforeach
                @error('bro_level')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="jk_comment">{{ __('label.e_appraisal_my_record.form.label.comment') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('jk_comment') is-invalid @enderror" name="jk_comment" id="jk_comment" rows="5">{{ old('jk_comment') }}</textarea>
                @error('jk_comment')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label font-weight-bold" for="bro_comment">{{ __('label.e_appraisal_my_record.form.label.comment') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('bro_comment') is-invalid @enderror" name="bro_comment" id="bro_comment" rows="5">{{ old('bro_comment') }}</textarea>
                @error('bro_comment')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold">{{ __('label.e_appraisal_my_record.form.label.o_progress') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">            
                @foreach($progressStatus as $statusKey => $statusVal)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="overall_progress" id="overall_progress{{ $statusKey }}" value="{{ $statusKey }}" @if (old('overall_progress') == $statusKey) checked="checked" @endif>
                        <label class="form-check-label" for="overall_progress{{ $statusKey }}">{{ $statusVal }} </label>
                    </div>
                @endforeach
                @error('overall_progress')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="progress_comment">{{ __('label.e_appraisal_my_record.form.label.comment') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('progress_comment') is-invalid @enderror" name="progress_comment" id="progress_comment" rows="5">{{ old('progress_comment') }}</textarea>
                @error('progress_comment')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold">{{ __('label.e_appraisal_my_record.form.label.recommendation') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">            
                @foreach($recommendationOptions as $optionKey => $optionVal)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recommendation" id="recommendation{{ $optionKey }}" value="{{ $optionKey }}" @if (old('recommendation') == $optionKey) checked="checked" @endif>
                        <label class="form-check-label" for="recommendation{{ $optionKey }}">{{ $optionVal }} </label>
                    </div>
                @endforeach
                @error('recommendation')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="review_date">{{ __('label.e_appraisal_my_record.form.label.review_on') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <input class="form-control @error('review_date') is-invalid @enderror" name="review_date" id="review_date" type="text" value="{{ old('review_date') }}"> 
                @error('review_date')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="final_comment">{{ __('label.e_appraisal_my_record.form.label.f_comment') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('final_comment') is-invalid @enderror" name="final_comment" id="final_comment" rows="5">{{ old('final_comment') }}</textarea>
                @error('final_comment')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <hr class="mb-3">

    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label font-weight-bold" for="shared">{{ __('label.e_appraisal_my_record.form.label.share_appraisal') }} </label>
            <div class="controls">
                <select class="form-control custom-select @error('shared') is-invalid @enderror" name="shared[]" id="shared" multiple></select>
                @error('shared')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <input type="hidden" name="total_score" id="total_score">

    <div class="row">
        <div class="col-md-6">
            <h5>
                <strong>
                    TOTAL SCORE: <span id="display_score">0</span> / 5
                </strong>
            </h5>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a class="btn btn-secondary font-weight-bold px-3 mr-2" href="{{ route('appraisal.my.record.new.employee.index') }}">
                    <svg class="c-icon">
                    <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
                    </svg>
                    {{ __('label.global.form.button.back') }}
                </a>     
                <button class="btn btn-success font-weight-bold px-3" type="submit">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-task') }}"></use>
                    </svg>
                    {{ __('label.global.form.button.submit') }}
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
  <!-- select2 js dependency -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- Page js codes -->
  <script>   
    $( document ).ready(function() {

      // return formatted email for customer drop down
      function concatenateDesignation ($designation) {
        return ' ( ' + $designation + ' )';
      }

      // compute total score on change event
      $('.score-factor').change(function() {
        var pf = Number($('#pf_score').val());
        var qow = Number($('#qow_score').val());
        var wh = Number($('#wh_score').val());
        var jk = Number($('#jk_score').val());
        var bro = Number($('#bro_score').val());
        var total = (pf + qow + wh + jk + bro) / 5;

        $('#display_score').text(total);
        $('#total_score').val(total);
      });

      // init Start of Service field
      $reviewPeriodFrom = $('#review_period_from').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      // init End of Service field
      $reviewPeriodTo = $('#review_period_to').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      // init Date field
      $reviewDate = $('#review_date').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      // init employee select2
      $('#employee_id').select2({
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

      $('#employee_id').on('select2:selecting', function (e) {
        var data = e.params.args.data;
        data.text = data.name;
      }); 

      // init shared to employee select2
      $('#shared').select2({
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

      $('#appraisalForm').submit(function (event) {
        $(this).find(':submit').prop('disabled', true);
      });
    });
  </script>
@endpush