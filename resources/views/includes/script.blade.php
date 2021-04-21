<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ url('plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ url('dist/js/adminlte.js') }}"></script>
<script src="{{ url('dist/js/demo.js') }}"></script>
<script src="{{ url('dist/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('dist/js/dataTables.bootstrap4.min.js') }}"></script>
@include('sweetalert::alert')

<script>
  $(document).ready(function() {
    $('#table_courier').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.courier.index") !!}',
      columns: [
        {data:'id',name:'id'},
        {data:'code',name:'code'},
        {data:'code_dua',name:'code_dua'},
        {data:'name',name:'name'},
      ]
    });
  });
</script>