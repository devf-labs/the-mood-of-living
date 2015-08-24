<?php
/**
 * Load core.
 * =========
 */
locate_template('/core/customizer/includes/class-tm-customizer.php',true,true);
locate_template('/core/customizer/kirki/kirki.php',true,true);
locate_template('/core/welcome.php',true,true);

/**
 * Setup ThemeMove Menu
 * ====================
 */
add_action('admin_menu', 'my_admin_menu');
function my_admin_menu()
{
  $theme = wp_get_theme();
  //global $submenu;
  //unset($submenu['themes.php'][6]);// remove customize link
  remove_menu_page( 'thememove_options_import_page' );// remove import link
  add_menu_page( $theme->get('Name'), $theme->get('Name'), 'manage_options', 'thememove', 'thememove_welcome', 'dashicons-awards', 3 );
  add_submenu_page( 'thememove', 'Customize', 'Customize', 'manage_options', 'customize.php', null );
  add_submenu_page( 'thememove', 'Import Demo Data', 'Import Demo', 'manage_options', 'thememove_options_import_page', null );
}


if (is_admin() && isset($_GET['activated'])){
  wp_redirect(admin_url("admin.php?page=thememove"));
}

/**
 * Add CSS to backend
 */
//add custom css to admin
function admin_custom_css() {
  wp_enqueue_style( 'infinity-custom-admin-css', THEME_ROOT . '/core/css/custom.css' );
}

add_action('admin_head', 'admin_custom_css');

/**
 * Add JS to backend
 */
function admin_custom_js()
{
  wp_enqueue_script( 'infinity-custom-admin-js', THEME_ROOT . '/core/js/custom.js' );
}

add_action('admin_footer', 'admin_custom_js');

//skin js
function infinity_customize_control_js() {
  wp_enqueue_script( 'skin-control', THEME_ROOT . '/core/customizer/js/skin-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20141216', true );
}
add_action( 'customize_controls_enqueue_scripts', 'infinity_customize_control_js' );