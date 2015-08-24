<?php

/**
 * Page Heading
 * ================
 */
$section = 'page_heading';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

// Group Title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'page_heading_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Choose a style for page heading title', 'infinity'),
  'default'  => '<div class="group_title">' . __('Heading style', 'infinity') . '</div>',
));

// Style
Kirki::add_field( 'infinity', array(
  'type'        => 'select',
  'setting'     => 'page_heading_style',
  'default'     => page_heading_style,
  'section'     => $section,
  'priority'    => $priority++,
  'choices'     => array(
    'image'     => __( 'Image Background', 'infinity' ),
    'bg_color'  => __( 'Single Color Background', 'infinity' ),
  ),
));

//Heading Image
Kirki::add_field('infinity',array(
  'type'      => 'image',
  'setting'   => 'page_heading_image',
  'label'     => __('Background Image', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => page_heading_image,
  'output'    => array(
    array(
      'element'  => '.big-title.image-background',
      'property' => 'background-image',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  )
));

// Enable paralalx effect
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'page_heading_disable_parallax',
  'label'       => __('Parallax effect', 'infinity'),
  'description' => __('Turn on this option if you want to enable parallax effect for page heading', 'infinity'),
  'default'     => !page_heading_disable_parallax,
  'section'     => $section,
  'priority'    => $priority++,
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  )
));

//Background Color
Kirki::add_field('infinity',array(
  'type'          => 'color',
  'setting'       => 'page_heading_bg_color',
  'label'         => __('Background Color', 'infinity'),
  'section'       => $section,
  'priority'      => $priority++,
  'separator'     => false,
  'default'       => $color_scheme[43],
  'transport'     => 'postMessage',
  'output'        => array(
    array(
      'element'  => '.big-title',
      'property' => 'background-color',
    ),
  ),
  'js_vars'       => array(
    array(
      'element'  => '.big-title',
      'function' => 'css',
      'property' => 'background-color',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'bg_color',
    ),
  )
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'page_heading_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

//Text Color
Kirki::add_field('infinity',array(
  'type'      => 'color',
  'setting'   => 'page_heading_color',
  'label'     => __('Text Color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'separator' => false,
  'default'   => $color_scheme[44],
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.big-title .entry-title',
      'property' => 'color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title .entry-title',
      'function' => 'css',
      'property' => 'color',
    ),
  ),
));

// Group Title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'page_heading_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Setting padding for page heading title', 'infinity'),
  'default'  => '<div class="group_title">' . __('Padding', 'infinity') . '</div>',
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Padding top
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_heading_padding_top',
  'label'       => __('Padding', 'infinity'),
  'description' => __('Padding Top', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_heading_padding_top,
  'transport'   => 'postMessage',
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'property' => 'padding-top',
      'units'    => 'px'
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'function' => 'css',
      'property' => 'padding-top',
      'units'    => 'px'
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  )
));

// Padding bottom
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_heading_padding_bottom',
  'description' => __('Padding Bottom', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_heading_padding_bottom,
  'transport'   => 'postMessage',
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'property' => 'padding-bottom',
      'units'    => 'px'
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'function' => 'css',
      'property' => 'padding-bottom',
      'units'    => 'px'
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Padding left
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_heading_padding_left',
  'description' => __('Padding Left', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_heading_padding_left,
  'transport'   => 'postMessage',
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'property' => 'padding-left',
      'units'    => 'px'
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'function' => 'css',
      'property' => 'padding-left',
      'units'    => 'px'
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Padding right
Kirki::add_field('infinity', array(
  'type'        => 'slider',
  'setting'     => 'page_heading_padding_right',
  'description' => __('Padding Right', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => page_heading_padding_right,
  'transport'   => 'postMessage',
  'choices'     => array(
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ),
  'output'      => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'property' => 'padding-right',
      'units'    => 'px'
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'function' => 'css',
      'property' => 'padding-right',
      'units'    => 'px'
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Group Title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'page_heading_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Setting typography for page heading title', 'infinity'),
  'default'  => '<div class="group_title">' . __('Typography', 'infinity') . '</div>',
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Font family
Kirki::add_field('infinity', array(
  'type'     => 'select',
  'setting'  => 'page_heading_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => site_heading_font_family,
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '.big-title.image-background .entry-title',
    'property' => 'font-family',
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Font weight
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'page_heading_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => page_heading_font_weight,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => '.big-title.image-background .entry-title',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Font size
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'page_heading_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => page_heading_font_size,
  'choices'   => array(
    'min'  => 15,
    'max'  => 100,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => '.big-title.image-background .entry-title',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));

// Letter spacing
Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'page_heading_letter_spacing',
  'label'     => __('Letter Spacing', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => page_heading_letter_spacing,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => -1,
    'max'  => 1,
    'step' => .05,
  ),
  'output'    => array(
    'element'  => '.big-title.image-background .entry-title',
    'property' => 'letter-spacing',
    'units'    => 'em',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title.image-background .entry-title',
      'function' => 'css',
      'property' => 'letter-spacing',
      'units'    => 'em',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'page_heading_style',
      'operator' => '==',
      'value'    => 'image',
    ),
  ),
));