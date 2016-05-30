$(".btn-delete").on('click', function() {
	var formID = '#' + $(this).attr('class').split(' '[0]);

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
	    	$(formID).submit();
	});
	return false;
});

function areYouSure(form) {
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
	    	return true;
	});
	return false;
}