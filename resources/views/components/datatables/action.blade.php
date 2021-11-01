@if (array_key_exists ('show' , $actionRoutes))
<a class="dt-action-btn text-primary" href="{{ route($actionRoutes['show'] , [$itemSlug => $itemSlugValue]) }}" title="{{ __('label.global.datatable.action.title.show') }}">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-magnifying-glass') }}"></use>
    </svg>
</a>
|
@endif
@if (array_key_exists ('edit' , $actionRoutes))
<a class="dt-action-btn text-primary" href="{{ route($actionRoutes['edit'] , [$itemSlug => $itemSlugValue]) }}" title="{{ __('label.global.datatable.action.title.edit') }}">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-pencil') }}"></use>
    </svg>
</a>
|
@endif
@if (array_key_exists ('delete' , $actionRoutes))
<a class="dt-action-btn text-danger" data-toggle="modal" data-target="#delete_modal" data-id="{{ $itemSlugValue }}" id="delete" href="" title="{{ __('label.global.datatable.action.title.delete') }}">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-trash') }}"></use>
    </svg>
</a>
@endif