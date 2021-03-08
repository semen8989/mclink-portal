<div class="c-wrapper c-fixed-components">
	<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
		<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
			<svg class="c-icon c-icon-lg">
				<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-menu') }}"></use>
			</svg>
		</button>
		<a class="c-header-brand d-lg-none" href="{{ route('dashboard') }}">
				<img class="c-sidebar-brand-full" src="{{ asset('assets/brand/logo.png') }}" width="135" height="36" alt="McLink Logo">
		</a>
		<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
			<svg class="c-icon c-icon-lg">
				<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-menu') }}"></use>
			</svg>
		</button>
		<ul class="c-header-nav d-md-down-none">
			<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('home') }}">{{ __('label.dashboard') }}</a></li>
		</ul>
		<ul class="c-header-nav ml-auto mr-4">
			<li class="c-header-nav-item dropdown">
				<a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<div class="c-avatar">
						@if (!is_null(auth()->user()->avatar))
							<img class="c-avatar-img" src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->email }}">
						@else
							<img class="c-avatar-img" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&size=96&background=random&length=1&color=fff" alt="{{ auth()->user()->email }}">
						@endif
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-right pt-0">
					{{-- <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
					<a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-bell') }}"></use>
						</svg> Updates<span class="badge badge-info ml-auto">42</span>
					</a>
					<a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-envelope-open') }}"></use>
						</svg> Messages<span class="badge badge-success ml-auto">42</span>
					</a>
					<a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-task') }}"></use>
						</svg> Tasks<span class="badge badge-danger ml-auto">42</span>
					</a>
					<a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-comment-square') }}"></use>
						</svg> Comments<span class="badge badge-warning ml-auto">42</span>
					</a> --}}
					<div class="dropdown-header bg-light py-2"><strong>{{ __('label.settings') }}</strong></div>
					<a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-user') }}"></use>
						</svg> {{ __('label.profile') }}
					</a>
					{{-- <a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-settings') }}"></use>
						</svg> Settings
					</a>
					<a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-credit-card') }}"></use>
						</svg> Payments<span class="badge badge-secondary ml-auto">42</span>
					</a>
					<a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-file') }}"></use>
						</svg> Projects<span class="badge badge-primary ml-auto">42</span>
					</a> --}}
					<div class="dropdown-divider"></div>
					{{-- <a class="dropdown-item" href="#">
						<svg class="c-icon mr-2">
							<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-lock-locked') }}"></use>
						</svg> Lock Account
					</a> --}}
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
							<svg class="c-icon mr-2">
								<use xlink:href="{{ asset('assets/icons/sprites/free.svg#cil-account-logout') }}"></use>
							</svg> {{ __('label.logout') }}
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</li>
		</ul>
		{{-- <div class="c-subheader px-3">
			<!-- Breadcrumb-->
			<ol class="breadcrumb border-0 m-0">
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item"><a href="#">Admin</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
				<!-- Breadcrumb Menu-->
			</ol>
		</div> --}}
	</header>