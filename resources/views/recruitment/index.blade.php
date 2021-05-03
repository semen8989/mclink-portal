@extends('layout.master')

@section('content')
    <div class="card-header">List</div>
    <div class="card-body">
        <table class="table table-responsive-sm">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Position Applying For</th>
                <th>Gender</th>
            </tr>
            <?php $i = 1; ?>
            @foreach($collection as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><a href="{{ route('recruitment.show',$item['id']) }}">{{ $item['answers']['15']['answer']['first'].' '.$item['answers']['15']['answer']['last'] }}</a></td>
                    <td>{{ $item['answers']['11']['answer'] }}</td>
                    <td>{{ $item['answers']['16']['answer'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
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
    
@endpush

