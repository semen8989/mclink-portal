    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="col-form-label pl-1" for="main_kpi">{{ __('label.kpi_main.form.label.main_kpi') }} <span class="font-weight-bold">*</span></label>
            <div class="controls">
                <textarea class="form-control @error('main_kpi') is-invalid @enderror" name="main_kpi" id="main_kpi" rows="4">{{ old('main_kpi', !empty($kpiMain) ? $kpiMain->main_kpi : '') }}</textarea>
                @error('main_kpi')
                <span class="help-block text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div> 
    </div>

@if (!empty($kpiMain))
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
</div>

<hr class="mb-3">
<div class="px-4">{{ __('label.kpi_main.form.header.rating') }}</div>
<hr class="mt-3 mb-0">

<div class="card-body">
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

@endif 