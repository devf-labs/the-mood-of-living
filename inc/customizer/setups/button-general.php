<?php
/**
 * Button General
 * ================
 */
$section = 'button_general';
$priority = 1;

// Group Title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'button_general_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Setting padding for buttons', 'infinity'),
  'default'  => '<div class="group_title">' . __('Padding', 'infinity') . '</div>',
));

// Padding top
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'button_general_padding_top',
  'label'       => __('Padding', 'infinity'),
  'description' => __('Padding Top', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => button_general_padding_top,
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
      'property' => 'padding-top',
      'units'    => 'px'
    ),
  )
));

// Padding bottom
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'button_general_padding_bottom',
  'description' => __('Padding Bottom', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => button_general_padding_bottom,
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
      'property' => 'padding-bottom',
      'units'    => 'px'
    ),
  ),
));

// Padding left
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'button_general_padding_left',
  'description' => __('Padding Left', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => button_general_padding_left,
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
      'property' => 'padding-left',
      'units'    => 'px'
    ),
  ),
));

// Padding right
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'button_general_padding_right',
  'description' => __('Padding Right', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => button_general_padding_right,
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
      'property' => 'padding-right',
      'units'    => 'px'
    ),
  ),
));

// Group Title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'button_general_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Setting typography for buttons', 'infinity'),
  'default'  => '<div class="group_title">' . __('Typography', 'infinity') . '</div>',
));

// Font family
Kirki::add_field('infinity', array(
  'type'     => 'select',
  'setting'  => 'button_general_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => body_font_family,
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
    'property' => 'font-family',
  ),
));

// Font weight
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'button_general_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => button_general_font_weight,
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
    'property' => 'font-weight',
  ),
));

// Font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'button_general_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => button_general_font_size,
  'choices'   => array(
    'min'  => 15,
    'max'  => 100,
    'step' => 1,
  ),
  'output'    => array(
    'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
    'property' => 'font-size',
    'units'    => 'px',
  ),
));

// Letter spacing
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'button_general_letter_spacing',
  'label'     => __('Letter Spacing', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => button_general_letter_spacing,
  'choices'   => array(
    'min'  => -1,
    'max'  => 1,
    'step' => .05,
  ),
  'output'    => array(
    'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
    'property' => 'letter-spacing',
    'units'    => 'em',
  ),
));