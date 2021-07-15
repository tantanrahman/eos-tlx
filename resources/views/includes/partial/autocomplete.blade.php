<script type="text/javascript">
	
    let city_path = "{{ route('autocompleteCity')  }}"

    $('input.typeaheadCity').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};

			// console.log($('#customer-type').val());
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

	let shipment_path = "{{ route('autocompleteShipment')  }}"
	$('input.typeaheadShipment').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};
			
			return $.get(shipment_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},

		updater: function(item) {
			console.log(map[item].phone);
			$('input[name="phone"]').val(map[item].phone);
			return item;
		}
	});

</script>
