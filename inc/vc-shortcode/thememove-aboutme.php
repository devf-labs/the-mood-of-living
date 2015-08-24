<?php

/**
 * ThemeMove Aboutmes Shortcode
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Aboutme extends WPBakeryShortCode
{

  public function getSocialLinks($atts)
  {
    $social_links = preg_split('/\s+/', $atts['social_links']);
    $social_links_arr = array();

    foreach ($social_links as $social) {
      $pieces = explode('|', $social);
      if (count($pieces) == 2) {
        $key = $pieces[0];
        $link = $pieces[1];
        $social_links_arr[$key] = $link;
      }
    }

    return $social_links_arr;
  }
}

// Mapping shortcode
vc_map(array(
  'name' => __('About me', 'thememove'),
  'base' => 'thememove_aboutme',
  'description' => __('Display your information', 'thememove'),
  'category' => __('by THEMEMOVE', 'thememove'),
  'params' => array(
    array(
      'group' => __('General', 'thememove'),
      'type' => 'attach_image',
      'heading' => __('Avatar Image', 'thememove'),
      'param_name' => 'avatar',
      'value' => '',
      'description' => __('Select images from media library.', 'thememove'),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'dropdown',
      'heading' => __('Image shape', 'thememove'),
      'param_name' => 'shape',
      'value' => array(
        'Circle' => 'circle',
        'Square' => 'square',
      ),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'textarea_html',
      'heading' => __('Description', 'thememove'),
      'param_name' => 'content',
      'description' => __('', 'thememove'),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'dropdown',
      'heading' => __('Icon background shape', 'thememove'),
      'description' => __('Select background shape and style for icon', 'thememove'),
      'param_name' => 'social_shape',
      'value' => array(
        'Circle' => 'circle',
        'Square' => 'square',
        'Outline Circle' => 'outline-circle',
        'Outline Square' => 'outline-square',
      ),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'checkbox',
      'param_name' => 'link_new_page',
      'value' => array(
        __('Open links in new page', 'thememove') => true
      ),
    ),
    array(
      'group' => __('General', 'thememove'),
      'type' => 'textfield',
      'heading' => __('Extra class name', 'thememove'),
      'param_name' => 'el_class',
      'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememove'),
    ),
    array(
      'group' => __('Social', 'thememove'),
      'type' => 'social_links',
      'heading' => __('Social links', 'thememove'),
      'param_name' => 'social_links',
      'description' => __('Enter your social links.', 'thememove'),
    ),
  )
));