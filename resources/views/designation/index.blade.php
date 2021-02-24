@extends('layout.master')

@section('content')
<div class="card-header">{{ __('label.designation_list') }}</div>
<div class="card-body">
    {!! $dataTable->table() !!}
</div>
@include('layout.delete_modal')
@stop

@push('scripts')
    <script>
        $(document).on('click','#delete',function(){
            let id = $(this).attr('data-id');
            var url = '{{ route("designations.destroy",":id") }}'
            url = url.replace(':id',id)
            $('#delete_form').attr('action',url);
        });
    </script>
@endpush