$(document).ready(function() {
	$('.select2').select2();

	$('.title-slug').bind('keyup keypress blur',function() {
		var slug = $(this).val();
			slug = slug.toLowerCase();
			slug = slug.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");
    		slug = slug.replace(/\s+/g, "-");

    	$('.slug').val(slug);
	});

	tinymce.init({
	    selector: '.tiny',
	    height: 500,
	    plugins: [
		    'advlist autolink lists link image charmap preview anchor',
		    'searchreplace visualblocks code',
		    'insertdatetime media table contextmenu paste code'
		  ],
		file_browser_callback: function(field, url, type, win) {
	        tinyMCE.activeEditor.windowManager.open({
	            file: '../../vendor/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
	            title: 'KCFinder',
	            width: 700,
	            height: 500,
	            inline: true,
	            close_previous: false
	        }, {
	            window: win,
	            input: field
	        });
	        return false;
	    }
	  });

	// $('#toggle-sidebar').click(function() {
	// 	var sidebar = $('.sidebar');
	// 	var content = $('.content');

	// 	if (content.is(':visible')) {
	// 		sidebar.hide(200);
	// 		content.css('width', '100%');
	// 	}
	// });
});