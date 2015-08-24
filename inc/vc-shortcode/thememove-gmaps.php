<?php
/**
 * ThemeMove Google Maps Shortcode
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Gmaps extends WPBakeryShortCode
{
  public function __construct($settings)
  {
    parent::__construct($settings);
    $this->jsScripts();
  }

  public function jsScripts()
  {
    wp_enqueue_script('thememove-js-maps', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en');
    wp_enqueue_script('thememove-js-gmap3', THEME_ROOT . '/js/gmap3.min.js');
  }
}

// Mapping shortcode
vc_map(array(
  'name' => __('Google Maps', 'thememove'),
  'base' => 'thememove_gmaps',
  'category' => __('by THEMEMOVE', 'thememove'),
  'params' => array(
    array(
      'type' => 'textfield',
      'heading' => __('Address or Coordinate', 'thememove'),
      'admin_label' => true,
      'param_name' => 'address',
      'value' => '40.7590615,-73.969231',
      'description' => __('Enter address or coordinate. To learn how to get coordinates, visit <a href="https://support.google.com/maps/answer/18539?hl=en" target="_blank">here</a>', 'thememove'),
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Marker icon', 'thememove'),
      'param_name' => 'marker_icon',
      'description' => __('Choose a image for marker address', 'thememove'),
    ),
    array(
      'type' => 'textarea_html',
      'heading' => __('Marker Information', 'thememove'),
      'param_name' => 'content',
      'description' => __('Content for info window', 'thememove'),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Height', 'thememove'),
      'param_name' => 'map_height',
      'value' => '480',
      'description' => __('Enter map height (in pixels or percentage)', 'thememove'),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Width', 'thememove'),
      'param_name' => 'map_width',
      'value' => '100%',
      'description' => __('Enter map width (in pixels or percentage)', 'thememove'),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Zoom level', 'thememove'),
      'param_name' => 'zoom',
      'value' => '16',
      'description' => __('Map zoom level', 'thememove'),
    ),
    array(
      'type' => 'checkbox',
      'heading' => __('Enable Map zoom', 'thememove'),
      'param_name' => 'zoom_enable',
      'value' => array(
        'Enable' => 'enable'
      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Map type', 'thememove'),
      'admin_label' => true,
      'param_name' => 'map_type',
      'description' => __('Choose a map type', 'thememove'),
      'value' => array(
        'Roadmap' => 'roadmap',
        'Satellite' => 'satellite',
        'Hybrid' => 'hybrid',
        'Terrain' => 'terrain',
      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Map style', 'thememove'),
      'admin_label' => true,
      'param_name' => 'map_style',
      'description' => __('Choose a map style. This approach changes the style of the Roadmap types (base imagery in terrain and satellite views is not affected, but roads, labels, etc. respect styling rules', 'thememove'),
      'value' => array(
        'Default' => 'default',
        'Grayscale' => 'style1',
        'Subtle Grayscale' => 'style2',
        'Apple Maps-esque' => 'style3',
        'Pale Dawn' => 'style4',
        'Muted Blue' => 'style5',
        'Paper' => 'style6',
        'Light Dream' => 'style7',
        'Retro' => 'style8',
        'Avocado World' => 'style9',
        'Facebook' => 'style10',
        'Custom' => 'custom'
      )
    ),
    array(
      'type' => 'textarea_raw_html',
      'heading' => __('Map style snippet', 'thememove'),
      'param_name' => 'map_style_snippet',
      'description' => __('To get the style snippet, visit <a href="https://snazzymaps.com" target="_blank">Sanzzymaps</a> or <a href="http://www.mapstylr.com/" target="_blank">Mapstylr</a>.', 'thememove'),
      'dependency' => array(
        'element' => 'map_style',
        'value' => 'custom',
      )
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Extra class name', 'thememove'),
      'param_name' => 'el_class',
      'description' => __('If you want to use multiple Google Maps in one page, please add a class name for them.', 'thememove'),
    ),
  )
));