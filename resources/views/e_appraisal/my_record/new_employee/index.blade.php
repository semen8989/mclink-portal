@extends('layout.master')

@section('content')
    <div class="card-header">{{ __('label.e_appraisal_my_record.title.new_index') }}</div>
    <div class="card-body">
        <div class="col-md-12 mb-3">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="newTabLink" class="nav-link active" href="{{ route('appraisal.my.record.new.employee.index') }}" role="tab" aria-controls="main">
                            {{ __('label.global.tab.new_employee') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="regularTabLink" class="nav-link" href="{{ route('appraisal.my.record.regular.employee.index') }}" role="tab" aria-controls="variable">
                            {{ __('label.global.tab.regular_employee') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.delete_modal')
@stop

@push('stylesheet')
    <!-- jquery datatable button and responsive extension css dependency -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
@endpush

@push('scripts')
    <!-- jquery datatable button and responsive extension js dependency -->
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    <!-- laravel datatable button plugin js dependency -->
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    <!-- dt script-->
    {!! $dataTable->scripts() !!}

    <!-- Page js codes -->
    <script>
        $(document).on('click','#delete',function() {
            let id = $(this).attr('data-id');
            var url = "{{ route('appraisal.my.record.new.employee.destroy', ':id') }}"
            url = url.replace(':id', id)
            $('#delete_form').attr('action',url);
        });

        $('#delete_form').submit(function (event) {
            $(this).find(':submit').prop('disabled', true);
        });

        $( document ).ready(function() {
            var newIcon = '<svg class="c-icon mr-2"><use xlink:href="' + 
                '{{ asset("assets/icons/sprites/free.svg#cil-plus") }}' + 
                '"></use></svg>';

            $('.buttons-create').find('span').html(newIcon + "{{ __('label.global.datatable.button.new') }}");

            $('.buttons-create').click(function () {
                location.href = "{{ route("appraisal.my.record.new.employee.create") }}";
            })
        });
        
    </script>
@endpush
