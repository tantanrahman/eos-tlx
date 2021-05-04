<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).ready(function() {
      $('#table_dropship').DataTable({
        processing : true,
        serverSide : true,
        ajax : '{!! route("admin.dropship.index") !!}',
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
      });
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
</script>