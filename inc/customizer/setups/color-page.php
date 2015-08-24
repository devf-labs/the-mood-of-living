<?php

/**
 * Color Page
 * ================
 */
$section = 'color_page';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'header_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

//Background Color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'page_bg_color',
  'label'       => __('Background Color', 'infinity'),
  'description' => __('Choose the background color for main page area', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[45],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.content-wrapper',
      'property' => 'background-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.content-wrapper',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));