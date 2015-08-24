<?php
/**
 * Featured Posts
 * ================
 */
$section = 'post_featured';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_featured_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Enable Featured post
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_featured_enable',
  'default'     => post_featured_enable,
  'label'       => __('Enable Featured Posts', 'infinity'),
  'description' => __('Turn on this option if you want to enable featured posts', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_featured_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
  'required'  => array(
    array(
      'setting'  => 'post_featured_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
));

// Number of featured posts
Kirki::add_field('infinity', array(
  'type'        => 'number',
  'setting'     => 'post_featured_number_of_posts',
  'default'     => post_featured_number_of_posts,
  'label'       => __('Number of featured posts', 'infinity'),
  'description' => __('Enter number of featured posts', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'required'  => array(
    array(
      'setting'  => 'post_featured_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_featured_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
  'required'  => array(
    array(
      'setting'  => 'post_featured_enable',
      'operator' => '==',
      'value'    => 1,
    ),
    array(
      'setting'  => 'post_grid_layout',
      'operator' => '!=',
      'value'    => 'masonry',
    ),
  ),
));

// Number of featured posts in a row
Kirki::add_field('infinity', array(
  'type'        => 'select',
  'setting'     => 'post_featured_number_of_posts_in_a_row',
  'default'     => post_featured_number_of_posts_in_a_row,
  'label'       => __('Number of featured posts in a row', 'infinity'),
  'choices'     => array(
    1 =>  __('12 posts', 'thememove'),
    2 =>  __('6  posts', 'thememove'),
    3 =>  __('4  posts', 'thememove'),
    4 =>  __('3  posts', 'thememove'),
    6 =>  __('2  posts', 'thememove'),
    12 => __('1  posts', 'thememove'),
  ),
  'section'     => $section,
  'priority'    => $priority++,
  'required'  => array(
    array(
      'setting'  => 'post_featured_enable',
      'operator' => '==',
      'value'    => 1,
    ),
    array(
      'setting'  => 'post_grid_layout',
      'operator' => '!=',
      'value'    => 'masonry',
    ),
  ),
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_featured_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
  'required'  => array(
    array(
      'setting'  => 'post_featured_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
));

// Number of featured posts
Kirki::add_field('infinity', array(
  'type'        => 'number',
  'setting'     => 'post_featured_show_after',
  'default'     => post_featured_show_after,
  'label'       => __('Show Featured posts after how many posts?', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'required'  => array(
    array(
      'setting'  => 'post_featured_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
));