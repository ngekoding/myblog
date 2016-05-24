$("button.btn-delete").on('click', function() {
	swal({
		title: "Are you sure?",
	    text: "You will not be able to recover this data!",
	    type: "warning",   
	    showCancelButton: true,   
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Yes, delete it!", 
	    closeOnConfirm: false 
	}, 
		function(){   
	    	$("#myForm").submit();
	});
	return false;
});