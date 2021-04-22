<script>
    $(document).ready(function() {
      $('#table_dropship').DataTable({
        processing : true,
        serverSide : true,
        ajax : '{!! route("admin.dropship.index") !!}',
        columns: [
          {data:'created_at',name:'created_at'},
          {data:'resi',name:'resi'},
          {data:'name',name:'name'},
          {data:'jenis_barang',name:'jenis_barang'},
          {data:'berat',name:'berat'},
          {data:'city',name:'city'},
          {data:'users_id',name:'users_id'},
        ],
      });
    });
</script>