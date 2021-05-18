<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
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
<script src="{{ url('plugins/select2/js/select2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
@include('sweetalert::alert')

<script>
  $('#dropship-periode-start').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
  }).on('changeDate', function (e) {
	  var dt = new Date(e.target.value);
	  $("#dropship-periode-end").datepicker("setStartDate", dt);

	  fetch_dropship();
  });

  $('#dropship-periode-end').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
  }).on('changeDate', function (e) {
	  fetch_dropship();
  });

  $('body').on('click', '.dropship-export', function (e) {
	  e.preventDefault();

	  let export_url = e.target.href,
		  query = {
			  date_start: $('#dropship-periode-start').val(),
			  date_end: $('#dropship-periode-end').val(),
		  },
		  url_params = '';

	  url_params = '?' + $.param(query);

	  window.location.href = export_url + url_params;
  });
</script>


@include('includes.partial.autocomplete')
@include('includes.partial.datatable')
@include('includes.partial.select')