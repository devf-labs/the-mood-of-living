<?php
/**
 * Initial setup
 * =============
 */
$new_vc_dir = get_template_directory() . '/inc/vc-template';
if (function_exists("vc_set_shortcodes_templates_dir")) {
  vc_set_shortcodes_templates_dir($new_vc_dir);
}

if (class_exists('WPBakeryShortCode')) {

  // params
  locate_template('/inc/vc-params/thememove-responsive/thememove_responsive.php', true);
  locate_template('/inc/vc-params/thememove-social-links/thememove_social_links.php', true);

  // shortcodes
  require_once locate_template('/inc/vc-shortcode/thememove-aboutme.php');
  require_once locate_template('/inc/vc-shortcode/thememove-facebook-page-like.php');
  require_once locate_template('/inc/vc-shortcode/thememove-gmaps.php');
  require_once locate_template('/inc/vc-shortcode/thememove-instagram.php');
  require_once locate_template('/inc/vc-shortcode/thememove-post-grid.php');
  require_once locate_template('/inc/vc-shortcode/thememove-recentposts.php');
  require_once locate_template('/inc/vc-shortcode/thememove-testimonials.php');
  require_once locate_template('/inc/vc-shortcode/thememove-twitter.php');
}

/**
 * Visual Composer Rewrite Classes
 * ===============================
 */
function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag)
{
  if ($tag == 'vc_row' || $tag == 'vc_row_inner') {
    $class_string = str_replace('vc_row-fluid', 'row', $class_string);
  }
  if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
    $class_string = preg_replace('/vc_col-xs-(\d{1,2})/', 'col-xs-$1', $class_string);
    $class_string = preg_replace('/vc_col-sm-(\d{1,2})/', 'col-sm-$1', $class_string);
    $class_string = preg_replace('/vc_col-md-(\d{1,2})/', 'col-md-$1', $class_string);
    $class_string = preg_replace('/vc_col-lg-(\d{1,2})/', 'col-lg-$1', $class_string);
  }
  return $class_string;
}

add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);

add_action( 'vc_before_init', 'disable_updater' );
function disable_updater() {
  vc_set_as_theme(true);
}

/**
 * Remove unused parameters
 * ========================
 */
if (function_exists('vc_remove_param')) {
}

/**
 * Add parameter
 * =============
 */