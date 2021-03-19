@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.kpi_objective.title.show') }}</div>
    <div class="card-body px-5">
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_objective.form.label.objective_kpi') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiObjective->objective_kpi ?? __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_objective.form.label.result') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiObjective->result ?? __('label.global.text.na') }}</p>
            </div>
        </div>
        <div class="row">

                    <div class="col-md-3">
                        <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_objective.form.label.target_date') }}</p>
                        <p class="guest-form-data mb-4">{{ $kpiObjective->target_date->format('d/m/Y') ?? __('label.global.text.na') }}</p>
                    </div>

                    <div class="col-md-3">
                        <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_objective.form.label.status') }}</p>
                        <p class="guest-form-data mb-4">{{ $kpiObjective->getStringStatus() ?? __('label.global.text.na') }}</p>
                    </div>       
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_objective.form.label.feedback') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiObjective->feedback ?? __('label.global.text.na') }}</p>
            </div>
        </div> 
        
        @if (auth()->user()->isDepartmentHead())
        <hr>
        <h5 class="font-weight-bold text-center">{{ __('label.kpi_objective.form.header.rating') }}</h5>
        <hr>

        <div class="row">
            <div class="col-md-3">
                <p class="guest-form-label font-weight-bold mb-2">{{ __('label.kpi_objective.form.label.month') }}</p>
                <div class="controls mb-4">
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
            <div class="col-md-3">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_objective.form.label.rating') }}</p>
                <p class="guest-form-data mb-4" id="rating">{{ __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_objective.form.label.manager_comment') }}</p>
                <p class="guest-form-data mb-4" id="comment">{{ __('label.global.text.na') }}</p>
            </div>
        </div>
        <div class="row">
            
        </div>   
        @endif 

        <div class="row float-right">
            <div class="col-md-12">
                <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('okr.kpi.objectives.index') }}">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
                    </svg>
                    {{ __('label.global.form.button.back') }}
                </a>
                <a id="editBtn" class="btn btn-primary px-3 font-weight-bold" href="{{ route('okr.kpi.objectives.edit', [$kpiObjective->id]) }}">
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
                    url: "{{ route('get.kpi.objective.rating', ['kpiObjective' => $kpiObjective->id]) }}",
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

            @if($kpiObjective->kpiratings->isEmpty())
                $('#month').val('{{ date("n") }}');
                $('#rating').text("{{ __('label.global.text.na') }}");
                $('#comment').text("{{ __('label.global.text.na') }}");
            @else
                @foreach ($kpiObjective->kpiratings as $kpirating)
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
