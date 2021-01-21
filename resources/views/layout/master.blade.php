@include('layout.links')
    @include('layout.sidebar')
        @include('layout.navbar')
            <div class="c-body">
                <main class="c-main">
                    <div class="container-fluid">
                        <div class="fade-in">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Content -->
                                        @yield('content')
                                        <!--./ Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        @include('layout.footer')
@include('layout.scripts')