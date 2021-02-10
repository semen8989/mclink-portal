<a href="{{ route($editRouteName , [$editRouteSlug => $editRouteSlugValue]) }}" title="Edit">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
    </svg>
</a>
|
<a data-toggle="modal" data-target="#delete_modal" data-id="" id="delete" href="" title="Delete" class="text-danger">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
    </svg>
</a> 