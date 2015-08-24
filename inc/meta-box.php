<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats($field)
{
  // Don't show this field if not in the cats category
  if (!has_tag('cats', $field->object_id)) {
    return false;
  }
  return true;
}

add_filter('cmb2_meta_boxes', 'infinity_metaboxes');
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function infinity_metaboxes(array $meta_boxes)
{

  // Start with an underscore to hide fields from custom fields list
  $prefix = 'infinity_';

  /**
   * Sample metabox to demonstrate each field type included
   */
  $meta_boxes['page_metabox'] = array(
    'id'           => 'page_metabox',
    'title'        => __('Page Settings', 'infinity'),
    'object_types' => array('page'), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
    //'cmb_styles' => false, // false to disable the CMB stylesheet
    //'closed'     => true, // true to keep the metabox closed by default
    'fields'       => array(
      // Sticky Header
      array(
        'name'    => __('Sticky Header', 'infinity'),
        'desc'    => __('Custom settings for sticky header', 'infinity'),
        'id'      => $prefix . 'sticky_header',
        'type'    => 'select',
        'options' => array(
          'default' => __('Default', 'infinity'),
          'enable'  => __('Enable', 'infinity'),
          'disable' => __('Disable', 'infinity'),
        ),
      ),
      // Uncover Footer
      array(
        'name'    => __('Uncover Footer', 'infinity'),
        'desc'    => __('Custom settings for uncover footer option', 'infinity'),
        'id'      => $prefix . 'uncover_enable',
        'type'    => 'select',
        'options' => array(
          'default' => __('Default', 'infinity'),
          'enable'  => __('Enable', 'infinity'),
          'disable' => __('Disable', 'infinity'),
        ),
      ),
      // Custom Logo
      array(
        'name' => __( 'Custom Logo', 'infinity' ),
        'desc' => __( 'Upload an image or enter a URL for logo', 'infinity' ),
        'id'   => $prefix . 'custom_logo',
        'type' => 'file',
      ),
      // Page Layout
      array(
        'name'    => __('Page Layout', 'infinity'),
        'desc'    => __('Choose a layout you want', 'infinity'),
        'id'      => $prefix . 'page_layout',
        'type'    => 'select',
        'options' => array(
          'default'         => __('Default', 'infinity'),
          'full-width'      => __('Full width', 'infinity'),
          'content-sidebar' => __('Content-Sidebar', 'infinity'),
          'sidebar-content' => __('Sidebar-Content', 'infinity'),
        ),
      ),
      // Disable Title
      array(
        'name' => __('Disable Title', 'infinity'),
        'desc' => __('Check this box to disable the title of the page', 'infinity'),
        'id' => $prefix . 'disable_title',
        'type' => 'checkbox'
      ),
      // Title Style
      array(
        'name' => __('Title Style', 'infinity'),
        'desc' => __('Choose style for the title of the page', 'infinity'),
        'id' => $prefix . 'title_style',
        'type' => 'select',
        'options' => array(
          'default' => __('Default', 'infinity'),
          'image' => __('Image Background', 'infinity'),
          'bg_color' => __('Single Color Background', 'infinity'),
        ),
      ),
      // Image Background
      array(
        'name' => __( 'Image Background', 'infinity' ),
        'desc' => __( 'Upload an image or enter a URL for heading title', 'infinity' ),
        'id'   => $prefix . 'heading_image',
        'type' => 'file',
      ),
      // Disable Parallax
      array(
        'name' => __('Disable Parallax', 'infinity' ),
        'desc' => __('Check this box to disable parallax effect for heading title', 'infinity'),
        'id' => $prefix . 'disable_parallax',
        'type' => 'checkbox'
      ),
      // Title Background Color
      array(
        'name' => __('Title Background Color', 'infinity'),
        'desc' => __('Pick a background color for heading title', 'infinity'),
        'id' => $prefix . 'heading_bg_color',
        'default' => '#fff',
        'type' => 'colorpicker',
      ),
      // Title Color
      array(
        'name' => __('Title Color', 'infinity'),
        'desc' => __('Pick a color for heading title', 'infinity'),
        'id' => $prefix . 'heading_color',
        'default' => '#111',
        'type' => 'colorpicker',
      ),
      // Alternative Title
      array(
        'name'    => __('Alternative Title', 'infinity'),
        'desc'    => __('Enter your alternative title here', 'infinity'),
        'id'      => $prefix . 'alt_title',
        'type'    => 'textarea_small'
      ),
      // Custom Class
      array(
        'name'    => __('Custom Class', 'infinity'),
        'desc'    => __('Enter custom class for this page', 'infinity'),
        'id'      => $prefix . 'custom_class',
        'type'    => 'text'
      ),
    ),
  );

  return $meta_boxes;
}
