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
	    height: 300,
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

	$('.feature-image').bind('blur change', function() {
		var src = $(this).val();
		if (src.length > 0){
			var img = "<img src='" + src + "' width='150px'><br><br>";
			$('.feature-image-view').html(img);
		}
	});
});

function openKCFinder(field) {
	    window.KCFinder = {
	        callBack: function(url) {
	            field.value = url;
	            $(field).change();
	            window.KCFinder = null;
	        }
	    };
	    window.open('../../vendor/kcfinder/browse.php?type=image', 'kcfinder_textbox',
	        'status=0, toolbar=0, location=0, menubar=0, directories=0, resizable=1, scrollbars=0, width=800, height=600'
	    );
	}