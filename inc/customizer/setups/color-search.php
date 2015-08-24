<?php
/**
 * Color Search
 */

$section = 'color_search';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'search_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Search color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'search_color',
  'label'       => __('Color', 'infinity'),
  'description' => __('Choose the color for search input', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[12],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.search-box .search-field',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.search-box .search-field',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'search_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Search input border color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'search_input_border_color',
  'label'       => __('Input Border bottom Color', 'infinity'),
  'description' => __('Choose the border bottom color for search input', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[13],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.search-box .search-field',
      'property' => 'border-bottom-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.search-box .search-field',
      'function' => 'css',
      'property' => 'border-bottom-color',
    ),
  )
));

// Search input border color on focus
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'search_input_border_color_focus',
  'description' => __('Choose the border bottom color for search input on focus', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[14],
  'output'      => array(
    array(
      'element'  => '.search-form:after',
      'property' => 'background-color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'search_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Search button color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'search_btn_color',
  'label'       => __('Button Color', 'infinity'),
  'description' => __('Choose the color for search button', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[15],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.search-box .fa-search',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.search-box .fa-search',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));
