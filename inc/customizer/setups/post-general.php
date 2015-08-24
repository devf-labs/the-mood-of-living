<?php

/**
 * Post General
 * ================
 */
$section = 'post_general';
$priority = 1;

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Hide Category
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_general_hide_category',
  'default'     => post_general_hide_category,
  'label'       => __('Hide Category', 'infinity'),
  'description' => __('Turn on this option if you want to hide category when display a post', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Hide Date
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_general_hide_date',
  'default'     =>  post_general_hide_date,
  'label'       => __('Hide Date', 'infinity'),
  'description' => __('Turn on this option if you want to hide date when display a post', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Hide Tags
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_general_hide_tags',
  'default'     => post_general_hide_tags,
  'label'       => __('Hide Tags', 'infinity'),
  'description' => __('Turn on this option if you want to hide tags when display a post', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Hide Share Buttons
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_general_hide_share_buttons',
  'default'     => post_general_hide_share_buttons,
  'label'       => __('Hide Share Buttons', 'infinity'),
  'description' => __('Turn on this option if you want to hide share buttons when display a post', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Hide Read More button
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_general_hide_read_more',
  'default'     => post_general_hide_read_more,
  'label'       => __('Hide Read More Button', 'infinity'),
  'description' => __('Turn on this option if you want to hide read more button when display a post', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Hide Comment Link
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_general_hide_comment_link',
  'default'     => post_general_hide_comment_link,
  'label'       => __('Hide Comment Link', 'infinity'),
  'description' => __('Turn on this option if you want to hide comment link when display a post', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));

//-----------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'post_general_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Hide Featured Image
Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'post_general_hide_featured_image',
  'default'     => post_general_hide_featured_image,
  'label'       => __('Hide Featured Image', 'infinity'),
  'description' => __('Turn on this option if you want to hide featured image when display a post', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
));