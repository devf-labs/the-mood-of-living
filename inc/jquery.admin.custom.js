jQuery(document).ready(function() {

	/** Post Admin - Show Approprite Metaboxes when Post Format selected **/
	
	var galleryMetabox = jQuery('#mega-meta-box-post-gallery');
	var galleryTrigger = jQuery('#post-format-gallery');	
	galleryMetabox.css('display', 'none');
	
	var quoteMetabox = jQuery('#mega-meta-box-post-quote');
	var quoteTrigger = jQuery('#post-format-quote');	
	quoteMetabox.css('display', 'none');

	var videoMetabox = jQuery('#mega-meta-box-post-video');
	var videoTrigger = jQuery('#post-format-video');	
	videoMetabox.css('display', 'none');
	
	var audioMetabox = jQuery('#mega-meta-box-post-audio');
	var audioTrigger = jQuery('#post-format-audio');	
	audioMetabox.css('display', 'none');
	
	jQuery('#post-formats-select input').change( function() {	
		if(jQuery(this).val() == 'gallery') {
			hideAllExcept(galleryMetabox);
		} else if ( jQuery(this).val() == 'quote' ) {
			hideAllExcept(quoteMetabox);
		} else if (jQuery(this).val() == 'video') {
			hideAllExcept(videoMetabox);
		} else if (jQuery(this).val() == 'audio') {
			hideAllExcept(audioMetabox);
		} else {
			galleryMetabox.css('display', 'none');
			quoteMetabox.css('display', 'none');
			videoMetabox.css('display', 'none');
			audioMetabox.css('display', 'none');
		}		
	});
	
	if (galleryTrigger.is(':checked'))
		galleryMetabox.css('display', 'block');
		
	if (quoteTrigger.is(':checked'))
		quoteMetabox.css('display', 'block');
	
	if (audioTrigger.is(':checked'))
		audioMetabox.css('display', 'block');
		
	if (videoTrigger.is(':checked'))
		videoMetabox.css('display', 'block');
		
	function hideAllExcept(metabox) {
		galleryMetabox.css('display', 'none');
		quoteMetabox.css('display', 'none');
		videoMetabox.css('display', 'none');
		audioMetabox.css('display', 'none');
		metabox.css('display', 'block');
	}
	
	/** Show Appropriate Metaboxes when Template selected **/
	var pageRev = jQuery('#mega-meta-box-page-revolution');
	pageRev.css('display', 'none');
	
	if ( jQuery('#page_template').val() == 'page-front-rev.php' ) {
			pageRev.css('display', 'block');
	}
	
	jQuery("#page_template").change(function(){
		if ( jQuery('#page_template').val() == 'page-front-rev.php' ) {
			pageRev.css('display', 'block');
		}
		else {
			pageRev.css('display', 'none');
		}
	});
	
	/** Ajax Attachments Metabox **/
	// thickbox window closed
	if( "function" === typeof(jQuery.fn.on) ) // WP >= 3.3
		jQuery(document.body).on("tb_unload", "#TB_window",refreshGalleryMetabox);
	else  // WP < 3.3
		jQuery('#TB_window').live("unload", refreshGalleryMetabox);
		
	// Ajax Attachments Metabox
	function refreshGalleryMetabox() {
			if(jQuery('.mega_attachments').parents('.postbox').is(":visible")){
				var post_id = jQuery("#post_ID").val();
				
				jQuery.ajax({
							type: 'POST',
							url: ajaxurl,
							dataType:'html',
							data: {
								action: 'refresh_metabox',
								post_id: post_id
							},
							success:function(res) {
							jQuery('.mega_attachments').html(res);
						}
				   });
			}				
	}
	
	
});