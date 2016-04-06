$(document).ready(function() {
    var myDropzone = new Dropzone(".dropzoneme", {acceptedFiles: "image/*", maxFilesize: 2,
		success: function(file, response){
		}
    });
    myDropzone.on("addedfile", function(file) {
        $('#smallModal').modal('show');
        $('#smallModal').find('.modal-title').html('@lang('form.op_success_title')');
        $('#smallModal').find('.modal-body').html('Files are added!');
        setTimeout(function () {
        	location.reload(); 
        }, 2000);        
    });    
    myDropzone.on("erro", function(file, errorMessage) {
        $('#smallModal').modal('show');
        $('#smallModal').find('.modal-title').html('@lang('form.op_failed_title')');
        $('#smallModal').find('.modal-body').html(errorMessage);
        setTimeout(function () {
        	location.reload(); 
        }, 2000);        
    });    
});