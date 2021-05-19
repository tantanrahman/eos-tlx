<script type="text/javascript">
    let city_path = "{{ route('autocompleteCity')  }}"
    $('input.typeaheadCity').typeahead({
		source: function(query, process) {
			objects = [];
			map = {};
			return $.get(city_path, { term: query }, function (data) {
				$.each(data, function(i, object) {
					map[object.label] = object;
					objects.push(object.label);
				});
				process(objects);
			});
		},
		updater: function(item) {
			$('input[name="city"]').val(map[item].id);
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

</script>
