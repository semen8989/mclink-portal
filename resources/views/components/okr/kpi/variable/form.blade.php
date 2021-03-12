<div class="form-row">
    <div class="form-group col-md-12">
        <label class="col-form-label pl-1" for="variable_kpi">{{ __('label.kpi_variable.form.label.variable_kpi') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('variable_kpi') is-invalid @enderror" name="variable_kpi" id="variable_kpi" rows="6">{{ old('variable_kpi', !empty($kpiVariable) ? $kpiVariable->variable_kpi : '') }}</textarea>
            @error('variable_kpi')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div> 
</div>

@if (!empty($kpiVariable))

<div class="form-row"> 
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="result">{{ __('label.kpi_variable.form.label.result') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('result') is-invalid @enderror" name="result" id="result" rows="4">{{ old('result', $kpiVariable->result) }}</textarea>
            @error('result')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div> 
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="feedback">{{ __('label.kpi_variable.form.label.feedback') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('feedback') is-invalid @enderror" name="feedback" id="feedback" rows="4">{{ old('feedback', $kpiVariable->feedback) }}</textarea>
            @error('feedback')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div> 
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="target_date">{{ __('label.kpi_variable.form.label.target_date') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <input class="form-control @error('target_date') is-invalid @enderror" name="target_date" id="target_date" type="text" value="{{ old('target_date', $kpiVariable->target_date) }}">
            @error('target_date')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="status">{{ __('label.kpi_variable.form.label.status') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
                @foreach ($kpiVariable->getCompletedStatus() as $statusKey => $statusValue)
                    <option value="{{ $statusValue }}" @if($kpiVariable->status == $statusValue) selected @endif>
                        {{ ucfirst($statusKey) }}
                    </option>
                @endforeach
            </select>  
            @error('status')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror    
        </div>
    </div>
</div>

@else 

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="variable_quarter">{{ __('label.kpi_variable.form.label.variable_quarter') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <select class="form-control custom-select @error('variable_quarter') is-invalid @enderror" name="variable_quarter" id="variable_quarter">
                @foreach (Arr::except($quarterList, [0]) as $quarterKey => $quarterValue)
                    <option value="{{ $quarterKey }}" @if (old('variable_quarter', '1') == $quarterKey) selected @endif>{{ $quarterValue }}</option>
                @endforeach
            </select>  
            @error('variable_quarter')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror    
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="variable_year">{{ __('label.kpi_variable.form.label.variable_year') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <select class="form-control custom-select @error('variable_year') is-invalid @enderror" name="variable_year" id="variable_year">
                @foreach ($yearList as $year)
                    <option value="{{ $year }}" @if (old('variable_year', date('Y')) == $year) selected @endif>{{ $year }}</option>
                @endforeach
            </select>  
            @error('variable_year')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror    
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="target_date">{{ __('label.kpi_variable.form.label.target_date') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <input class="form-control @error('target_date') is-invalid @enderror" name="target_date" id="target_date" type="text" value="{{ old('target_date', date('d/m/Y')) }}">
            @error('target_date')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

@endif