    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
     <!-- Main js script-->
     <script src="{{ asset('js/app.js') }}"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui/coreui.bundle.min.js') }}"></script>
    <!--[if IE]><!-->
    <script src="{{ asset('js/coreui/svgxuse.min.js') }}"></script>
    <!--<![endif]-->
    <!-- Page specific scripts -->
    @stack('scripts')
    </body>
  </html>