<div class="form-row">
    <div class="form-group col-md-12">
        <label class="col-form-label" for="main_kpi">Main Goals KPI <span class="font-weight-bold">*</span></label>
        <div class="controls">
            <textarea class="form-control @error('main_kpi') is-invalid @enderror" name="main_kpi" id="main_kpi" rows="8">{{ old('main_kpi', !empty($kpiMain) ? $kpiMain->main_kpi : '') }}</textarea>
            @error('main_kpi')
            <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>