<?php
/**
 * ThemeMove Instagram Shortcode
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Instagram extends WPBakeryShortCode
{
  public function __construct($settings)
  {
    parent::__construct($settings);
  }

  /**
   * Quick-and-dirty Instagram web scrape
   * based on https://gist.github.com/cosmocatalano/4544576
   * @param $username
   * @param int $slice
   * @return array|WP_Error
   */
  public function scrape_instagram( $username, $slice ) {

    $username = strtolower( $username );

    if ( false === ( $instagram = get_transient( 'instagram-media-new-'.sanitize_title_with_dashes( $username ) ) ) ) {

      $remote = wp_remote_get( 'https://instagram.com/'.trim( $username ) );

      if ( is_wp_error( $remote ) )
        return new WP_Error( 'site_down', __( 'Unable to communicate with Instagram.', 'thememove' ) );

      if ( 200 != wp_remote_retrieve_response_code( $remote ) )
        return new WP_Error( 'invalid_response', __( 'Instagram did not return a 200.', 'thememove' ) );

      $shards = explode( 'window._sharedData = ', $remote['body'] );
      $insta_json = explode( ';</script>', $shards[1] );
      $insta_array = json_decode( $insta_json[0], TRUE );

      if ( !$insta_array )
        return new WP_Error( 'bad_json', __( 'Instagram has returned invalid data.', 'thememove' ) );

      // old style
      if ( isset( $insta_array['entry_data']['UserProfile'][0]['userMedia'] ) ) {
        $media_arr = $insta_array['entry_data']['UserProfile'][0]['userMedia'];
        $type = 'old';
        // new style
      } else if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
        $media_arr = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
        $type = 'new';
      } else {
        return new WP_Error( 'bad_josn_2', __( 'Instagram has returned invalid data.', 'thememove' ) );
      }

      if ( !is_array( $media_arr ) )
        return new WP_Error( 'bad_array', __( 'Instagram has returned invalid data.', 'thememove' ) );

      $instagram = array();

      switch ( $type ) {
        case 'old':
          foreach ( $media_arr as $media ) {

            if ( $media['user']['username'] == $username ) {

              $media['link']						  = preg_replace( "/^http:/i", "", $media['link'] );
              $media['images']['thumbnail']		   = preg_replace( "/^http:/i", "", $media['images']['thumbnail'] );
              $media['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $media['images']['standard_resolution'] );
              $media['images']['low_resolution']	  = preg_replace( "/^http:/i", "", $media['images']['low_resolution'] );

              $instagram[] = array(
                'description' => $media['caption']['text'],
                'link'		  	=> $media['link'],
                'time'		  	=> $media['created_time'],
                'comments'	  => $media['comments']['count'],
                'likes'		 	  => $media['likes']['count'],
                'thumbnail'	 	=> $media['images']['thumbnail'],
                'large'		 	  => $media['images']['standard_resolution'],
                'small'		 	  => $media['images']['low_resolution'],
                'type'		  	=> $media['type']
              );
            }
          }
          break;
        default:
          foreach ( $media_arr as $media ) {

            $media['display_src'] = preg_replace( "/^http:/i", "", $media['display_src'] );

            if ( $media['is_video']  == true ) {
              $type = 'video';
            } else {
              $type = 'image';
            }

            $instagram[] = array(
              'description'   => __( 'Instagram Image', 'thememove' ),
              'link'		  	  => '//instagram.com/p/' . $media['code'],
              'time'		  	  => $media['date'],
              'comments'	  	=> $media['comments']['count'],
              'likes'		 	    => $media['likes']['count'],
              'thumbnail'	 	  => $media['display_src'],
              'type'		  	  => $type
            );
          }
          break;
      }

      // do not set an empty transient - should help catch private or empty accounts
      if ( ! empty( $instagram ) ) {
        $instagram = base64_encode( serialize( $instagram ) );
        set_transient( 'instagram-media-new-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
      }
    }

    if ( ! empty( $instagram ) ) {

      $instagram = unserialize( base64_decode( $instagram ) );
      return array_slice( $instagram, 0, $slice );;

    } else {

      return new WP_Error( 'no_images', __( 'Instagram did not return any images.', 'thememove' ) );

    }
  }
}

// Mapping shortcode
vc_map(array(
  'name' => __('Instagram', 'thememove'),
  'description' => __('Displays latest Instagram photos', 'thememove'),
  'base' => 'thememove_instagram',
  'category' => __('by THEMEMOVE', 'thememove'),
  'params' => array(
    array(
      'group' => __('General', 'thememove'),
      'type' => 'textfield',
      'heading' => __('Instagram Username', 'thememove'),
      'admin_label' => true,
      'param_name' => 'username',
      'value' => '',
      'description' => __('Enter Instagram username (not include @). Example: <b>thememove</b>', 'thememove'),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'textfield',
      'heading' => __('Number of items', 'thememove'),
      'admin_label' => true,
      'param_name' => 'number_items',
      'value' => '6',
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'dropdown',
      'heading' => __('Item Width', 'thememove'),
      'description' => __('Enter item width in a row (has 12 columns)', 'thememove'),
      'admin_label' => true,
      'param_name' => 'item_width_md',
      'value' =>  array(
        __('Default (2 columns - 1/6 - 6 items in a row)', 'thememove') => 2,
        __('1 columns - 1/1 - 12 items in a row', 'thememove') => 1,
        __('2 columns - 1/6 - 6 items in a row', 'thememove')  => 2,
        __('3 columns - 1/4 - 4 items in a row', 'thememove')  => 3,
        __('4 columns - 1/3 - 3 items in a row', 'thememove')  => 4,
        __('6 columns - 1/2 - 2 items in a row', 'thememove')  => 6,
        __('12 columns - 1/1 - 1 item in a row', 'thememove')  => 12,
      ),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'textfield',
      'heading' => __('Item spacing', 'thememove'),
      'param_name' => 'spacing',
      'value' => '0',
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'checkbox',
      'param_name' => 'show_likes_comments',
      'value' => array(
        __('Show likes and comments', 'thememove') => true,
      )
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'checkbox',
      'param_name' => 'show_follow_text',
      'value' => array(
        __('Show follow text', 'thememove') => true
      ),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'textarea_html',
      'heading' => __('Text', 'thememove'),
      'param_name' => 'content',
      'value' => __('Follow us on Instagram', 'thememove'),
      'dependency' => array('element' => 'show_follow_text', 'not_empty' => true)
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'checkbox',
      'param_name' => 'link_new_page',
      'value' => array(
        __('Open links in new page', 'thememove') => true
      )
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'textfield',
      'heading' => __('Extra class name', 'thememove'),
      'param_name' => 'el_class',
      'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememove'),
    ),
    array(
      'group' => __('Responsive Options', 'thememove'),
      'type' => 'thememove_responsive',
      'heading' => __('Responsiveness', 'thememove'),
      'param_name' => 'responsive',
      'description' => __( 'Adjust Number of items in a row for different screen sizes.', 'thememove' )
    ),
  )
));