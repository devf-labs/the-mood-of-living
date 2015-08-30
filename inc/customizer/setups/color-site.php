<?php
/**
 * Site Color
 * ================
 */
$section = 'color_site';
$priority = 1;
$color_scheme = thememove_get_color_scheme();

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Primary color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_primary',
  'label'       => __('Primary Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[0],
  'output'      => array(
    array(
      'element'  =>
        '.footer > .container > .row > [class*="col-"]:after,
        .scrollup,
        .tm-aboutme__social__item--circle a,
        .tm-aboutme__social__item--square a,
        .tm-aboutme__social__item--outline-circle a:hover,
        .tm-aboutme__social__item--outline-square a:hover,
        .post-categories a',
      'property' => 'background-color',
    ),
    array(
      'element'  =>
        '.tm-aboutme__social__item a,
        .widget_tag_cloud .tagcloud a:hover,
        .post .post-tags a:hover',
      'property' => 'border-color',
    ),
    array(
      'element'  =>
        '.widget-title:before, .widget-title:after,
        .widgettitle:before, .widgettitle:after,
        .heading-title:before, .heading-title:after',
      'property' => 'border-top-color',
    ),
    array(
      'element'  =>
        '.tm-twitter .time > i,
        .widget_categories li:hover,
        .widget_categories ul li:hover > a,
        .widget_tag_cloud .tagcloud a:hover,
        blockquote:before,
        .post .post-tags a:hover,
        .post .post-comments .comments-link:before,
        .post .post-comments a:hover,
        .pagination.posts-pagination .page-numbers:hover,
        .pagination.posts-pagination .page-numbers.current,
        .pagination.loop-pagination .page-numbers:hover,
        .pagination.loop-pagination .page-numbers.current,
        .post.format-quote .source-name span,
        .post.format-quote .post-quote:after,
        .post-date:before, .post-img .fa,
        .big-title.color-background h1 span,
        .search .page-title span',
      'property' => 'color',
    ),
    array(
      'element'  =>
        '.recent-posts h3 > a:hover,
        .tm-aboutme__social__item--outline-circle a,
        .tm-aboutme__social__item--outline-square a,
        .tm-aboutme__social__item--circle a:hover,
        .tm-aboutme__social__item--square a:hover,
        .post .entry-title a:hover,
        .pagination.posts-pagination .next:hover:after,
        .pagination.posts-pagination .prev:hover:after,
        .pagination.loop-pagination .next:hover:after,
        .pagination.loop-pagination .prev:hover:after',
      'property' => 'color',
      'units'    => ' !important',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Secondary color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_secondary',
  'label'       => __('Secondary Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[1],
  'output'      => array(
    array(
      'element'  =>
        '.recent-posts h3 > a,
        .post .entry-title a,
        a.author-info__name,
        .comment-content cite.fn,
        .comment-content cite.fn a',
      'property' => 'color',
      'units'    => ' !important',
    ),
  ),
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Body background color
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_bg',
  'label'       => __('Body background color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[2],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => 'body',
      'property' => 'background-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => 'body',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Body text
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_body_text',
  'label'       => __('Body text', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[3],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => 'body',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => 'body',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Heading text
// Kirki::add_field('infinity', array(
//   'type'      => 'color',
//   'setting'   => 'site_color_heading',
//   'label'       => __('Heading text', 'infinity'),
//   'section'   => $section,
//   'priority'  => $priority++,
//   'default'   => $color_scheme[4],
//   'transport' => 'postMessage',
//   'output'    => array(
//     array(
//       'element'  => 'h1, h2, h3, h4, h5, h6',
//       'property' => 'color',
//     ),
//   ),
//   'js_vars'   => array(
//     array(
//       'element'  => 'h1, h2, h3, h4, h5, h6',
//       'function' => 'css',
//       'property' => 'color',
//     ),
//   )
// ));

//--------------------
Kirki::add_field('', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

// Body link
Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_body_link',
  'label'       => __('Body link', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => $color_scheme[5],
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => 'a, a:visited, a:focus',
      'property' => 'color',
    ),
    array(
      'element'  => '.post .entry-content .more-link a',
      'property' => 'border-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => 'a, a:visited, a:focus',
      'function' => 'css',
      'property' => 'color',
    ),
    array(
      'element'  => '.post .entry-content .more-link a',
      'function' => 'css',
      'property' => 'border-color',
    ),
  )
));

// Body link color on hover
Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'site_color_body_link_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => $color_scheme[6],
  'output'    => array(
    array(
      'element'  =>
        'a:hover,
        .widget_categories li,
        .widget_categories a,
        .widget_tag_cloud .tagcloud a,
        .post .post-tags a,
        a.page-numbers',
      'property' => 'color'
    ),
    array (
      'element' =>
        '.post .entry-content .more-link a:hover:after',
      'property'  => 'background-color'
    )
  )
));