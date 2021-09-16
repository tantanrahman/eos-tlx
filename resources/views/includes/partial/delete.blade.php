<script>

    /** 
     * @author Tantan
     * @modified 3 Sep 2021
     * @description Got CRSF Token for Method
     * 
    */
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    });

    /** 
     * @author Tantan
     * @modified 3 Sep 2021
     * @description Delete Dropship
     * 
    */
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#hapus-dropship').modal('show');
    });
      
    $('#action-hapus-dropship').click(function () {
        $.ajax({
            url: "/admin/dropship/" + dataId, 
            type: 'delete',
            beforeSend: function () {
                $('#action-hapus-dropship').text('Hapus Data'); 
            },
            success: function (data) { 
                setTimeout(function () {
                    $('#hapus-dropship').modal('hide'); 
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
                    position: 'top-end'
                });
            }
        })
    });

    /** 
     * @author Tantan
     * @modified 3 Sep 2021
     * @description Delete Customer
     * 
    */
    $(document).on('click', '.delete', function () {
          dataId = $(this).attr('id');
          console.log(dataId)
          $('#hapus-customer').modal('show');
    });
      
    $('#action-hapus-customer').click(function () {
        $.ajax({
            url: "/admin/customer/" + dataId, 
            type: 'delete',
            beforeSend: function () {
                $('#action-hapus-customer').text('Hapus Data'); 
            },
            success: function (data) { 
                setTimeout(function () {
                    $('#hapus-customer').modal('hide'); 
                    var oTable = $('#table_customer').dataTable();
                    var oTable2 = $('#table_customer_con').dataTable();
                    oTable.fnDraw(false);
                    oTable2.fnDraw(false); 
                });
                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    toast: true,
                    timer: 3000,
                    timerProgressBar: true,
                    title: 'Data Berhasil Dihapus',
                    position: 'top-end'
                });
            }
        })
    });

    /** 
     * @author Tantan
     * @modified 3 Sep 2021
     * @description Delete Shipment
     * 
    */
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#hapus-shipment').modal('show');
    });
        
    $('#action-hapus-shipment').click(function () {
        $.ajax({
            url: "/admin/shipment/" + dataId, 
            type: 'delete',
            beforeSend: function () {
                $('#action-hapus-shipment').text('Hapus Data'); 
            },
            success: function (data) { 
                setTimeout(function () {
                    $('#hapus-shipment').modal('hide'); 
                    var oTable = $('#table_shipment').dataTable();
                    oTable.fnDraw(false); 
                });
                swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    toast: true,
                    timer: 3000,
                    timerProgressBar: true,
                    title: 'Data Berhasil Dihapus',
                    position: 'top-end'
                });
            }
        })
    });

    /** 
     * @author Tantan
     * @modified 15 Sep 2021
     * @description Delete Shipment Details
     * 
    */
    $("table tbody").on('click','.removeSD', function(){
		var id = $(this).attr('id');
        var row = $(this).closest('tr');
		$.ajax({
			url: "/admin/shipmentdetails/" + id,
			type: 'DELETE',
			data: {id: id},
			
			success:function(data)
			{
				if(data)
				{
					$(this).closest('tr').remove();
                    window.location.reload();
				} 
				else
				{
					alert('Error!');
				}
			}
		})
	});
</script>