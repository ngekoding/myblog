$(document).ready(function() {

	/*
	 * START - Heighest Thumbnail
	 * Menentukan tinggi maksimal setiap thumbnail
	 * Ada 2 thumbnail (feature-article & other-articles)
	 */

	var useHeighestThumbnail = function() {
		var maxHeight = 0;
		var maxHeight2 = 0; // For Feature Articles

		$('.other-articles .thumbnail').each(function() {
			if ($(this).height() > maxHeight) {
				maxHeight = $(this).height();
			}
		});
		$('.feature-articles .thumbnail').each(function() {
			if ($(this).height() > maxHeight) {
				maxHeight2 = $(this).height();
			}
		});
		$('.other-articles .thumbnail').height(maxHeight);
		$('.feature-articles .thumbnail').height(maxHeight2);
	}

	useHeighestThumbnail();
	$(window).resize(function() {
		$('.other-articles .thumbnail').css({'height':'auto'});
		$('.feature-articles .thumbnail').css({'height':'auto'});
		useHeighestThumbnail();
	});

	/*
	 * END - Heighest Thumbnail
	 */
});