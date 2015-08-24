<?php
/**
 * Breadcrumb
 * ================
 */
$section = 'site_breadcrumb';
$priority = 1;

// Enable Breadcrumb
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'enable_breadcrumb',
  'label'       => __('Breadcrumb', 'infinity'),
  'description' => __('Turn On This Option If You Want To Enable Breadcrumb on your site', 'infinity'),
  'default'     => enable_breadcrumb,
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_breadcrumb_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
  'required'  => array(
    array(
      'setting'  => 'enable_breadcrumb',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

// "Home" Text
Kirki::add_field('infinity', array(
  'type'        => 'text',
  'setting'     => 'breadcrumb_home_text',
  'label'       => __('"Home" text', 'infinity'),
  'description' => __('Change "Home" text on breadcrumb', 'infinity'),
  'default'     => 'Home',
  'section'     => $section,
  'priority'    => $priority++,
  'required'  => array(
    array(
      'setting'  => 'enable_breadcrumb',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_breadcrumb_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
  'required'  => array(
    array(
      'setting'  => 'enable_breadcrumb',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

// "You are here" text
Kirki::add_field('infinity', array(
  'type'        => 'text',
  'setting'     => 'breadcrumb_yah_text',
  'label'       => __('"You are here" text', 'infinity'),
  'description' => __('Change "You are here" text on breadcrumb', 'infinity'),
  'default'     => 'You are here:',
  'section'     => $section,
  'priority'    => $priority++,
  'required'  => array(
    array(
      'setting'  => 'enable_breadcrumb',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));