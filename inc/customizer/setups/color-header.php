<?php

/**
 * Color Header
 * ================
 */
$section = 'color_header';
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

// Header bg color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'header_bg_color',
  'label'       => __('Background Color', 'infinity'),
  'description' => __('Choose the background color for header area', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[7],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.header',
      'property' => 'background-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.header',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'header_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Header Text color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'header_text_color',
  'label'       => __('Text Color', 'infinity'),
  'description' => __('Choose the color for header text', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[8],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.header',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.header',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'header_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Border bottom color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'header_border_bottom_color',
  'label'       => __('Border Bottom Color', 'infinity'),
  'description' => __('Choose the border bottom color for header area', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[9],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.header',
      'property' => 'border-bottom-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.header',
      'function' => 'css',
      'property' => 'border-bottom-color',
    ),
  )
));