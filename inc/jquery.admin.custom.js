jQuery(document).ready(function() {

	/** Post Admin - Show Approprite Metaboxes when Post Format selected **/
	
	var galleryMetabox = jQuery('#mega-meta-box-post-gallery');
	var galleryTrigger = jQuery('#post-format-gallery');	
	galleryMetabox.css('display', 'none');
	
	var videoMetabox = jQuery('#mega-meta-box-post-video');
	var videoTrigger = jQuery('#post-format-video');	
	videoMetabox.css('display', 'none');
	
	jQuery('#post-formats-select input').change( function() {	
		if(jQuery(this).val() == 'gallery') {
			hideAllExcept(galleryMetabox);
		} else if (jQuery(this).val() == 'video') {
			hideAllExcept(videoMetabox);
		} else {
			galleryMetabox.css('display', 'none');	
			videoMetabox.css('display', 'none');
		}		
	});
	
	if (galleryTrigger.is(':checked'))
		galleryMetabox.css('display', 'block');
		
	if (videoTrigger.is(':checked'))
		videoMetabox.css('display', 'block');
		
	function hideAllExcept(metabox) {
		galleryMetabox.css('display', 'none');
		videoMetabox.css('display', 'none');
		metabox.css('display', 'block');
	}

	/** Show Appropriate Metaboxes when Template selected **/
	var pageGallery = jQuery('#mega-meta-box-page-gallery');
	pageGallery.css('display', 'none');
	
	var pagePhotos = jQuery('#mega-meta-box-page-photos');
	pagePhotos.css('display', 'none');
	
	var pageSliderSettings = jQuery('#mega-meta-box-page-slider-settings');
	pageSliderSettings.css('display', 'none');
	
	var pageFancyboxGallery = jQuery('#mega-meta-box-page-fancybox');
	pageFancyboxGallery.css('display', 'none');
	
	
	if ( jQuery('#page_template').val() == 'page-gallery.php' ) {
		pagePhotos.css('display', 'block');
		pageGallery.css('display', 'block');
	} else if (jQuery('#page_template').val() == 'page-full-width-window-slider.php' ) {
		pageSliderSettings.css('display', 'block');
		pageGallery.css('display', 'block');
	} else if (jQuery('#page_template').val() == 'page-gallery-fancybox.php' ) {
		pageFancyboxGallery.css('display', 'block');
		pageGallery.css('display', 'block');
	} else if (jQuery('#page_template').val() == 'page-classic-gallery.php' ) {
		pageGallery.css('display', 'block');
	} else if (jQuery('#page_template').val() == 'page-gallery-fancybox.php' ) {
		pageGallery.css('display', 'block');
	} else if (jQuery('#page_template').val() == 'page-full-width-slider.php' ) {
		pageSliderSettings.css('display', 'block');
		pageGallery.css('display', 'block');
	} else if (jQuery('#page_template').val() == 'page-gallery-no-margins.php' ) {
		pageGallery.css('display', 'block');
	} else if (jQuery('#page_template').val() == 'page-slider.php' ) {
		pageGallery.css('display', 'block');
	}
	
	jQuery("#page_template").change(function() {
		if ( jQuery(this).val() == 'page-gallery.php') {
			pageGallery.css('display', 'block');
			pagePhotos.css('display', 'block');
			pageSliderSettings.css('display', 'none');
			pageFancyboxGallery.css('display', 'none');
		} else if (jQuery(this).val() == 'page-full-width-window-slider.php') {
			pageGallery.css('display', 'block');
			pageSliderSettings.css('display', 'block');
			pagePhotos.css('display', 'none');
			pageFancyboxGallery.css('display', 'none');
		} else if (jQuery(this).val() == 'page-gallery-fancybox.php') {
			pageGallery.css('display', 'block');
			pageFancyboxGallery.css('display', 'block');
			pagePhotos.css('display', 'none');
			pageSliderSettings.css('display', 'none');
		} else if (jQuery(this).val() == 'page-classic-gallery.php') {
			pageGallery.css('display', 'block');
			pageFancyboxGallery.css('display', 'none');
			pagePhotos.css('display', 'none');
			pageSliderSettings.css('display', 'none');
		} else if (jQuery(this).val() == 'page-gallery-fancybox.php') {
			pageGallery.css('display', 'block');
			pageFancyboxGallery.css('display', 'none');
			pagePhotos.css('display', 'none');
			pageSliderSettings.css('display', 'none');
		} else if (jQuery(this).val() == 'page-full-width-slider.php') {
			pageSliderSettings.css('display', 'block');
			pageGallery.css('display', 'block');
			pageFancyboxGallery.css('display', 'none');
			pagePhotos.css('display', 'none');
		} else if (jQuery(this).val() == 'page-gallery-no-margins.php') {
			pageGallery.css('display', 'block');
			pageFancyboxGallery.css('display', 'none');
			pagePhotos.css('display', 'none');
			pageSliderSettings.css('display', 'none');
		} else if (jQuery(this).val() == 'page-slider.php') {
			pageGallery.css('display', 'block');
			pageFancyboxGallery.css('display', 'none');
			pagePhotos.css('display', 'none');
			pageSliderSettings.css('display', 'none');
		} else {
			pageGallery.css('display', 'none');
			pagePhotos.css('display', 'none');
			pageSliderSettings.css('display', 'none');
			pageFancyboxGallery.css('display', 'none');
		}
	});
	
	/** Gallery Admin - Switch between Image Gallery/Full Width Slider/Slider/Video Gallery/Gallery with Visible Nearby Images **/
	var galleryTypeSelect = jQuery('#mega_gallery_type'),
		galleryImage = jQuery('#mega-meta-box-gallery-post-type-photos'),
		gallerySlider = jQuery('#mega-meta-box-gallery-post-type-slider-settings'),
		galleryFancybox = jQuery('#mega-meta-box-gallery-post-type-fancybox'),
		currentGallery = galleryTypeSelect.val();
        
	gallerySwitch(currentGallery);

	galleryTypeSelect.change( function() {
		currentGallery = jQuery(this).val();       
		gallerySwitch(currentGallery);
	});
    
	function gallerySwitch(currentGallery) {
		if ( currentGallery == 'Image Gallery' ) {
			galleryImage.css('display', 'block');
			gallerySlider.css('display', 'none');
			galleryFancybox.css('display', 'none');
		} else if ( currentGallery == 'Full Width Slider' ) {
			gallerySlider.css('display', 'block');
			galleryImage.css('display', 'none');
			galleryFancybox.css('display', 'none');
		} else if ( currentGallery == 'Full Width of Window Slider' ) {
			gallerySlider.css('display', 'block');
			galleryImage.css('display', 'none');
			galleryFancybox.css('display', 'none');
		} else if ( currentGallery == 'FancyBox Gallery' ) {
			galleryFancybox.css('display', 'block');
			gallerySlider.css('display', 'none');
			galleryImage.css('display', 'none');
		} else {
			galleryImage.css('display', 'none');
			gallerySlider.css('display', 'none');
			galleryFancybox.css('display', 'none');
		}
	}
	
});