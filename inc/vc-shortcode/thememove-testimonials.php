<?php

/**
 * ThemeMove Testimonials Shortcode
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Testimonials extends WPBakeryShortCode
{
}

// Mapping shortcode
vc_map(array(
  'name' => __('Testimonials', 'thememove'),
  'base' => 'thememove_testi',
  'category' => __('by THEMEMOVE', 'thememove'),
  'allowed_container_element' => 'vc_row',
  'params' => array(
    array(
      'type' => 'dropdown',
      'heading' => __('Enable Carousel', 'thememove'),
      'param_name' => 'enable_carousel',
      'value' => array(
        'No' => 'false',
        'Yes' => 'true',
      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Show Bullets', 'thememove'),
      'param_name' => 'display_bullets',
      'value' => array(
        'No' => 'false',
        'Yes' => 'true',
      ),
      'dependency' => Array('element' => 'enable_carousel', 'value' => array('true'))
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Enable Autoplay', 'thememove'),
      'param_name' => 'enable_autoplay',
      'value' => array(
        'No' => 'false',
        'Yes' => 'true',
      ),
      'dependency' => Array('element' => 'enable_carousel', 'value' => array('true'))
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Number', 'thememove'),
      'param_name' => 'limit',
      'value' => '',
      'description' => __('Number of Testimonials', 'thememove')
    ),
    array(
      'type' => 'dropdown',
      'heading' => 'Order by',
      'param_name' => 'orderby',
      'value' => array(
        'None' => 'none',
        'ID' => 'ID',
        'Title' => 'title',
        'Date' => 'date',
        'Menu Order' => 'menu_order',
      ),
      'description' => 'How to order the items'
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Order', 'thememove'),
      'param_name' => 'order',
      'value' => array(
        'DESC' => 'DESC',
        'ASC' => 'ASC',
      ),
      'description' => __('How to order the items', 'thememove')
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Show Author Info', 'thememove'),
      'param_name' => 'display_author',
      'value' => array(
        'No' => 'false',
        'Yes' => 'true',
      ),
      'description' => __('Choose yes to show author name and byline', 'thememove')
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Show URL', 'thememove'),
      'param_name' => 'display_url',
      'value' => array(
        'No' => 'false',
        'Yes' => 'true',
      ),
      'description' => __('Choose yes to show author url', 'thememove'),
      'dependency' => Array('element' => 'display_author', 'value' => array('true'))
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Show Author Image', 'thememove'),
      'param_name' => 'display_avatar',
      'value' => array(
        'No' => false,
        'Yes' => true,
      ),
      'description' => 'Choose yes to show author avatar',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Avatar Size', 'thememove'),
      'param_name' => 'size',
      'value' => '',
      'description' => __('Size of Avatar', 'thememove'),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Extra class name', 'thememove'),
      'param_name' => 'el_class',
      'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememove'),
    )
  )
));