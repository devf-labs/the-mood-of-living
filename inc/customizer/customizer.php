<?php
/**
 * Infinity Theme Customizer
 *
 *  @package ThemeMove
 */

/**
 * Configuration sample for the Thememove Customizer
 * =============================================
 */
function thememove_configuration_customizer() {

  $args = array(
//    'logo_image'   => 'http://lily.thememove.com/data/images/logo.png',
    'color_accent' => '#ddbe85',
    'color_back'   => '#ffffff',
    'stylesheet_id'  => 'infinity-style-css',
    'description' => __('The Customizer allows you to preview changes to your site before publishing them. You can also navigate to different pages on your site to preview them.', 'kirki'),
    'width'       => '300px',
    'url_path'    => THEME_ROOT . '/core/customizer/kirki/'
	);

	return $args;

}
add_filter( 'kirki/config', 'thememove_configuration_customizer' );

/**
 * Config
 * =============================
 */
Kirki::add_config( 'infinity', array(
  'options_type' => 'theme_mod',
  'capability'   => 'edit_theme_options',
) );

/**
 * Add panels
 */
$priority = 1;
// Site
Kirki::add_panel('site', array(
  'priority'    => $priority++,
  'title'       => __('Site', 'infinity'),
  'description' => __('In this section you can control all settings of your site', 'infinity'),
));
// Header
Kirki::add_panel('header', array(
  'priority'    => $priority++,
  'title'       => __('Header', 'infinity'),
  'description' => __('In this section you can control all header settings of your site', 'infinity'),
));
// Page
Kirki::add_panel('page', array(
  'priority'    => $priority++,
  'title'       => __('Page', 'infinity'),
  'description' => __('In this section you can control all menu settings of your main page content', 'infinity'),
));
// Post
Kirki::add_panel('post', array(
  'priority'    => $priority++,
  'title'       => __('Post & Archive', 'infinity'),
  'description' => __('In this section you can control all menu settings of posts', 'infinity'),
));
// Footer
Kirki::add_panel('footer', array(
  'priority'    => $priority++,
  'title'       => __('Footer', 'infinity'),
  'description' => __('Scroll to bottom of page to see the change', 'infinity'),
));
// Navigation
Kirki::add_panel('nav', array(
  'priority'    => $priority++,
  'title'       => __('Navigation', 'infinity'),
  'description' => __('In this section you can control all menu settings of your site', 'infinity'),
));
// Button
Kirki::add_panel('button', array(
  'priority'    => $priority++,
  'title'       => __('Button', 'infinity'),
  'description' => __('In this section you can control all button settings of your site', 'infinity'),
));
// Color
Kirki::add_panel('color', array(
  'priority'    => $priority++,
  'title'       => __('Color', 'infinity'),
  'description' => __('In this section you can control all color settings of your site', 'infinity'),
));
// Custom code
Kirki::add_panel('custom', array(
  'priority'    => $priority++,
  'title'       => __('Custom code', 'infinity'),
  'description' => __('In this section you can add custom JavaScript and CSS to your site.', 'infinity'),
));

/**
 * Add sections for site panel
 */
