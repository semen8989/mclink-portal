
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui/coreui.bundle.min.js') }}"></script>
      <!--[if IE]><!-->
      <script src="{{ asset('js/coreui/svgxuse.min.js') }}"></script>
      <!--<![endif]-->
      <!-- Page specific scripts-->
      @stack('scripts')
    </body>
</html>