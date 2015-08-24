<?php
/**
 * Header General
 * ================
 */
$section = 'header_general';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'header_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Sticky Header
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'header_sticky_enable',
  'default'     => header_sticky_enable,
  'label'       => __('Sticky', 'infinity'),
  'description' => __('Enabling this option will sticky your header', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'header_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));


// Search enable
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'header_search_enable',
  'default'     => header_search_enable,
  'label'       => __('Search', 'infinity'),
  'description' => __('Enabling this option will display search button on header', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));