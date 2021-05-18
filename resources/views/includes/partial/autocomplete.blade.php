<script type="text/javascript">
    let city_path = "{{ route('autocompleteCity')  }}"
    $('input.typeaheadCity').typeahead({
        source:  function (query, process) {
        return $.get(city_path, { term: query }, function (data) {
                return process(data);
            });
        }
    });
    
    let courier_path = "{{ route('autocompleteCourier')  }}"
    $('input.typeaheadCourier').typeahead({
        source:  function (query, process) {
        return $.get(courier_path, { term: query }, function (data) {
                return process(data);
            });
        }
    });

</script>