<?php
/**
 * Custom JS
 * ===================
 */
$section = 'custom_js';
$priority = 1;

// Custom JS enable
Kirki::add_field('infinity', array(
  'type'     => 'toggle',
  'settings' => 'custom_js_enable',
  'label'    => __('Enable custom JS', 'infinity'),
  'section'  => $section,
  'default'  => 0,
  'priority' => $priority++,
));

// Custom JS
Kirki::add_field('infinity', array(
  'type'      => 'textarea',
  'settings'  => 'custom_js',
  'label'     => __('Custom JS', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'required'  => array(
    array(
      'setting'  => 'custom_js_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));