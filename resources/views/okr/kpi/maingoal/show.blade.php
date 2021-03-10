@extends('layout.master')

@section('content')
    <h5 class="card-header font-weight-bold text-center">{{ __('label.kpi_main.form.header.main') }}</h5>
    <div class="card-body px-5">
        <div class="row">
            <div class="col-md-12">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.main_kpi') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiMain->main_kpi ?? __('label.global.text.na') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.q1') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiMain->q1 ?? __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.q2') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiMain->q2 ?? __('label.global.text.na') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.q3') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiMain->q3 ?? __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.q4') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiMain->q4 ?? __('label.global.text.na') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.feedback') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiMain->feedback ?? __('label.global.text.na') }}</p>
            </div>
            <div class="col-md-6">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.status') }}</p>
                <p class="guest-form-data mb-4">{{ $kpiMain->getStringStatus() }}</p>
            </div>
        </div>   
        
        @if (auth()->user()->isDepartmentHead())
        <hr>
        <h5 class="font-weight-bold text-center">{{ __('label.kpi_main.form.header.rating') }}</h5>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <p class="guest-form-label font-weight-bold mb-2">{{ __('label.kpi_main.form.label.month') }}</p>
                <div class="controls mb-4">
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
            <div class="col-md-4 offset-md-2">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.rating') }}</p>
                <p class="guest-form-data mb-4" id="rating">{{ __('label.global.text.na') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="guest-form-label font-weight-bold mb-1">{{ __('label.kpi_main.form.label.manager_comment') }}</p>
                <p class="guest-form-data mb-4" id="comment">{{ __('label.global.text.na') }}</p>
            </div>
        </div>   
        @endif 

        <div class="row float-right">
            <div class="col-md-12">
                <a class="btn btn-secondary px-3 mr-1 font-weight-bold" href="{{ route('okr.kpi.maingoals.index') }}">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-arrow-circle-left') }}"></use>
                    </svg>
                    {{ __('label.global.form.button.back') }}
                </a>
                <a class="btn btn-primary px-3 font-weight-bold" href="{{ route('okr.kpi.maingoals.edit', [$kpiMain->id]) }}">
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
                    url: "{{ route('get.kpi.main.rating', ['kpiMain' => $kpiMain->id]) }}",
                    type: 'get',
                    data: { 
                        month: $(this).val()
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#rating').text(result.length > 0 ? result[0].rating : "{{ __('label.global.text.na') }}");
                        $('#comment').text(result.length > 0 ? result[0].manager_comment : "{{ __('label.global.text.na') }}");
                    }
                });
            });

            @if($kpiMain->kpiratings->isEmpty())
                $('#month').val('{{ date("n") }}');
                $('#rating').text("{{ __('label.global.text.na') }}");
                $('#comment').text("{{ __('label.global.text.na') }}");
            @else
                @foreach ($kpiMain->kpiratings as $kpirating)
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
