<?php
/**
 * Site Typo
 * =========
 */
$section = 'site_typo';
$priority = 1;

// Body font title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Settings for body font', 'infinity'),
  'default'  => '<div class="group_title">Body</div>',
));

// Font family
Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'site_typo_body_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => body_font_family,
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => 'body',
    'property' => 'font-family',
  ),
));

// Font weight
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_body_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => body_font_weight,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => 'body',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'body',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

// Font Size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_body_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => body_font_size,
  'choices'   => array(
    'min'  => 7,
    'max'  => 48,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'body, a , p',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'body, a , p',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

// Heading font
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Settings for heading font', 'infinity'),
  'default'  => '<div class="group_title">Heading</div>',
));

// Font family
Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'site_typo_heading_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => site_heading_font_family,
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  =>
      'h1,h2,h3,h4,h5,h6,
      blockquote,.author-info__name,
      .comment-content cite.fn',
    'property' => 'font-family',
  ),
));

// Font weight
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_heading_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => site_heading_font_weight,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => 'h1,h2,h3,h4,h5,h6',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h1,h2,h3,h4,h5,h6',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// h1 font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_heading_h1_font_size',
  'label'     => __('H1 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => site_h1_font_size,
  'choices'   => array(
    'min'  => 15,
    'max'  => 100,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h1',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h1',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// h2 font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_heading_h2_font_size',
  'label'     => __('H2 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => site_h2_font_size,
  'choices'   => array(
    'min'  => 10,
    'max'  => 90,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h2',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h2',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// h3 font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_heading_h3_font_size',
  'label'     => __('H3 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => site_h3_font_size,
  'choices'   => array(
    'min'  => 10,
    'max'  => 80,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h3',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h3',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// h4 font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_heading_h4_font_size',
  'label'     => __('H4 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => site_h4_font_size,
  'choices'   => array(
    'min'  => 10,
    'max'  => 70,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h4',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h4',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// h5 font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_heading_h5_font_size',
  'label'     => __('H5 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => site_h5_font_size,
  'choices'   => array(
    'min'  => 10,
    'max'  => 70,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h5',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h5',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_typo_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// h6 font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_typo_heading_h6_font_size',
  'label'     => __('H6 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => site_h6_font_size,
  'choices'   => array(
    'min'  => 10,
    'max'  => 70,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h6',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h4',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));