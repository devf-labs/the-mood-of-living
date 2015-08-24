<?php
/**
 * ThemeMove Recentposts Shortcode
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Recentposts extends WPBakeryShortCode
{
}

// Mapping shortcode
vc_map(array(
  'name' => __('Recent Posts', 'thememove'),
  'base' => 'thememove_recentposts',
  'category' => __('by THEMEMOVE', 'thememove'),
  'params' => array(
    array(
      'type' => 'checkbox',
      'param_name' => 'show_title',
      'value' => array(
        'Show title' => true
      )
    ),
    array(
      'type' => 'checkbox',
      'param_name' => 'show_excerpt',
      'value' => array(
        'Show excerpt' => true
      )
    ),
    array(
      'type' => 'checkbox',
      'param_name' => 'show_meta',
      'value' => array(
        'Show Meta' => true
      )
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Enter numbers of articles', 'thememove'),
      'param_name' => 'number',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Extra class name', 'thememove'),
      'param_name' => 'el_class',
      'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememove'),
    ),
  )
));