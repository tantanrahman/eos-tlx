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

    @include('includes.footer')

  </div>

    @include('includes.script')

</body>
</html>
