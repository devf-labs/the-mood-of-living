<?php
/**
 * Define the custom box for posts.
 */
 
$prefix = 'mega_';
 
$meta_box_post_gallery = array(
	'id' => 'mega-meta-box-post-gallery',
	'title' =>  __( 'Gallery Settings', 'mega' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(  "name" => __( 'Uploads/Manage Images', 'mega' ),
				"desc" => __( "Here's the list of the images", 'mega' ),
				"type" => "attachments",
				'std' => ''
			)		
	)
);

$meta_box_post_video = array(
	'id' => 'mega-meta-box-post-video',
	'title' =>  __( 'Video Settings', 'mega' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(		
		array( 	"desc" => __( 'Video sharing website:', 'mega' ),
				"type" => "info"
		),
		array(
				'name' => __( 'YouTube or Vimeo URL', 'mega' ),
				'desc' => __( 'Enter the YouTube or Vimeo URL here. <br/> http://www.youtube.com/watch?v=VIDEO_ID <br/>or<br/> http://vimeo.com/VIDEO_ID', 'mega' ),
				'id' => $prefix.'youtube_vimeo_url',
				'type' => 'text',
				'std' => ''
		),
		array(
				'name' => __( 'Embed Code', 'mega' ),
				'desc' => __( 'If you are using other video sharing website, paste the embed code here', 'mega' ),
				'id' => $prefix . 'video_embed_code',
				'type' => 'textarea',
				'std' => ''
		),
		array(	"desc" => __( 'Aspect Ratio (default 16:9):', 'mega' ),
				"type" => "info"
		),
		array(
			'name' => __( 'Video Width', 'mega' ),
			'desc' => __("Enter the video's width", 'mega'),
			'id' => $prefix . 'video_ratio_width',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Video Height', 'mega' ),
			'desc' => __( "Enter the video's height", 'mega' ),
			'id' => $prefix . 'video_ratio_height',
			'type' => 'text',
			'std' => ''
		),
	)	
);

$meta_box_post_audio = array(
	'id' => 'mega-meta-box-post-audio',
	'title' =>  __( 'Audio Settings', 'mega' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
				'name' => __( 'Embed Code', 'mega' ),
				'desc' => __( 'If you are using an audio sharing service like SoundCloud, paste the embed code here', 'mega' ),
				'id' => $prefix . 'audio_embed_code',
				'type' => 'textarea',
				'std' => ''
		)	
	)
);

$meta_box_post_quote = array(
	'id' => 'mega-meta-box-post-quote',
	'title' =>  __( 'Quote Settings', 'mega' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 	"name" => __( 'The Quote', 'mega' ),
				"desc" => __( 'Insert your quote', 'mega' ),
				"id" => $prefix."quote",
				"type" => "textarea",
				"std" => ""
		),
		array( 	"name" => __( 'The Quote Source', 'mega' ),
				"desc" => __( 'Insert the source of your quote', 'mega' ),
				"id" => $prefix."quote_source",
				"type" => "text",
				"std" => ""
		)
	)
);

/**
 * Adds a box.
 */

add_action('add_meta_boxes', 'mega_add_box_post');

function mega_add_box_post() {
	global $meta_box_post_video, $meta_box_post_audio, $meta_box_post_quote, $meta_box_post_image, $meta_box_post_gallery;
	add_meta_box($meta_box_post_gallery['id'], $meta_box_post_gallery['title'], 'mega_show_box_post_gallery', $meta_box_post_gallery['page'], $meta_box_post_gallery['context'], $meta_box_post_gallery['priority']);
	add_meta_box($meta_box_post_video['id'], $meta_box_post_video['title'], 'mega_show_box_post_video', $meta_box_post_video['page'], $meta_box_post_video['context'], $meta_box_post_video['priority']);
	add_meta_box($meta_box_post_audio['id'], $meta_box_post_audio['title'], 'mega_show_box_post_audio', $meta_box_post_audio['page'], $meta_box_post_audio['context'], $meta_box_post_audio['priority']);
	add_meta_box($meta_box_post_quote['id'], $meta_box_post_quote['title'], 'mega_show_box_post_quote', $meta_box_post_quote['page'], $meta_box_post_quote['context'], $meta_box_post_quote['priority']);
}

/**
 * Prints the box content.
 */
