@if (!empty($kpiObjective))
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label pl-1" for="objective_kpi">{{ __('label.kpi_objective.form.label.objective_kpi') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('objective_kpi') is-invalid @enderror" name="objective_kpi" id="objective_kpi" rows="5">{{ old('objective_kpi', $kpiObjective->objective_kpi) }}</textarea>
                @error('objective_kpi')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div> 
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label pl-1" for="result">{{ __('label.kpi_objective.form.label.result') }} </label>
            <div class="controls">
                <textarea class="form-control @error('result') is-invalid @enderror" name="result" id="result" rows="5">{{ old('result', $kpiObjective->result) }}</textarea>
                @error('result')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label pl-1" for="target_date">{{ __('label.kpi_objective.form.label.target_date') }} <span class="font-weight-bold">*</span></label>
                    <div class="controls">
                        <input class="form-control @error('target_date') is-invalid @enderror" name="target_date" id="target_date" type="text" value="{{ old('target_date', $kpiObjective->target_date->format('d/m/Y')) }}">
                        @error('target_date')
                        <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label pl-1" for="status">{{ __('label.kpi_objective.form.label.status') }} <span class="font-weight-bold">*</span></label>
                    <div class="controls">
                        <select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
                            @foreach ($kpiObjective->getCompletedStatus() as $statusKey => $statusValue)
                                <option value="{{ $statusValue }}" @if(old('status', $kpiObjective->status) == $statusValue) selected @endif>
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
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label pl-1" for="feedback">{{ __('label.kpi_objective.form.label.feedback') }} </label>
            <div class="controls">
                <textarea class="form-control @error('feedback') is-invalid @enderror" name="feedback" id="feedback" rows="5">{{ old('feedback', $kpiObjective->feedback) }}</textarea>
                @error('feedback')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div> 
</div>

@if (auth()->user()->isDepartmentHead())
<hr class="mt-3">
<h5 class="font-weight-bold text-center">{{ __('label.kpi_main.form.header.rating') }}</h5>
<hr class="mb-3">

<div class="row">
    <div class="col-md-6">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label pl-1" for="month">{{ __('label.kpi_main.form.label.month') }} </label>
                    <div class="controls">
                        <select class="form-control custom-select @error('kpi_ratings.month') is-invalid @enderror" name="kpi_ratings[month]" id="month">            
                            @foreach ($kpiObjective->getMonthList() as $monthKey => $monthValue)
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
            </div>
            <div class="col-md-6">
                <div class="form-group">
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
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label pl-1" for="manager_comment">{{ __('label.kpi_main.form.label.manager_comment') }} </label>
            <div class="controls">
                <textarea class="form-control @error('kpi_ratings.manager_comment') is-invalid @enderror" name="kpi_ratings[manager_comment]" id="manager_comment" rows="5">{{ old('kpi_ratings.manager_comment', !empty($kpiObjective->kpiratings[0]) ? $kpiObjective->kpiratings[0]->manager_comment : '') }}</textarea>
                @error('kpi_ratings.manager_comment')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    
</div>
@endif 

@else 

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label pl-1" for="objective_kpi">{{ __('label.kpi_objective.form.label.objective_kpi') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('objective_kpi') is-invalid @enderror" name="objective_kpi" id="objective_kpi" rows="5">{{ old('objective_kpi') }}</textarea>
                @error('objective_kpi')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div> 
    <div class="col-md-6">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label pl-1" for="objective_quarter">{{ __('label.kpi_objective.form.label.objective_quarter') }} <span class="font-weight-bold">*</span></label>
                    <div class="controls">
                        <select class="form-control custom-select @error('objective_quarter') is-invalid @enderror" name="objective_quarter" id="objective_quarter">
                            @foreach (Arr::except($quarterList, [0]) as $quarterKey => $quarterValue)
                                <option value="{{ $quarterKey }}" @if (old('objective_quarter', '1') == $quarterKey) selected @endif>{{ $quarterValue }}</option>
                            @endforeach
                        </select>  
                        @error('objective_quarter')
                        <span class="help-block text-danger">{{ $message }}</span>
                        @enderror    
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label pl-1" for="objective_year">{{ __('label.kpi_objective.form.label.objective_year') }} <span class="font-weight-bold">*</span></label>
                    <div class="controls">
                        <select class="form-control custom-select @error('objective_year') is-invalid @enderror" name="objective_year" id="objective_year">
                            @foreach ($yearList as $year)
                                <option value="{{ $year }}" @if (old('objective_year', date('Y')) == $year) selected @endif>{{ $year }}</option>
                            @endforeach
                        </select>  
                        @error('objective_year')
                        <span class="help-block text-danger">{{ $message }}</span>
                        @enderror    
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">     
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label pl-1" for="target_date">{{ __('label.kpi_objective.form.label.target_date') }} <span class="font-weight-bold">*</span></label>
                    <div class="controls">
                        <input class="form-control @error('target_date') is-invalid @enderror" name="target_date" id="target_date" type="text" value="{{ old('target_date', date('d/m/Y')) }}">
                        @error('target_date')
                        <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif