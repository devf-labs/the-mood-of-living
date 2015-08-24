<?php
/**
 * Logo, Favicon, Heading Image
 * ================
 */
$section = 'site_logo_favicon';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_logo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

//Logo Image
Kirki::add_field('infinity', array(
  'type'        => 'image',
  'setting'     => 'logo_image',
  'label'       => __('Logo Image', 'infinity'),
  'description' => __('Choose a default logo image to display', 'infinity'),
  'default'     => logo_image,
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_logo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

//Apple Touch Icon
Kirki::add_field('infinity', array(
  'type'        => 'image',
  'setting'     => 'apple_touch_icon',
  'label'       => __('Apple Touch Icon', 'infinity'),
  'description' => __('File must be .png format. Optimal dimensions: 152px x 152px', 'infinity'),
  'default'     => apple_touch_icon,
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_logo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

//Favicon Image
Kirki::add_field('infinity', array(
  'type'        => 'image',
  'setting'     => 'favicon_image',
  'label'       => __('Favicon Image', 'infinity'),
  'description' => __('File must be .png or .ico format. Optimal dimensions: 32px x 32px', 'infinity'),
  'default'     => favicon_image,
  'section'     => $section,
  'priority'    => $priority++,
));