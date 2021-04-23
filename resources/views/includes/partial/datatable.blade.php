<script>
    $(document).ready(function() {
      $('#table_dropship').DataTable({
        processing : true,
        serverSide : true,
        ajax : '{!! route("admin.dropship.index") !!}',
        columns: [
          {data:'time',name:'dropship.created_at'},
          {data:'resi',name:'dropship.resi'},
          {data:'dname',name:'dropship.name'},
          {data:'courier',name:'courier.name'},
          {data:'jenis_barang',name:'dropship.jenis_barang'},
          {data:'berat',name:'dropship.berat'},
          {data:'cities',name:'city.city'},
          {data:'name',name:'users.name'},
        ],
      });
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

</script>