$(document).ready(function() {
	$('.select2').select2();

	$('.cat-title').bind('keyup keypress blur',function() {
		var slug = $(this).val();
			slug = slug.toLowerCase();
			slug = slug.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");
    		slug = slug.replace(/\s+/g, "-");

    	$('.slug').val(slug);
	});
});