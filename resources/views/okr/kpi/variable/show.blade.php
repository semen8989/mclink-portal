@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.kpi_variable.title.show') }}</div>
    <div class="card-body px-5">
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_variable.form.label.variable_kpi') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiVariable->variable_kpi ?? __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_variable.form.label.result') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiVariable->result ?? __('label.global.text.na') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_variable.form.label.target_date') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiVariable->target_date->format('d/m/Y') ?? __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-3">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_variable.form.label.status') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiVariable->getStringStatus() ?? __('label.global.text.na') }}</p>
            </div>       
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_variable.form.label.feedback') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiVariable->feedback ?? __('label.global.text.na') }}</p>
            </div>
        </div> 
        
    @if (auth()->user()->isDepartmentHead())
    </div>
    
    <hr class="mb-3">
    <div class="px-4">{{ __('label.kpi_variable.form.header.rating') }}</div>
    <hr class="mt-3 mb-0">

    <div class="card-body px-5">
        <div class="row">
            <div class="col-md-3">
                <p class="guest-form-label font-weight-bold mb-2">{{ __('label.kpi_variable.form.label.month') }}</p>
                <div class="controls mb-4">
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
            <div class="col-md-3">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_variable.form.label.rating') }}</p>
                <p class="guest-form-data mb-4" id="rating">{{ __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_variable.form.label.manager_comment') }}</p>
                <p class="guest-form-data mb-4" id="comment">{{ __('label.global.text.na') }}</p>
            </div>
        </div>  
    @endif 

        <div class="row float-right">
            <div class="col-md-12">
                <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('okr.kpi.variables.index') }}">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
                    </svg>
                    {{ __('label.global.form.button.back') }}
                </a>
                <a id="editBtn" class="btn btn-primary px-3 font-weight-bold" href="{{ route('okr.kpi.variables.edit', [$kpiVariable->id]) }}">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
                    </svg>
                    {{ __('label.global.form.button.edit') }}
                </a>
            </div>
        </div>

    </div>
@stop

@push('scripts')
    <!-- Page js codes -->
    <script>
        $( document ).ready(function() {
            $('#month').change(function() {
                $.ajax({
                    url: "{{ route('get.kpi.variable.rating', ['kpiVariable' => $kpiVariable->id]) }}",
                    type: 'get',
                    data: { 
                        month: $(this).val()
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#editBtn').attr('href', function(index, attr) {
                            return attr.split("?")[0] + '?month=' + $("#month").val();
                        });
                        $('#rating').text(result.length > 0 ? result[0].rating : "{{ __('label.global.text.na') }}");
                        $('#comment').text(result.length > 0 ? result[0].manager_comment : "{{ __('label.global.text.na') }}");
                    }
                });
            });

            @if($kpiVariable->kpiratings->isEmpty())
                $('#month').val('{{ date("n") }}');
                $('#rating').text("{{ __('label.global.text.na') }}");
                $('#comment').text("{{ __('label.global.text.na') }}");
            @else
                @foreach ($kpiVariable->kpiratings as $kpirating)
                    @if($kpirating->month == date('n'))           
                        $('#month').val('{{ $kpirating->month }}'); 
                        $('#rating').text('{{ $kpirating->rating }}');
                        $('#comment').text('{{ $kpirating->manager_comment }}');
                    @endif
                @endforeach
            @endif
        });
    </script>
@endpush
