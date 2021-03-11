<div class="form-row">
    <div class="form-group col-md-12">
        <label class="col-form-label pl-1" for="variable_kpi">variable{{ __('label.kpi_main.form.label.main_kpi') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('variable_kpi') is-invalid @enderror" name="variable_kpi" id="variable_kpi" rows="4">{{ old('variable_kpi', !empty($kpiVariable) ? $kpiVariable->variable_kpi : '') }}</textarea>
            @error('variable_kpi')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div> 
</div>

@if (!empty($kpiVariable))

<div class="form-row"> 
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="result">result{{ __('label.kpi_main.form.label.main_kpi') }} <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('result') is-invalid @enderror" name="result" id="result" rows="4">{{ old('result', $kpiVariable->result) }}</textarea>
            @error('result')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div> 
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="feedback">employee feedback{{ __('label.kpi_main.form.label.main_kpi') }} <span class="font-weight-bold">*</span></label>
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
        <label class="col-form-label pl-1" for="target_date">Target Date{{ __('label.kpi_main.form.label.status') }} </label>
        <div class="controls">
            <input class="form-control @error('target_date') is-invalid @enderror" name="target_date" id="target_date" type="text" value="{{ old('target_date', $kpiVariable->target_date) }}">
            @error('target_date')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="status">completed{{ __('label.kpi_main.form.label.status') }} </label>
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
        <label class="col-form-label pl-1" for="variable_quarter">Quarter{{ __('label.kpi_main.form.label.status') }} </label>
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
        <label class="col-form-label pl-1" for="variable_year">Year{{ __('label.kpi_main.form.label.status') }} </label>
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
        <label class="col-form-label pl-1" for="target_date">Target Date{{ __('label.kpi_main.form.label.status') }} </label>
        <div class="controls">
            <input class="form-control @error('target_date') is-invalid @enderror" name="target_date" id="target_date" type="text" value="{{ old('target_date', date('d/m/Y')) }}">
            @error('target_date')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

@endif

{{-- @if (!empty($kpiMain))
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="q1">{{ __('label.kpi_main.form.label.q1') }} </label>
        <div class="controls">
            <textarea class="form-control @error('q1') is-invalid @enderror" name="q1" id="q1" rows="4">{{ old('q1', !empty($kpiMain) ? $kpiMain->q1 : '') }}</textarea>
            @error('q1')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="q2">{{ __('label.kpi_main.form.label.q2') }} </label>
        <div class="controls">
            <textarea class="form-control @error('q2') is-invalid @enderror" name="q2" id="q2" rows="4">{{ old('q2', !empty($kpiMain) ? $kpiMain->q2 : '') }}</textarea>
            @error('q2')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="q3">{{ __('label.kpi_main.form.label.q3') }} </label>
        <div class="controls">
            <textarea class="form-control @error('q3') is-invalid @enderror" name="q3" id="q3" rows="4">{{ old('q3', !empty($kpiMain) ? $kpiMain->q3 : '') }}</textarea>
            @error('q3')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="q4">{{ __('label.kpi_main.form.label.q4') }} </label>
        <div class="controls">
            <textarea class="form-control @error('q4') is-invalid @enderror" name="q4" id="q4" rows="4">{{ old('q4', !empty($kpiMain) ? $kpiMain->q4 : '') }}</textarea>
            @error('q4')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="feedback">{{ __('label.kpi_main.form.label.feedback') }} </label>
        <div class="controls">
            <textarea class="form-control @error('feedback') is-invalid @enderror" name="feedback" id="feedback" rows="4">{{ old('feedback', !empty($kpiMain) ? $kpiMain->feedback : '') }}</textarea>
            @error('feedback')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="status">{{ __('label.kpi_main.form.label.status') }} </label>
        <div class="controls">
            <select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
                @foreach ($kpiMain->getCompletedStatus() as $statusKey => $statusValue)
                    <option value="{{ $statusValue }}" @if($kpiMain->status == $statusValue) selected @endif>
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

@if (auth()->user()->isDepartmentHead())
<hr class="mt-3">
<h5 class="font-weight-bold text-center">{{ __('label.kpi_main.form.header.rating') }}</h5>
<hr class="mb-3">

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="month">{{ __('label.kpi_main.form.label.month') }} </label>
        <div class="controls">
            <select class="form-control custom-select @error('kpi_ratings.month') is-invalid @enderror" name="kpi_ratings[month]" id="month">            
                @foreach ($kpiMain->getMonthList() as $monthKey => $monthValue)
                    <option value="{{ $monthKey }}">
                        {{ ucfirst($monthValue) }}
                    </option>
                @endforeach
            </select>
            @error('kpi_ratings.month')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label pl-1" for="rating">{{ __('label.kpi_main.form.label.rating') }} </label>
        <div class="controls">
            <select class="form-control custom-select @error('kpi_ratings.rating') is-invalid @enderror" name="kpi_ratings[rating]" id="rating">          
                <option value="" selected>{{ __('label.kpi_main.form.placeholder.rating') }}</option>          
                <option value="1">{{ __('label.global.numeric.1') }}</option>
                <option value="2">{{ __('label.global.numeric.2') }}</option>
                <option value="3">{{ __('label.global.numeric.3') }}</option>
                <option value="4">{{ __('label.global.numeric.4') }}</option>
                <option value="5">{{ __('label.global.numeric.5') }}</option>
            </select>  
            @error('kpi_ratings.rating')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror    
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label class="col-form-label pl-1" for="manager_comment">{{ __('label.kpi_main.form.label.manager_comment') }} </label>
        <div class="controls">
            <textarea class="form-control @error('kpi_ratings.manager_comment') is-invalid @enderror" name="kpi_ratings[manager_comment]" id="manager_comment" rows="4">{{ old('kpi_ratings.manager_comment', !empty($kpiMain->kpiratings[0]) ? $kpiMain->kpiratings[0]->manager_comment : '') }}</textarea>
            @error('kpi_ratings.manager_comment')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
@endif 

@endif  --}}