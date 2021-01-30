
  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        <img class="c-sidebar-brand-full" src="{{ asset('assets/brand/logo.png') }}" width="135" height="36" alt="McLink Logo">
        <img class="c-sidebar-brand-minimized" src="{{ asset('assets/brand/logo-s.png') }}" width="37" height="28" alt="McLink Logo">
      </div>
      <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('dashboard') }}">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-speedometer') }}"></use>
          </svg> Dashboard</a></li>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('service.form.index') }}">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-notes') }}"></use>
          </svg> MPS Service Report</a></li>
        </li>
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>