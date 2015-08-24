<?php
/**
 * Color Copyright
 * ================
 */
$section = 'color_copyright';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

//--------------------
Kirki::add_field('', array(
  'type' => 'custom',
  'setting' => 'copyright_color_hr_' . $priority++,
  'section' => $section,
  'priority' => $priority++,
  'default' => '<hr />',
));

// Copyright bg color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'copyright_bg_color',
  'label' => __('Background Color', 'infinity'),
  'description' => __('Choose the background color for copyright', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[39],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.copyright',
      'property' => 'background-color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.copyright',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

// Copyright Text color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'copyright_text_color',
  'label' => __('Text Color', 'infinity'),
  'description' => __('Choose the text color', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[40],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.copyright p',
      'property' => 'color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.copyright p',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

// Copyright Link color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'copyright_link_color',
  'label' => __('Link Color', 'infinity'),
  'description' => __('Choose the color', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[41],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.copyright p a',
      'property' => 'color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.copyright p a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

// Copyright Link color on hover
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'copyright_link_color_on_hover',
  'description' => __('Choose the link color on hover', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[42],
  'output' => array(
    array(
      'element' => '.copyright p a:hover',
      'property' => 'color',
    ),
  )
));