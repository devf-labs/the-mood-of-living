<?php
/**
 * Color Social Icons
 */

$section = 'color_social';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'social_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Social color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'social_color',
  'label'       => __('Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[10],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.social a',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.social a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

// Social color on hover
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'social_color_on_hover',
  'description' => __('Social color on hover', 'thememove'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[11],
  'output'      => array(
    array(
      'element'  => '.social a:hover',
      'property' => 'color',
      'units'    => ' !important'
    ),
  )
));