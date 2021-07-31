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
			$('#customer-name-country').attr("readonly", "readonly");
		}
		else if (e.target.value == 'consignee')
		{
			// $('#customer-city-section').hide();
			// $('#customer-country-section').show();
			$('#customer-city').val(0);
			$('#customer-country').val('');
			$('#customer-name-country').val('');
			$("#customer-name-country").removeAttr("readonly");
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

	// $('#customer-id').on('change', function () {
	// 	var typed_name = $(this).val();
	// 	$('#test').val(typed_name);
	// });

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

	//Format Money for Form
	$(document).ready(function(){
		// Format mata uang.
		$( '.uang' ).mask('000.000.000.000.000.000', {reverse: true});
	})

	$(document).ready(function(){
		$("#addRow").click(function(){
			var table = $("table tbody");

			actual_weight = $("#actual_weight").val(),
			length = $("#length").val(),
			width = $("#width").val(),
			height = $("#height").val();
			volume = length*width*height;

			let row = "<tr><td>" + actual_weight + "</td><td>" + length + "</td><td>" + width + "</td><td>" + height + "</td><td>" + volume + "</td></tr>";
			$("table tbody").append(row);

			var total_volume = 0;
			table.find('tr').each(function (i, el) {
				var $tds = $(el).find('td');
				
				var volume = parseInt($tds.eq(4).text());
				total_volume += volume;
				console.log(total_volume);
			});

			$('tfoot th#total-volume').text(total_volume);
		});
	});

	
  
</script>