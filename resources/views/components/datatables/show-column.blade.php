@if (empty($columnData))
<a class="dt-action-btn text-primary" href="{{ route($showRouteName , [$showRouteSlug => $showRouteSlugValue]) }}" title="{{ __('label.global.datatable.action.title.show') }}">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-magnifying-glass') }}"></use>
    </svg>
</a>
@else
<a href="{{ route($showRouteName, [$showRouteSlug => $showRouteSlugValue]) }}">
    {{ Str::of($columnData)->limit(50) }}
</a>
@endif