function mega_show_box_post_gallery() {
	global $meta_box_post_gallery, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="mega_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<table class="form-table mega-custom-table">';
 
	foreach ($meta_box_post_gallery['fields'] as $field) {
		
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], true);
		
		switch ($field['type']) {
			
			//If Attachments
			case 'attachments':
				echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
				$args = array(
					'post_type' => 'attachment',
					'post_status' => 'inherit',
					'post_parent' => $post->ID,
					'post_mime_type' => 'image',
					'posts_per_page' => '-1',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'exclude' => get_post_thumbnail_id()
				);
				
				$intro = '<p><a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=715" id="add_image" class="thickbox" title="' . __( 'Upload Images', 'mega' ) . '">' . __( 'Upload Images', 'mega' ) . '</a> | <a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;tab=gallery&amp;TB_iframe=1&amp;width=640&amp;height=715" id="manage_gallery" class="thickbox" title="' . __( 'Manage Images', 'mega' ) . '">' . __( 'Manage Images', 'mega' ) . '</a></p>';
				echo $intro;
				
				$return = '';
				$attachments = get_posts( $args );
				
					$return .= '<div class="mega_attachments">';
						if( empty( $attachments ) )
							$return .= '<p>'. __('No images.','mega'). '</p>';
						else {
							foreach( $attachments as $image ):
								$thumbnail = wp_get_attachment_image_src( $image->ID, 'thumbnail');
								$return .= '<img style="margin-right:5px;" width="100" height="100" src="' . $thumbnail[0] . '" alt="' . apply_filters('the_title', $image->post_title). '"/>';
							endforeach;
						}
					$return .= '</div>';
				echo $return;
				
				echo 	'</td>',
				'</tr>';				
			break;				
			
		}
	} 
	echo '</table>';
}

function mega_show_box_post_video() {
	global $meta_box_post_video, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to add video to your post. You have the choice between YouTube or Vimeo, or any other Video Sharing Websites.', 'mega').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="mega_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table mega-custom-table">';
 
	foreach ($meta_box_post_video['fields'] as $field) {
	
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], true);
			
		switch ($field['type']) {
			
			//If Info
			case 'info':
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%;"><span style="display:inline-block;margin:5px 0;font-weight:bold;text-transform:uppercase;border-bottom:1px solid #666;">'. $field['desc'].'<strong></th>',
					'<td></td></tr>';
			break;
		 
			//If Text		
			case 'text':			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:90%; margin-right: 20px; float:left;" />';
				echo '</td>',
				'</tr>';
			break;
			 
			//If textarea		
			case 'textarea':
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
			break;
			
		}

	}
 
	echo '</table>';
}

function mega_show_box_post_audio() {
	global $meta_box_post_audio, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__( 'These settings enable you to add audio to your post.', 'mega' ).'</p>';

	// Use nonce for verification
	echo '<input type="hidden" name="mega_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table mega-custom-table">';
 
	foreach ($meta_box_post_audio['fields'] as $field) {
	
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			
			//If textarea		
			case 'textarea':
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
			break;

		}

	}
 
	echo '</table>';
}

function mega_show_box_post_quote() {
	global $meta_box_post_quote, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="mega_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table mega-custom-table">';
 
	foreach ($meta_box_post_quote['fields'] as $field) {
	
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 			
			//If textarea		
			case 'textarea':
			
				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
			break;
			
			//If Text		
			case 'text':			
				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:90%; margin-right: 20px; float:left;" />';
				echo '</td>',
				'</tr>';
			break;

		}

	}
 
	echo '</table>';
}

/**
 * Save data from meta box.
 */
add_action( 'save_post', 'mega_save_data_post' );
 
function mega_save_data_post($post_id) {
	global $meta_box_post_image, $meta_box_post_gallery, $meta_box_post_video, $meta_box_post_audio, $meta_box_post_quote;
 
	if ( isset($_POST['mega_meta_box_nonce'])) {
		// verify nonce
		if (!wp_verify_nonce($_POST['mega_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}
	 
		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
	 
		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		
		foreach ($meta_box_post_gallery['fields'] as $field) {
			if(isset($field['id'])){
				$old = get_post_meta($post_id, $field['id'], true);
				$new = $_POST[$field['id']];
		 
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}
			}
		}
		
		foreach ($meta_box_post_video['fields'] as $field) {
			if(isset($field['id'])){
				$old = get_post_meta($post_id, $field['id'], true);
				$new = $_POST[$field['id']];
		 
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}
			}
		}
		
		foreach ($meta_box_post_audio['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_post_quote['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
			
	}
}

/**
 * Queue Scripts.
 */
function mega_admin_scripts_post() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('si-upload', get_template_directory_uri() . '/inc/upload-media.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('si-upload');
}
function mega_admin_styles_post() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'mega_admin_scripts_post');
add_action('admin_print_styles', 'mega_admin_styles_post');
