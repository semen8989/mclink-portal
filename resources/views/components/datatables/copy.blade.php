<a class="dt-action-btn {{ $isSend ? 'copy-btn text-success' : 'text-muted' }}" href="javascript:void(0);"  data-placement="top" data-trigger="click" title="{{ __('label.global.datatable.text.copy_link') }}" data-clipboard-text="{{ $isSend ? route($acknowledgementRouteName , [$paramName => $paramValue]) : '' }}">
    <svg class="c-icon">
        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-copy') }}"></use>
    </svg>
</a>