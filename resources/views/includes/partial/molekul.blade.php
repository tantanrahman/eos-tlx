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

	// Date Periode for Shipment
	$('#shipment-periode-start').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		endDate: "0d",
	}).on('changeDate', function (e) {
		var dt = new Date(e.target.value);
		$("#shipment-periode-end").datepicker("setStartDate", dt);

		shipment_fetch();
	});

	$('body').on('change', '#partner_multiple', function (e) {
		shipment_fetch();
	});

	$('#shipment-periode-end').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		endDate: "0d",
	}).on('changeDate', function (e) {
		shipment_fetch();
	});

	$('body').on('click', '.shipment-export', function (e) {
		e.preventDefault();
		let export_url = e.target.href,
			query = {
				date_start: $('#shipment-periode-start').val(),
				date_end: $('#shipment-periode-end').val(),
				partner: $('#partner_multiple').val(),
			},
			url_params = '';
		url_params = '?' + $.param(query);
		console.log(url_params);
		window.location.href = export_url + url_params;
	});

	//CUSTOMER TYPE
	$('body').on('change', '#customer-type', function (e) {
		e.preventDefault();

		if (e.target.value == 'shipper')
		{
			$('#customer-country').val(106);
			$('#customer-name-country').val('Indonesia');
			$('#customer-name-country').attr("readonly", "readonly");
		}
		else if (e.target.value == 'consignee')
		{
			$('#customer-city').val(0);
			$('#customer-country').val('');
			$('#customer-name-country').val('');
			$("#customer-name-country").removeAttr("readonly");
		}

	});

	// PIC Agen for Marketing
	$('body').on('change', '#select2userrole', function (e) {
		e.preventDefault();

		if (e.target.value == 11)
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
	
	$('body').on('change', '#select2countryconshipment', function (e) {
		e.preventDefault();

		let customer_id_path = "{{ route('getCustomerId')  }}";
		$.get(customer_id_path, {source: 'country', id: e.target.value}).done((rsp) => {
			if (rsp.status)
			{
				$('#con-customer-id').val(rsp.customer_id);
			}
		});

	});

	$(document).ready(function(e){

		let connote_path = "{{ route('getConnote')  }}";
		$.get(connote_path, {connote: e.target}).done((rsp) => {
			$('#connote').val(rsp.connote);
		});
	});

	//Format Money for Form
	$(document).ready(function(){
		// Format mata uang.
		$( '.uang' ).mask('000.000.000.000.000.000', {reverse: true});
	})

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
	//Calculate For Shipment Details
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
		var table 			= $("table tbody");
        var actual_weight 	= $("input[name=actual_weight]").val();
		var length 			= $("input[name=length]").val();
		var width 			= $("input[name=width]").val();
		var height 			= $("input[name=height]").val();
		var sum_volume	 	= length*width*height;
		var volumetrick		= sum_volume/5000;
		var sum_weight 		= (volumetrick>actual_weight) ? (volumetrick) : (actual_weight)

		$("table tbody").on('click','#removeSD', function(){
			$(this).closest('tr').remove();
			var volume = 0;
			var total_weight = 0;
				table.find('tr').each(function (i, el) {
					var $tds = $(el).find('td');
					var sum_volume 	= parseInt($tds.eq(4).children().val());
					var sum_weight 	= parseInt($tds.eq(5).children().val());
					volume 			+= sum_volume;
					total_weight   	+= sum_weight;
					});

			$('#total-volume').text(volume);
			$('#sum-weight').text(total_weight);
		});

		let row = "<tr><td><input name='actual_weight[]' class='form-control' value='"+actual_weight+"'></td><td><input name='length[]' class='form-control' value='"+length+"'></td><td><input name='width[]' class='form-control' value='"+width+"'></td><td><input name='height[]' class='form-control' value='"+height+"'></td><td><input name='sum_volume[]' id='sum_volume' class='form-control' value='"+sum_volume+"' readonly></td><td><input name='sum_weight[]' id='sum_weight' class='form-control' value='"+sum_weight+"' readonly></td><td><button type='button' id='removeSD' class='btn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
		$("table tbody").append(row);

		var volume = 0;
		var total_weight = 0;
			table.find('tr').each(function (i, el) {
				var $tds = $(el).find('td');
				var sum_volume = parseInt($tds.eq(4).children().val());
				var sum_weight = parseFloat($tds.eq(5).children().val());
				volume += sum_volume;
				total_weight += Math.ceil(sum_weight);
			});

		$('#total-volume').text(volume);
		$('#sum-weight').text(total_weight);
    });

	//Blink for Style
	function JavaBlink() 
	{
		var blinks = document.getElementsByTagName('JavaBlink');
		for (var i = blinks.length - 1; i >= 0; i--) {
			var s = blinks[i];
			s.style.visibility = (s.style.visibility === 'visible') ? 'hidden' : 'visible';
		}
		window.setTimeout(JavaBlink, 300);
	}
	if (document.addEventListener) document.addEventListener("DOMContentLoaded", JavaBlink, false);
	else if (window.addEventListener) window.addEventListener("load", JavaBlink, false);
	else if (window.attachEvent) window.attachEvent("onload", JavaBlink);
	else window.onload = JavaBlink;
	
</script>