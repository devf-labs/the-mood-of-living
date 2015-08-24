<?php
/**
 * Footer General
 * ================
 */
$section = 'footer_general';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'footer_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Uncovering Footer
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'footer_uncovering_enable',
  'default'     => footer_uncovering_enable,
  'label'       => __('Uncovering', 'infinity'),
  'description' => __('Enabling this option will make Footer gradually appear on scroll', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));


// Copyright title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'footer_general_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">' . __('Copyright', 'infinity') . '</div>',
));

// Copyright
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'footer_copyright_enable',
  'default'     => footer_copyright_enable,
  'description' => __('Enabling this option will display copyright info', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

// Copyright Text
Kirki::add_field('infinity', array(
  'type'        => 'textarea',
  'setting'     => 'footer_copyright_text',
  'default'     => footer_copyright_text,
  'label'       => __('Copyright Text', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'required'  => array(
    array(
      'setting'  => 'footer_copyright_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));