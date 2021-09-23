<script>
  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Dropship
   * 
  */
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

  //For Filter Date in Dropship
  $(document).ready(function() {
  	if ($('#dropship-periode-start').length)
    {
		  fetch_dropship();
	  }
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Country
   * 
  */
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

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Courier
   * 
  */
  $(document).ready(function() {
    $('#table_courier').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.courier.index") !!}',
      columns: [
        {data:'reff_id',name:'reff_id'},
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
        },
        {data:'action',name:'action'},
      ]
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for City
   * 
  */
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

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Customer Shipper
   * 
  */
  $(document).ready(function() {
    let index_url = '{!! route("admin.customer.index") !!}';

    $('#table_customer').DataTable({
      processing : true,
      serverSide : true,
      "ajax": {
				"url": index_url,
				"data": {
					"customer_type": 'shipper',
				}
			},
      columns: [
        {data:'id',name:'id', visible: false},
        {data:'account_code',name:'account_code'},
        {data:'name',name:'name'},
        {data:'city_name',name:'city_name'},
        {data:'phone',name:'phone'},
        {data:'user_name',name:'user_name'},
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Customer Consignee
   * 
  */
  $(document).ready(function() {

    let index_url = '{!! route("admin.customer.index") !!}';

    $('#table_customer_con').DataTable({
      processing : true,
      serverSide : true,
      "ajax": {
				"url": index_url,
				"data": {
					"customer_type": 'consignee',
				}
			},
      columns: [
        {data:'id',name:'id', visible: false},
        {data:'account_code',name:'account_code'},
        {data:'name',name:'name'},
        {data:'city_name',name:'city_name'},
        {data:'country_name',name:'country_name'},
        {data:'phone',name:'phone'},
        {data:'user_name',name:'user_name'},
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for User
   * 
  */
  $(document).ready(function() {
    $('#table_user').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.user.index") !!}',
      columns: [
        {data:'username',name:'username'},
        {data:'name',name:'name'},
        {data:'role',name:'role'},
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
        },
        {data:'action',name:'action'}
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Office Profile
   * 
  */
  $(document).ready(function() {
    $('#table_officeprofile').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.officeprofile.index") !!}',
      columns: [
        {data:'id',name:'id'},
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
        },
        {data:'photo',name:'photo'},
        {data:'action',name:'action'}
      ],
    });
  });
  
  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Bag Number
   * 
  */
  $(document).ready(function() {
    $('#table_bagpackage').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.bagpackage.index") !!}',
      columns: [
        {data:'id',name:'id'},
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
        },
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Package Type
   * 
  */
  $(document).ready(function() {
    $('#table_packagetype').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.packagetype.index") !!}',
      columns: [
        {data:'id',name:'id'},
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
        },
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Partner
   * 
  */
  $(document).ready(function() {
    $('#table_partner').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.partner.index") !!}',
      columns: [
        {data:'id',name:'id'},
        {data:'reff_id',name:'reff_id'},
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
        },
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Pickup User
   * 
  */
  $(document).ready(function() {
    $('#table_pickupuser').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.pickupuser.index") !!}',
      columns: [
        {data:'id',name:'id'},
        {data:'name',name:'name'},
        {data:'jalur',name:'jalur'},
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
        },
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Ongkir
   * 
  */
  $(document).ready(function() {
    $('#table_ongkir').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.ongkir.index") !!}',
      columns: [
        {data:'idx',name:'idx', visible:false},
        {data:'packagetypes',name:'packagetypes'},
        {data:'countries',name:'countries', },
        {data:'prices',name:'prices', render: $.fn.dataTable.render.number('.', '.','')},
        {
          data: 'status',
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
        },
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Shipment Detail
   * 
  */
  $(document).ready(function() {
    $('#table_shipmentdetail').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.shipment.create") !!}',
      columns: [
        {data:'actual_weight',name:'actual_weight'},
        {data:'length',name:'length'},
        {data:'width',name:'width'},
        {data:'height',name:'height'},
        {data:'volume',name:'volume'},
        {data:'total_weight',name:'total_weight'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Tracking Status
   * 
  */
  $(document).ready(function() {
    $('#table_trackingstatus').DataTable({
      processing : true,
      serverSide : true,
      ajax : '{!! route("admin.tracking_status.index") !!}',
      columns: [
        {data:'id',name:'id'},
        {data:'partner_id',name:'partner_id'},
        {data:'status',name:'status'},
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
        },
        {data:'created_by',name:'created_by'},
        {data:'action',name:'action'},
      ],
    });
  });

  /** 
   * @author Tantan 
   * @updated 3 Sep 2021
   * @description Datatable Index for Shipment
   * 
  */
  function shipment_fetch()
  {
    let index_url = '{!! route("admin.shipment.index") !!}',
    query = {
      date_start: $('#shipment-periode-start').val(),
      date_end: $('#shipment-periode-end').val(),
      partner: $('#partner_multiple').val(),
    };

    $('#table_shipment').DataTable({
      processing : true,
      serverSide : true,
      "ajax": {
        "url": index_url,
        "data": {
          "date_start": query.date_start,
          "date_end": query.date_end,
          "partner": query.partner,
        }
      },
      columns: [
        {data:'time',name:'time'},
        {data:'connote',name:'connote'},
        {data:'ship_name',name:'ship_name'},
        {data:'con_name',name:'con_name'},
        {data:'description',name:'description'},
        {data:'partner_name',name:'partner_name'},
        {data:'redoc_connote',name:'redoc_connote'},
        {data:'con_cou_name',name:'con_cou_name'},
        {
          data:'weight',name:'weight', 
          render: function(data) 
          {
            if (data==null) 
            {
              return "0 KG"
            }
            else
            {
              return data + " KG"
            }
          }
        },
        {data:'ac_name',name:'ac_name'},
        {data:'marketing',name:'marketing'},
        {
          data: 'payment_status',
          render: function(data)
          {
              if (data == 0 || data === null)
              {
                return '<span class="badge badge-danger">UNPAID</span>'
              }
              else
              {
                return '<span class="badge badge-success">PAID</span>'
              }
          }
        },
        {
          data: 'printed',
          render: function(data)
          {
              if (data==0)
              {
                return '<span class="badge badge-danger">NOT PRINTED</span>'
              }
              else
              {
                return '<span class="badge badge-success">PRINTED</span>'
              }
          }
        },
        {data:'action',name:'action'},
      ],
      destroy: true,
    });
  }

  //For Filter Date in Shipment
  $(document).ready(function() {
  	if ($('#shipment-periode-start').length)
    {
		  shipment_fetch();
	  }
  });
  
</script>