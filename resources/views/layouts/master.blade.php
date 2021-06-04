@include('includes.style')


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader dark-mode flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ url('img/favicon.png') }}" height="100" width="100">
  </div> --}}

  @include('includes.navbar')

  @include('includes.sidebar')

  @yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="https://tlx.co.id">TLX</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Beta 1.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    @include('includes.script')

</body>
</html>
