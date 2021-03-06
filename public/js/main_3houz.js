$(document).ready(function () {

  $('[data-toggle="tooltip"]').tooltip();
  
  $('.datepicker').datepicker({
  	dateFormat: 'dd/mm/yy',
  });

	// Clear filter form
    $('form').on('click', '.btn-clear', function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).closest('form').attr('action'),
            type: 'POST',
            dataType: 'json',
            data: {reset_form: 1, _token: $("input[name='_token']").val()},
            success: function (data) {
                setTimeout(function () { location.reload();}, 1000);
            }
        });
    });

    $('html').on('submit', '.ajax-submit', function(event) {
    	event.preventDefault();
      var reload = $(this).closest('form').attr('reload');
      $.ajax({
          url: $(this).closest('form').attr('action'),
          type: 'POST',
          dataType: 'json',
          data: $(this).serialize(),
          success: function (data) {
            if (reload) {
              setTimeout(function () { location.reload();}, 1000);
            }
          },
          error: function(xhr, status, error) {
            var err = jQuery.parseJSON(xhr.responseText);
            $.each(err, function(key, value) {
              $('#err_msg_' + key).html('<span class="label label-danger">'+value+'</span>');
            });
          }
      });
    });

    $('html').on('click', '.cancel-button', function(event) {
    	event.preventDefault();
    	var goto = $(this).attr('goto');
    	window.location = goto;
    });

    $('html').on('click', '.btn-modal', function (event) {
        event.preventDefault();
        $('#basicModal').find('.modal-content').html('');
        $('#basicModal').modal('show');
        $('#basicModal').find('.modal-content').load($(this).attr('href'));
    });

    $('.select2').select2();


    // $( ".ajax_location" ).autocomplete({
  	// 	minLength: 3,
  	//   source: function(request, response) {
  	//       $.ajax({
  	//           url: "http://3houz.lc.local/ajax/get_locations",
  	//           data: { term: $(".ajax_location").val(), _token: "{{ csrf_token() }}"},
  	//           dataType: "json",
  	//           type: "POST",
  	//           success: function(data) {
  	//               response($.map(data, function(obj) {
  	//                   return {
  	//                       label: obj.prj_location,
  	//                       value: obj.prj_location,
  	//                       description: obj.prj_location,
  	//                   };
  	//               }));
  	//           }
    //
  	//       });
  	//   },
  	// 	select: function( event, ui ) {
  	// 		},
  	// });

});
