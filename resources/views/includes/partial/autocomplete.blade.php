<script type="text/javascript">
    var path = "{{ route('autocompleteCity')  }}"
    $('input.typeaheadCity').typeahead({
        source:  function (query, process) {
        return $.get(path, { term: query }, function (data) {
                return process(data);
            });
        }
    });
    
    var path = "{{ route('autocompleteCourier')  }}"
    $('input.typeaheadCity').typeahead({
        source:  function (query, process) {
        return $.get(path, { term: query }, function (data) {
                return process(data);
            });
        }
    });

</script>