<?php
/**
 * Nav Color
 * ================
 */
$section = 'color_nav';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

// Main menu title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Color settings for main menu', 'infinity'),
  'default'  => '<div class="group_title">' . __('Main Menu', 'infinity') . '</div>',
));

// Background menu
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_color_menu_background',
  'label'       => __('Background', 'infinity'),
  'description'        => __('Background color for main menu', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[16],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.nav',
      'property' => 'background-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.nav',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

//-------------------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Link settings
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_color_menu_link',
  'label'       => __('Link settings', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[17],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.nav a',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.nav a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

// Link color on hover
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_menu_link_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[18],
  'output'    => array(
    array(
      'element'  => '.nav li:hover > a, .nav .menu-item-has-children > a:after',
      'property' => 'color',
    ),
  )
));

// Sub menu title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Color settings for sub menu', 'infinity'),
  'default'  => '<div class="group_title">' . __('Sub Menu', 'infinity') . '</div>',
));

// Sub menu background
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_color_sub_menu_background',
  'description' => __('Background color for sub menu', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[19],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.nav .sub-menu',
      'property' => 'background-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.nav .sub-menu',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

//-------------------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Link settings
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_color_sub_menu_text',
  'label'       => __('Link settings', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[20],
  'output'      => array(
    array(
      'element'  => '.nav .sub-menu a, .nav .sub-menu a:after',
      'property' => 'color',
    ),
  )
));

// Link color on hover
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_sub_menu_text_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[21],
  'output'    => array(
    array(
      'element'  => '.nav .sub-menu li:hover > a, .nav .sub-menu li:hover > a:after',
      'property' => 'color'
    ),
  )
));

//-------------------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Border bottom & top
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_sub_menu_border_bottom',
  'label'     => __('Border color', 'infinity'),
  'description' => __('Border bottom & top color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[22],
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.nav .sub-menu',
      'property' => 'border-top-color',
    ),
    array(
      'element'  => '.nav .sub-menu',
      'property' => 'border-bottom-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.nav .sub-menu',
      'function' => 'css',
      'property' => 'border-top-color',
    ),
    array(
      'element'  => '.nav .sub-menu',
      'function' => 'css',
      'property' => 'border-bottom-color',
    ),
  )
));

// Border left & right
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_sub_menu_border_left',
  'description' => __('Border left & right color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[23],
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.nav .sub-menu',
      'property' => 'border-left-color',
    ),
    array(
      'element'  => '.nav .sub-menu',
      'property' => 'border-right-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.nav .sub-menu',
      'function' => 'css',
      'property' => 'border-left-color',
    ),
    array(
      'element'  => '.nav .sub-menu',
      'function' => 'css',
      'property' => 'border-right-color',
    ),
  )
));

// Mobile menu title
Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Color settings for menu on mobile', 'infinity'),
  'default'  => '<div class="group_title">' . __('Mobile Menu', 'infinity') . '</div>',
));

// Button settings
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_color_mobile_button_normal',
  'label'       => __('Toogle button', 'infinity'),
  'description' => __('Normal color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[24],
  'output'      => array(
    array(
      'element'  => '.menu-link .lines, .menu-link .lines:before, .menu-link .lines:after',
      'property' => 'background-color',
    )
  )
));

// Button active settings
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'mobile_button_active',
  'description' => __('Active color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[25],
  'output'      => array(
    array(
      'element'  => '.menu-link.active .lines:before, .menu-link.active .lines:after',
      'property' => 'background-color',
    )
  )
));

//-------------------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Mobile menu Border bottom & top
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_mobile_border_bottom',
  'label'     => __('Border color', 'infinity'),
  'description' => __('Border bottom & top color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[26],
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.nav',
      'property' => 'border-top-color',
      'prefix'   => '@media ( max-width: 1199px ) {',
      'suffix'   => '}',
    ),
    array(
      'element'  => '.nav',
      'property' => 'border-bottom-color',
      'prefix'   => '@media ( max-width: 1199px ) {',
      'suffix'   => '}',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.nav',
      'function' => 'css',
      'property' => 'border-top-color'
    ),
    array(
      'element'  => '.nav',
      'function' => 'css',
      'property' => 'border-bottom-color'
    ),
  )
));

// Mobile menu Border left & right
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_mobile_border_left',
  'description' => __('Border left & right color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[27],
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.nav',
      'property' => 'border-left-color',
      'prefix'   => '@media ( max-width: 1199px ) {',
      'suffix'   => '}',
    ),
    array(
      'element'  => '.nav',
      'property' => 'border-right-color',
      'prefix'   => '@media ( max-width: 1199px ) {',
      'suffix'   => '}',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.nav',
      'property' => 'border-left-color'
    ),
    array(
      'element'  => '.nav',
      'property' => 'border-right-color'
    ),
  )
));

//-------------------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Sub menu background
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'mobile_menu_sub_menu_bg',
  'label'     => __('Sub menu toggle button', 'infinity'),
  'description' => __('Background Color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[28],
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.nav li .sub-menu',
      'property' => 'background-color',
      'prefix'   => '@media ( max-width: 1199px ) {',
      'suffix'   => '}',
    )
  ),
  'js_vars'   => array(
    array(
      'element'  => '.nav li .sub-menu',
      'property' => 'background-color',
    )
  )
));

//-------------------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'nav_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Sub menu toggle button
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_mobile_sub_menu_toggle_btn_bg',
  'label'     => __('Sub menu toggle button', 'infinity'),
  'description' => __('Background Color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[29],
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.sub-menu-toggle',
      'property' => 'background-color',
      'prefix'   => '@media ( max-width: 1199px ) {',
      'suffix'   => '}',
    )
  ),
  'js_vars'   => array(
    array(
      'element'  => '.sub-menu-toggle',
      'property' => 'background-color',
    )
  )
));

// Mobile menu Border left & right
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'nav_color_mobile_sub_menu_toggle_color',
  'description' => __('Icon color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[30],
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.sub-menu-toggle',
      'property' => 'color',
      'prefix'   => '@media ( max-width: 1199px ) {',
      'suffix'   => '}',
    )
  ),
  'js_vars'   => array(
    array(
      'element'  => '.sub-menu-toggle',
      'property' => 'color',
    )
  )
));
