<?php
/**
 * Custom CSS
 * ===================
 */
$section = 'custom_css';
$priority = 1;

// Enable custom css
Kirki::add_field('infinity', array(
  'type'     => 'toggle',
  'settings' => 'custom_css_enable',
  'label'    => __('Enable custom css', 'infinity'),
  'section'  => $section,
  'default'  => false,
  'priority' => $priority++,
));

// Custom CSS
Kirki::add_field('infinity', array(
  'type'      => 'textarea',
  'settings'  => 'custom_css',
  'label'     => __('Custom CSS', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'required'  => array(
    array(
      'setting'  => 'custom_css_enable',
      'operator' => '==',
      'value'    => false,
    ),
  )
));