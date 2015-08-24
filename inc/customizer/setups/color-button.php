<?php
/**
 * Site Color
 * ================
 */
$section = 'color_button';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'color_button_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Background color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'button_background_color',
  'label'       => __('Background Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[46],
  'output'      => array(
      array(
          'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
          'property' => 'background-color',
      ),
  )
));

// Background color hover
Kirki::add_field('infinity', array(
    'type'      => 'color',
    'setting'   => 'button_background_color_on_hover',
    'description' => __('Background color on hover', 'infinity'),
    'section'   => $section,
    'priority'  => $priority++,
    'default'   => $color_scheme[49],
    'output'      => array(
        array(
            'element'  =>
                'button:hover, a.button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover,
                 button:focus, a.button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus',
            'property' => 'background-color',
        )
    ),
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'color_button_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Border color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'button_border_color',
  'label'       => __('Border Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[47],
  'output'      => array(
      array(
          'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
          'property' => 'border-color',
      ),
  )
));

// Border color hover
Kirki::add_field('infinity', array(
    'type'      => 'color',
    'setting'   => 'button_border_color_on_hover',
    'description' => __('Border color on hover', 'infinity'),
    'section'   => $section,
    'priority'  => $priority++,
    'default'   => $color_scheme[50],
    'output'      => array(
        array(
            'element'  =>
                'button:hover, a.button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover,
                 button:focus, a.button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus',
            'property' => 'border-color',
        )
    ),
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'color_button_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Text Color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'button_text_color',
  'label'       => __('Text Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[48],
  'output'      => array(
    array(
      'element'  => 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"]',
      'property' => 'color',
      'units'    => ' !important',
    )
  )
));

// Text Color on hover
Kirki::add_field('infinity', array(
    'type'      => 'color',
    'setting'   => 'button_text_color_on_hover',
    'description' => __('Text color on hover', 'infinity'),
    'section'   => $section,
    'priority'  => $priority++,
    'default'   => $color_scheme[51],
    'output'      => array(
        array(
            'element'  =>
                'button:hover, a.button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover,
                 button:focus, a.button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus',
            'property' => 'color',
            'units'    => ' !important',
        )
    ),
));