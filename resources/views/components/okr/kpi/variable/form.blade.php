@if (!empty($kpiVariable))
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label pl-1" for="variable_kpi">{{ __('label.kpi_variable.form.label.variable_kpi') }} <span class="font-weight-bold">*</span></label>
                <div class="controls">
                    <textarea class="form-control @error('variable_kpi') is-invalid @enderror" name="variable_kpi" id="variable_kpi" rows="5">{{ old('variable_kpi', $kpiVariable->variable_kpi) }}</textarea>
                    @error('variable_kpi')
                    <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label pl-1" for="result">{{ __('label.kpi_variable.form.label.result') }} </label>
                <div class="controls">
                    <textarea class="form-control @error('result') is-invalid @enderror" name="result" id="result" rows="5">{{ old('result', $kpiVariable->result) }}</textarea>
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
                        <label class="col-form-label pl-1" for="target_date">{{ __('label.kpi_variable.form.label.target_date') }} <span class="font-weight-bold">*</span></label>
                        <div class="controls">
                            <input class="form-control @error('target_date') is-invalid @enderror" name="target_date" id="target_date" type="text" value="{{ old('target_date', $kpiVariable->target_date->format('d/m/Y')) }}">
                            @error('target_date')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label pl-1" for="status">{{ __('label.kpi_variable.form.label.status') }} <span class="font-weight-bold">*</span></label>
                        <div class="controls">
                            <select class="form-control custom-select @error('status') is-invalid @enderror" name="status" id="status">
                                @foreach ($kpiVariable->getCompletedStatus() as $statusKey => $statusValue)
                                    <option value="{{ $statusValue }}" @if(old('status', $kpiVariable->status) == $statusValue) selected @endif>
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
                <label class="col-form-label pl-1" for="feedback">{{ __('label.kpi_variable.form.label.feedback') }} </label>
                <div class="controls">
                    <textarea class="form-control @error('feedback') is-invalid @enderror" name="feedback" id="feedback" rows="5">{{ old('feedback', $kpiVariable->feedback) }}</textarea>
                    @error('feedback')
                    <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div> 
    </div>

@if (auth()->user()->isDepartmentHead())
</div>

<hr class="mb-3">
<div class="px-4">{{ __('label.kpi_variable.form.header.rating') }}</div>
<hr class="mt-3 mb-0">

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label pl-1" for="month">{{ __('label.kpi_main.form.label.month') }} </label>
                        <div class="controls">
                            <select class="form-control custom-select @error('kpi_ratings.month') is-invalid @enderror" name="kpi_ratings[month]" id="month">            
                                @foreach ($kpiVariable->getMonthList() as $monthKey => $monthValue)
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
                    <textarea class="form-control @error('kpi_ratings.manager_comment') is-invalid @enderror" name="kpi_ratings[manager_comment]" id="manager_comment" rows="5">{{ old('kpi_ratings.manager_comment', !empty($kpiVariable->kpiratings[0]) ? $kpiVariable->kpiratings[0]->manager_comment : '') }}</textarea>
                    @error('kpi_ratings.manager_comment')
                    <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endif 

@else 
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label pl-1" for="variable_kpi">{{ __('label.kpi_variable.form.label.variable_kpi') }} <span class="font-weight-bold">*</span></label>
                <div class="controls">
                    <textarea class="form-control @error('variable_kpi') is-invalid @enderror" name="variable_kpi" id="variable_kpi" rows="5">{{ old('variable_kpi') }}</textarea>
                    @error('variable_kpi')
                    <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
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
                </div>
                <div class="col-md-6">
                    <div class="form-group">
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
            </div>
            <div class="form-row">     
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label pl-1" for="target_date">{{ __('label.kpi_variable.form.label.target_date') }} <span class="font-weight-bold">*</span></label>
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