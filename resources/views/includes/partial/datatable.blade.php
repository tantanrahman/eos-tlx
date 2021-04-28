<script>
    $(document).ready(function() {
      $('#table_dropship').DataTable({
        processing : true,
        serverSide : true,
        ajax : '{!! route("admin.dropship.index") !!}',
        columns: [
          {data:'time',name:'time'},
          {data:'resis',name:'resis'},
          {data:'names',name:'names'},
          {data:'couriers',name:'couriers'},
          {data:'category',name:'category'},
          {data:'weight',name:'weight'},
          {data:'cities',name:'cities'},
          {data:'users',name:'users'},
          {data:'photo',name:'dropship.photo'},
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