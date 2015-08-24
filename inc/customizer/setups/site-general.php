<?php
/**
 * Site General
 * ================
 */
$section = 'site_general';
$priority = 3;

function frontpage_setup( $wp_customize ) {
  $wp_customize->get_control( 'show_on_front' )->section = 'site_general';
  $wp_customize->get_control( 'show_on_front' )->priority = '2';
  $wp_customize->get_control( 'page_on_front' )->section = 'site_general';
  $wp_customize->get_control( 'page_on_front' )->priority = '3';
  $wp_customize->get_control( 'page_on_front' )->label = __('Choose a page', 'infinity');
  $wp_customize->get_control( 'show_on_front' )->label = '';
}
add_action( 'customize_register', 'frontpage_setup' );

// Skin
Kirki::add_field('infinity', array(
  'type'     => 'select',
  'setting'  => 'skin',
  'label'    => __('Skin', 'infinity'),
  'section'  => $section,
  'choices'   => apply_filters( 'tm_customizer_skins', array() ),
  'priority' => 1,
  'default'  => apply_filters( 'tm_customizer_default_skin', '' ),
  'transport' => 'postMessage'
));

// Front page title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_general_group_title_' . $priority++,
  'section'  => $section,
  'priority' => 1,
  'default'  => '<div class="group_title">' . __('Front page', 'infinity') . '</div>',
));

// Other Settings page title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_general_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">' . __('Other Settings', 'infinity') . '</div>',
));

//Box Mode
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'box_mode_enable',
  'default'     => box_mode_enable,
  'label'       => __('Box Mode', 'infinity'),
  'description' => __('Turn on this option if you want to enable box mode on your site', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

//Smooth Scroll
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'enable_smooth_scroll',
  'label'       => __('Smooth Scroll', 'infinity'),
  'description' => __('Enabling this option will perform a smooth scrolling effect on every page', 'infinity'),
  'default'  => enable_smooth_scroll,
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

//Back To Top
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'enable_back_to_top',
  'label'       => __('Back To Top', 'infinity'),
  'description' => __('Enabling this option will display a Back to Top button on every page', 'infinity'),
  'default'     => enable_back_to_top,
  'section'     => $section,
  'priority'    => $priority++,
));