<script>
    function fetch_dropship()
    {
    	let index_url = '{!! route("admin.dropship.index") !!}',
			query = {
				date_start: $('#dropship-periode-start').val(),
				date_end: $('#dropship-periode-end').val(),
			};

		$('#table_dropship').DataTable({
			processing : true,
			serverSide : true,
			"ajax": {
				"url": index_url,
				"data": {
					"date_start": query.date_start,
					"date_end": query.date_end,
				}
			},
			columns: [
				{data:'idx',name:'idx', visible: false},
				{data:'time',name:'time'},
				{data:'resis',name:'resis'},
				{data:'names',name:'names'},
				{data:'couriers',name:'couriers'},
				{data:'category',name:'category'},
				{data:'weight',name:'weight'},
				{data:'cities',name:'cities'},
				{data:'users',name:'users'},
				{data:'photo',name:'dropship.photo'},
				{data:'action',name:'action', orderable: false, searchable: false},
			],
			destroy: true,
		});
    }

  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  });

  $(document).ready(function() {
  	if ($('#dropship-periode-start').length)
    {
		fetch_dropship();
	}
  });

  $(document).on('click', '.delete', function () {
          dataId = $(this).attr('id');
          $('#konfirmasi-modal').modal('show');
  });
      
  $('#tombol-hapus').click(function () {
      $.ajax({
          url: "/admin/dropship/" + dataId, 
          type: 'delete',
          beforeSend: function () {
              $('#tombol-hapus').text('Hapus Data'); 
          },
          success: function (data) { 
              setTimeout(function () {
                  $('#konfirmasi-modal').modal('hide'); 
                  var oTable = $('#table_dropship').dataTable();
                  oTable.fnDraw(false); 
              });
              swal.fire({
                  icon: 'success',
                  showConfirmButton: false,
                  toast: true,
                  timer: 3000,
                  timerProgressBar: true,
                  title: 'Data Berhasil Dihapus',
                  message: '{{ Session('
                  delete ')}}',
                  position: 'top-end'
              });
          }
      })
  });

  $(document).ready(function() {
    $('#table_country').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.country.index") !!}',
      columns: [
        {data:'id',name:'id'},
        {data:'name',name:'name'},
        {data:'alpha2code',name:'alpha2code'},
        {data:'alpha3code',name:'alpha3code'},
      ],
    });
  });

  $(document).ready(function() {
    $('#table_courier').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.courier.index") !!}',
      columns: [
        {data:'code',name:'code'},
        {data:'code_dua',name:'code_dua'},
        {data:'name',name:'name'},
        {
          data: 'active',
          render: function(data)
          {
              if (data==0)
              {
                return '<span class="badge badge-danger">NOT ACTIVE</span>'
              }
              else
              {
                return '<span class="badge badge-success">ACTIVE</span>'
              }
          }
        }
      ]
    });
  });

  $(document).ready(function() {
    $('#table_city').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.city.index") !!}',
      columns: [
        {data:'id',name:'id'},
        {data:'code',name:'code'},
        {data:'province',name:'province'},
        {data:'city',name:'city'},
      ],
    });
  });

  $(document).ready(function() {
    $('#table_customer').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.customer.index") !!}',
      columns: [
        {data:'id',name:'id', visible: false},
        {data:'account_code',name:'account_code'},
        {data:'name',name:'name'},
        {data:'city',name:'city'},
        {data:'phone',name:'phone'},
        {data:'group',name:'group'},
        {data:'action',name:'action'},
      ],
    });
  });
 
</script>