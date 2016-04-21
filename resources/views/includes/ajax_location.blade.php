<script>
$(document).ready(function () {

    $( ".ajax_location" ).autocomplete({
  		minLength: 3,
  	  source: function(request, response) {
  	      $.ajax({
  	          url: "{{ url('ajax/get_locations') }}",
  	          data: { term: $(".ajax_location").val(), _token: "{{ csrf_token() }}"},
  	          dataType: "json",
  	          type: "POST",
  	          success: function(data) {
  	              response($.map(data, function(obj) {
  	                  return {
  	                      label: obj.prj_location,
  	                      value: obj.prj_location,
  	                      description: obj.prj_location,
  	                  };
  	              }));
  	          }

  	      });
  	  },
  		select: function( event, ui ) {
  			},
  	});

    $( ".mobile_ajax_location" ).autocomplete({
  		minLength: 3,
  	  source: function(request, response) {
  	      $.ajax({
  	          url: "{{ url('ajax/get_locations') }}",
  	          data: { term: $(".main_ajax_location").val(), _token: "{{ csrf_token() }}"},
  	          dataType: "json",
  	          type: "POST",
  	          success: function(data) {
  	              response($.map(data, function(obj) {
  	                  return {
  	                      label: obj.prj_location,
  	                      value: obj.prj_location,
  	                      description: obj.prj_location,
  	                  };
  	              }));
  	          }

  	      });
  	  },
  		select: function( event, ui ) {
  			},
  	});

});

</script>
