@include('layout.links')
    @include('layout.sidebar')
        @include('layout.navbar')
            <div class="c-body">
                <main class="c-main">
                    <div class="container-fluid">
                        <div class="fade-in">   
                            @include('layout.flash')        
                            <!-- Content -->
                            @yield('content')
                            <!--./ Content -->                                   
                        </div>
                    </div>
                </main>
        @include('layout.footer')
@include('layout.scripts')