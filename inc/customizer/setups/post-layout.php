<?php
/**
 * Post Layout
 * ================
 */
$section = 'post_layout';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_layout_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Style
Kirki::add_field( 'infinity', array(
  'type'        => 'select',
  'setting'     => 'post_grid_layout',
  'default'     => post_grid_layout,
  'section'     => $section,
  'priority'    => $priority++,
  'choices'     => array(
    'full' => __('Full Post Layout', 'thememove'),
    'grid' => __('Grid Post Layout', 'thememove'),
    'list' => __('List Post Layout', 'thememove'),
    'masonry' => __('Masonry Post Layout', 'thememove'),
  ),
));