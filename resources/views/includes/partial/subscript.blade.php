<script>

	// Date Periode for Dropship
	$('#dropship-periode-start').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		endDate: "0d",
	}).on('changeDate', function (e) {
		var dt = new Date(e.target.value);
		$("#dropship-periode-end").datepicker("setStartDate", dt);

		fetch_dropship();
	});

	$('#dropship-periode-end').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		endDate: "0d",
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

	//CUSTOMER TYPE
	$('body').on('change', '#customer-type', function (e) {
		e.preventDefault();

		if (e.target.value == 'shipper')
		{
			// $('#customer-city-section').show();
			// $('#customer-country-section').hide();
			$('#customer-country').val(106);
			$('#customer-name-country').val('Indonesia');
			$('#customer-name-country').attr("disabled", "disabled");
		}
		else if (e.target.value == 'consignee')
		{
			// $('#customer-city-section').hide();
			// $('#customer-country-section').show();
			$('#customer-city').val(0);
			$('#customer-country').val('');
			$('#customer-name-country').val('');
			$("#customer-name-country").removeAttr("disabled");
		}

	});

	// PIC Agen for Marketing
	$('body').on('change', '#select2userrole', function (e) {
		e.preventDefault();

		if (e.target.value == 3)
		{
			$('#pic-marketing-user').show();
		}
		else
		{
			$('#pic-marketing-user').hide();
		}
	});

	$('body').on('change', '#customer-city', function (e) {
		e.preventDefault();

		let customer_id_path = "{{ route('getCustomerId')  }}";
		$.get(customer_id_path, {source: 'city', id: e.target.value}).done((rsp) => {
			if (rsp.status)
			{
				$('#customer-id').val(rsp.customer_id);
			}
		});
	});

	$('body').on('change', '#customer-country', function (e) {
		e.preventDefault();

		let customer_id_path = "{{ route('getCustomerId')  }}";
		$.get(customer_id_path, {source: 'country', id: e.target.value}).done((rsp) => {
			if (rsp.status)
			{
				$('#customer-id').val(rsp.customer_id);
			}
		});
	});
  
</script>