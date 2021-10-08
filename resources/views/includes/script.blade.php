<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ url('dist/js/jquery3-5.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script><i class="ri-psychotherapy-line"></i>
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
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="{{ url('dist/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/select2/js/select2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script src="{{ url('dist/js/jquery.mask.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

@include('sweetalert::alert')
@include('includes.partial.molekul')
@include('includes.partial.autocomplete')
@include('includes.partial.datatable')
@include('includes.partial.delete')
@include('includes.partial.select')