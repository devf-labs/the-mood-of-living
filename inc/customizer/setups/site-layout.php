<?php
/**
 * Site General
 * ================
 */
$section = 'site_layout';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Site layout
Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'site_layout',
  'label'       => __('Site layout', 'infinity'),
  'description' => __('Choose the site layout you want', 'infinity'),
  'help'        => __('Choose the site layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => site_layout,
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Archive layout
Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'archive_layout',
  'label'       => __('Archive layout', 'infinity'),
  'description' => __('Choose the archive layout you want', 'infinity'),
  'help'        => __('Choose the archive layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => archive_layout,
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Search layout
Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'search_layout',
  'label'       => __('Search layout', 'infinity'),
  'description' => __('Choose the search layout you want', 'infinity'),
  'help'        => __('Choose the search layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => search_layout,
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Single post layout
Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'post_layout',
  'label'       => __('Single Post layout', 'infinity'),
  'description' => __('Choose the single post layout you want', 'infinity'),
  'help'        => __('Choose the single post layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => post_layout,
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));