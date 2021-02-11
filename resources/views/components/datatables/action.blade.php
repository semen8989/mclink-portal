<a class="dt-action-btn" href="{{ route($editRouteName , [$editRouteSlug => $editRouteSlugValue]) }}" title="Edit">
    <svg class="c-icon">
        <use style="background-color: blue;" xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
    </svg>
</a>
|
<a class="dt-action-btn text-danger" data-toggle="modal" data-target="#delete_modal" data-id="" id="delete" href="" title="Delete">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
    </svg>
</a> 