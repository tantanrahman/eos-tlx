<script type="text/javascript">

    let city_path = "{{ route('autocompleteCity')  }}"
    $('input.typeaheadCity').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};

			if ($('#customer-type').length > 0 && $('#customer-type').val() == 'consignee') {
				return false
			}

			return $.get(city_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},

		updater: function(item) {
			$('input[name="city_id"]').val(map[item].id).trigger('change');
			$('input[name="city"]').val(map[item].id).trigger('change');
			return item;
		}
    });
    
    let courier_path = "{{ route('autocompleteCourier')  }}"
    $('input.typeaheadCourier').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};
			return $.get(courier_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},
		updater: function(item) {
			$('input[name="courier_id"]').val(map[item].id);
			return item;
		}
    });

	let country_path = "{{ route('autocompleteCountry')  }}"
	$('input.typeaheadCountry').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};
			return $.get(country_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},
		updater: function(item) {
			$('input[name="country_id"]').val(map[item].id).trigger('change');
			return item;
		}
	});

	let customer_path = "{{ route('autocompleteCustomer')  }}"
	$('input.typeaheadCustomer').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};
			return $.get(customer_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},
		updater: function(item) {
			$('input[name="customer_id"]').val(map[item].id);
			return item;
		}
	});

	//Autocomplete For Shipment - Shipper
	let shipment_shipper_path = "{{ route('autocompleteShipmentShipper')  }}"
	$('input.typeaheadShipmentShipper').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};
			
			return $.get(shipment_shipper_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},

		updater: function(item) {
			$('input[name="account_code"]').val(map[item].account_code);
			$('input[name="company_name"]').val(map[item].company_name);
			$('input[name="phone"]').val(map[item].phone);
			$('input[name="postal_code"]').val(map[item].postal_code);
			$('input[name="city_name"]').val(map[item].city_name);
			$('textarea[name="address"]').val(map[item].address);
			return item;
		}
	});

	//Autocomplete For Shipment - Consignee
	let shipment_consignee_path = "{{ route('autocompleteShipmentConsignee')  }}"
	$('input.typeaheadShipmentConsignee').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};
			
			return $.get(shipment_consignee_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},

		updater: function(item) {
			$('input[name="con_account_code"]').val(map[item].account_code);
			$('input[name="con_company_name"]').val(map[item].company_name);
			$('input[name="con_phone"]').val(map[item].phone);
			$('input[name="con_postal_code"]').val(map[item].postal_code);
			$('input[name="con_city_name"]').val(map[item].city_name);
			$('textarea[name="con_address"]').val(map[item].address);
			$('input[name="con_country_name"]').val(map[item].country_name);
			return item;
		}
	});

</script>