// site_general
Kirki::add_section('site_general', array(
  'title'       => __('General', 'infinity'),
  'description' => __('In this section you can control all general settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));
// site_layout
Kirki::add_section('site_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can change layout for page of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));
// site_logo_favicon
Kirki::add_section('site_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control layout for pages of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));
// site_logo_favicon
Kirki::add_section('site_logo_favicon', array(
  'title'       => __('Logo & Favicon', 'infinity'),
  'description' => __('In this section you can control logo, favicon of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));
// site_breadcrumb
Kirki::add_section('site_breadcrumb', array(
  'title'       => __('Breadcrumb', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));
// site_typo
Kirki::add_section('site_typo', array(
  'title'       => __('Typography', 'infinity'),
  'description' => __('In this section you can control all typography settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));
// site_background
Kirki::add_section('background_image', array(
  'title'       => __('Background Image', 'infinity'),
  'description' => __('In this section you can change background image of the site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

/**
 * Add sections for navigation panel
 */
Kirki::add_section('nav', array(
  'title'       => __('Setup', 'infinity'),
  'description' => __('Select which menu you would like to use. You can edit your menu content on the Menus screen in the Appearance section', 'infinity'),
  'panel'       => 'nav',
  'priority'    => $priority++,
));

/**
 * Add sections for button panel
 */
Kirki::add_section('button_general', array(
    'title'       => __('General', 'infinity'),
    'panel'       => 'button',
    'priority'    => $priority++,
));

/**
 * Add sections for header panel
 */
// header_general
Kirki::add_section('header_general', array(
  'title'       => __('General', 'infinity'),
  'description' => __('In this section you can control all header settings of your site', 'infinity'),
  'panel'       => 'header',
  'priority'    => $priority++,
));

/**
 * Add sections for page panel
 */
// page_general
Kirki::add_section('page_general', array(
  'title'       => __('General', 'infinity'),
  'description' => __('In this section you can control all general settings for main page content', 'infinity'),
  'panel'       => 'page',
  'priority'    => $priority++,
));
// page_heading
Kirki::add_section('page_heading', array(
  'title'       => __('Heading Title', 'infinity'),
  'description' => __('In this section you can control page heading', 'infinity'),
  'panel'       => 'page',
  'priority'    => $priority++,
));

/**
 * Add sections for post panel
 */
// post_general
Kirki::add_section('post_general', array(
  'title'       => __('General', 'infinity'),
  'description' => __('In this section you can control all general settings for posts', 'infinity'),
  'panel'       => 'post',
  'priority'    => $priority++,
));
// post_layout
Kirki::add_section('post_layout', array(
  'title'       => __('Post Grid Layout', 'infinity'),
  'description' => __('In this section you can set up layout for posts grid in archive page', 'infinity'),
  'panel'       => 'post',
  'priority'    => $priority++,
));
// post_featured
if( class_exists('NS_Featured_Posts') ) {
  Kirki::add_section( 'post_featured', array(
    'title'       => __( 'Featured Posts', 'infinity' ),
    'description' => __( 'In this section you can control all settings for featured posts in archive page.', 'infinity' ),
    'panel'       => 'post',
    'priority'    => $priority ++,
  ) );
}

/**
 * Add sections for footer panel
 */
// footer_general
Kirki::add_section('footer_general', array(
  'title'       => __('General', 'infinity'),
  'description' => __('In this section you can control all footer settings of your site', 'infinity'),
  'panel'       => 'footer',
  'priority'    => $priority++,
));

/**
 * Add sections for color panel
 */
// color_site
Kirki::add_section('color_site', array(
  'title'       => __('Site', 'infinity'),
  'description' => __('In this section you can control all color settings of your site', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_header
Kirki::add_section('color_header', array(
  'title'       => __('Header', 'infinity'),
  'description' => __('In this section you can control all color settings of header.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_header
Kirki::add_section('color_page', array(
  'title'       => __('Page', 'infinity'),
  'description' => __('In this section you can control all color settings of main page content.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_footer
Kirki::add_section('color_footer', array(
  'title'       => __('Footer', 'infinity'),
  'description' => __('In this section you can control all color settings of footer.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_social
Kirki::add_section('color_social', array(
  'title'       => __('Social Icons', 'infinity'),
  'description' => __('In this section you can control all color settings of social icons.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_search
Kirki::add_section('color_search', array(
  'title'       => __('Search', 'infinity'),
  'description' => __('In this section you can control all color settings of search.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_nav
Kirki::add_section('color_nav', array(
  'title'       => __('Navigation', 'infinity'),
  'description' => __('In this section you can control all color settings of navigation.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_button
Kirki::add_section('color_button', array(
  'title'       => __('Button', 'infinity'),
  'description' => __('In this section you can control all color settings of button.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_content
Kirki::add_section('color_content', array(
  'title'       => __('Main Content', 'infinity'),
  'description' => __('In this section you can control all color settings of content section.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));
// color_copyright
Kirki::add_section('color_copyright', array(
  'title'       => __('Copyright', 'infinity'),
  'description' => __('In this section you can control all color settings of copyright.', 'infinity'),
  'panel'       => 'color',
  'priority'    => $priority++,
));

/**
 * Add sections for custom code panel
 */
Kirki::add_section('custom_css', array(
  'title'       => __('Custom CSS', 'infinity'),
  'description' => __('In this section you can control all general settings of your site', 'infinity'),
  'panel'       => 'custom',
  'priority'    => $priority++,
));
Kirki::add_section('custom_js', array(
  'title'       => __('Custom JS', 'infinity'),
  'description' => __('In this section you can control all general settings of your site', 'infinity'),
  'panel'       => 'custom',
  'priority'    => $priority++,
));

/**
 * Include setups
 * =============================
 */
//site
locate_template('/inc/customizer/setups/site-general.php', true, true);
locate_template('/inc/customizer/setups/site-layout.php', true, true);
locate_template('/inc/customizer/setups/site-logo-favicon.php', true, true);
//locate_template('/inc/customizer/setups/site-breadcrumb.php', true, true);
locate_template('/inc/customizer/setups/site-typo.php', true, true);
// header
locate_template('/inc/customizer/setups/header-general.php', true, true);
// page
locate_template('/inc/customizer/setups/page-general.php', true, true);
locate_template('/inc/customizer/setups/page-heading.php', true, true);
//post
locate_template('/inc/customizer/setups/post-general.php', true, true);
locate_template('/inc/customizer/setups/post-layout.php', true, true);
if( class_exists('NS_Featured_Posts') ) {
  locate_template( '/inc/customizer/setups/post-featured.php', true, true );
}
//footer
locate_template('/inc/customizer/setups/footer-general.php', true, true);
//button
locate_template('/inc/customizer/setups/button-general.php', true, true);
//color
locate_template('/inc/customizer/setups/color-site.php', true, true);
locate_template('/inc/customizer/setups/color-header.php', true, true);
locate_template('/inc/customizer/setups/color-social.php', true, true);
locate_template('/inc/customizer/setups/color-search.php', true, true);
locate_template('/inc/customizer/setups/color-nav.php', true, true);
locate_template('/inc/customizer/setups/color-button.php', true, true);
locate_template('/inc/customizer/setups/color-page.php', true, true);
locate_template('/inc/customizer/setups/color-footer.php', true, true);
locate_template('/inc/customizer/setups/color-copyright.php', true, true);
//custom code
locate_template('/inc/customizer/setups/custom-css.php', true, true);
locate_template('/inc/customizer/setups/custom-js.php', true, true);

// import-export
locate_template('/inc/customizer/io.php',true,true);

/**
 * Remove Unused Native Sections
 * =============================
 */
function infinity_customizer_sections( $wp_customize ) {
  $wp_customize->remove_section('nav');
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('title_tagline');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('static_front_page');

  $wp_customize->remove_control('blogname');
  $wp_customize->remove_control('blogdescription');
  $wp_customize->remove_control('page_for_posts');
  //$wp_customize->remove_control( 'nav_menu_locations[primary]' );
  //$wp_customize->remove_control( 'nav_menu_locations[footer]' );
  $wp_customize->get_section('io_section')->priority = '40';

//  $wp_customize->remove_control( 'blogname' );
//  $wp_customize->remove_control( 'blogdescription' );
//  $wp_customize->remove_control( 'page_for_posts' );
//  $wp_customize->remove_control( 'nav_menu_locations[primary]' );
//  $wp_customize->remove_control( 'nav_menu_locations[footer]' );
}
add_action( 'customize_register', 'infinity_customizer_sections' );

/**
 * Add custom css
 * =============================
 */
function infinity_customize_preview_css() {
  wp_enqueue_style( 'infinity-custom-css', THEME_ROOT . '/inc/customizer/css/custom.css' );
  wp_enqueue_script('infinity-kirki-custom-js',THEME_ROOT. '/inc/customizer/js/custom.js');
}
add_action( 'customize_controls_init', 'infinity_customize_preview_css' );

/**
 * Get single color scheme
 * @return Sngle color scheme
 */
function thememove_get_color_scheme() {
  $color_scheme_option = get_theme_mod( 'site_color_scheme', 'scheme1' );
  $color_schemes       = thememove_get_color_schemes();
  global $infinity_color_scheme;

  if ( $infinity_color_scheme == 'default' ) {
    return $color_schemes[ $color_scheme_option ]['colors'];
  } elseif ($infinity_color_scheme != 'default' && $infinity_color_scheme != ''){
    return $color_schemes[ $infinity_color_scheme ]['colors'];
  } elseif (array_key_exists( $color_scheme_option, $color_schemes )) {
    return $color_schemes[ $color_scheme_option ]['colors'];
  }

  return $color_schemes['scheme1']['colors'];
}

/**
 * Get color scheme choices
 * @return array
 */
function thememove_get_color_scheme_choices() {
  $color_schemes                = thememove_get_color_schemes();
  $color_scheme_control_options = array();

  foreach ( $color_schemes as $color_scheme => $value ) {
    $color_scheme_control_options[ $color_scheme ] = $value['label'];
  }

  return $color_scheme_control_options;
}