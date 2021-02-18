<a class="dt-action-btn text-primary" href="{{ route($editRouteName , [$itemSlug => $itemSlugValue]) }}" title="Edit">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
    </svg>
</a>
|
<a class="dt-action-btn text-danger" data-toggle="modal" data-target="#delete_modal" data-id="{{ $itemSlugValue }}" id="delete" href="" title="Delete">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
    </svg>
</a> 