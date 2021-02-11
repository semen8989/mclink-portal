<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-lg-down-none">
            <img class="c-sidebar-brand-full" src="{{ asset('assets/brand/logo.png') }}" width="135" height="36"
                alt="McLink Logo">
            <img class="c-sidebar-brand-minimized" src="{{ asset('assets/brand/logo-s.png') }}" width="37" height="28"
                alt="McLink Logo">
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('home') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-speedometer') }}"></use>
                    </svg> Dashboard</a></li>
            </li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ (request()->segment(1) == strtolower(__('label.organizations'))) ? 'c-active c-show' : '' }}"><a
              class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
              <svg class="c-sidebar-nav-icon">
                  <use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-layers') }}"></use>
              </svg> Organizations</a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.companies'))) ? 'c-active c-show' : '' }}" href="{{ route('companies.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.company') }} </a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.departments'))) ? 'c-active c-show' : '' }}" href="{{ route('departments.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.department') }} </a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.designations'))) ? 'c-active c-show' : '' }}" href="{{ route('designations.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.designation') }} </a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.announcements'))) ? 'c-active c-show' : '' }}" href="{{ route('announcements.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.announcement') }}</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.policies'))) ? 'c-active c-show' : '' }}" href="{{ route('policies.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.company_policy') }}</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.holidays'))) ? 'c-active c-show' : '' }}" href="{{ route('holidays.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.holidays') }}</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.locations'))) ? 'c-active c-show' : '' }}" href="{{ route('locations.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.location') }}</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link {{ (request()->segment(2) == strtolower(__('label.office_shifts'))) ? 'c-active c-show' : '' }}" href="{{ route('office_shifts.index') }}"><span
                        class="c-sidebar-nav-icon"></span> {{ __('label.shifts') }}</a></li>
                </ul>
            </li>
        </ul>
        
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
    </div>
