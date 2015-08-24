<?php
/**
 * Color Footer
 * ================
 */
$section = 'color_footer';
$priority = 1;
$color_scheme = thememove_get_color_scheme();


//--------------------
Kirki::add_field('', array(
  'type' => 'custom',
  'setting' => 'footer_color_hr_' . $priority++,
  'section' => $section,
  'priority' => $priority++,
  'default' => '<hr />',
));

// Footer bg color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_bg_color',
  'label' => __('Background Color', 'infinity'),
  'description' => __('Choose the background color for footer area', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[31],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.footer',
      'property' => 'background-color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.footer',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

// Footer border color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_border_color',
  'label' => __('Border Color', 'infinity'),
  'description' => __('Choose the border color for footer area', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[32],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.footer',
      'property' => 'border-top-color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.footer',
      'function' => 'css',
      'property' => 'border-top-color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type' => 'custom',
  'setting' => 'footer_color_hr_' . $priority++,
  'section' => $section,
  'priority' => $priority++,
  'default' => '<hr />',
));

// Footer Text color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_text_color',
  'label' => __('Footer Text Color', 'infinity'),
  'description' => __('Choose the text color for footer of your site', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[33],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.footer',
      'property' => 'color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.footer',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type' => 'custom',
  'setting' => 'footer_color_hr_' . $priority++,
  'section' => $section,
  'priority' => $priority++,
  'default' => '<hr />',
));

// Footer Link color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_link_color',
  'label' => __('Footer Link Color', 'infinity'),
  'description' => __('Choose the footer link color', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[34],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.footer a',
      'property' => 'color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.footer a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

// Footer Link color on hover
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_link_color_on_hover',
  'description' => __('Choose the footer link color on hover', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[35],
  'output' => array(
    array(
      'element' => '.footer a:hover',
      'property' => 'color',
    ),
  )
));

// Footer Menu title
Kirki::add_field('infinity', array(
  'type' => 'custom',
  'setting' => 'footer_group_title_' . $priority++,
  'section' => $section,
  'priority' => $priority++,
  'default' => '<div class="group_title">Footer Menu</div>',
));

// Footer menu bg color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_menu_bg_color',
  'label' => __('Background Color', 'infinity'),
  'description' => __('Choose the background color for footer menu', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[36],
  'transport' => 'postMessage',
  'output' => array(
    array(
      'element' => '.footer-menu',
      'property' => 'background-color',
    ),
  ),
  'js_vars' => array(
    array(
      'element' => '.footer-menu',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

// Footer Menu Link color
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_menu_link_color',
  'label' => __('Link Color', 'infinity'),
  'description' => __('Choose the footer menu link color', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[37],
  'output' => array(
    array(
      'element' => '.footer-menu .menu > li > a',
      'property' => 'color',
    ),
    array(
      'element' => '.footer-menu .menu > li:after',
      'property' => 'background-color',
    ),
  )
));

// Footer Link color on hover
Kirki::add_field('infinity', array(
  'type' => 'color',
  'setting' => 'footer_menu_link_color_on_hover',
  'description' => __('Choose the footer menu link color on hover', 'infinity'),
  'section' => $section,
  'priority' => $priority++,
  'default' => $color_scheme[38],
  'output' => array(
    array(
      'element' => '.footer-menu .menu > li > a:hover',
      'property' => 'color',
    ),
  )
));

