<?php

/**
 * Page General
 * ================
 */
$section = 'page_general';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'page_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />'
));

// Page Padding top
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_padding_top',
  'label'       => __('Padding', 'infinity'),
  'description' => __('Padding Top', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_padding_top,
  'transport'   => 'postMessage',
  'choices'   => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.content-wrapper',
      'property' => 'padding-top',
      'units'    => 'px'
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.content-wrapper',
      'function' => 'css',
      'property' => 'padding-top',
      'units'    => 'px'
    ),
  )
));

// Page Padding bottom
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_padding_bottom',
  'description' => __('Padding Bottom', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_padding_bottom,
  'transport'   => 'postMessage',
  'choices'   => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.content-wrapper',
      'property' => 'padding-bottom',
      'units'    => 'px'
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.content-wrapper',
      'function' => 'css',
      'property' => 'padding-bottom',
      'units'    => 'px'
    ),
  )
));

// Page Padding left
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_padding_left',
  'description' => __('Padding Left', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_padding_left,
  'transport'   => 'postMessage',
  'choices'   => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.content-wrapper',
      'property' => 'padding-left',
      'units'    => 'px'
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.content-wrapper',
      'function' => 'css',
      'property' => 'padding-left',
      'units'    => 'px'
    ),
  )
));

// Page Padding right
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_padding_right',
  'description' => __('Padding Right', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_padding_right,
  'transport'   => 'postMessage',
  'choices'   => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.content-wrapper',
      'property' => 'padding-right',
      'units'    => 'px'
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.content-wrapper',
      'function' => 'css',
      'property' => 'padding-right',
      'units'    => 'px'
    ),
  )
));