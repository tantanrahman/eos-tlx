<script>
    $(document).ready(function() {
      $('#table_dropship').DataTable({
        processing : true,
        serverSide : true,
        ajax : '{!! route("admin.dropship.index") !!}',
        columns: [
          {data:'created_at',name:'dropship.created_at'},
          {data:'resi',name:'dropship.resi'},
          {data:'dname',name:'dropship.name'},
          {data:'jenis_barang',name:'dropship.jenis_barang'},
          {data:'berat',name:'dropship.berat'},
          {data:'city',name:'dropship.city'},
          {data:'name',name:'users.name'},
        ],
      });
    });
</script>