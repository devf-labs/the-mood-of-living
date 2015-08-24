<?php
add_filter('thememove_import_theme', 'thememove_import_theme');

function thememove_import_theme()
{
  $theme = wp_get_theme();
  return $theme->get('Name');
}

add_filter('thememove_import_demos', 'thememove_import_demos');

function thememove_import_demos()
{
  $theme = wp_get_theme();
  return array(
    'thememove01' => $theme->get('Name'),
  );
}

add_filter('thememove_import_types', 'thememove_import_types');

function thememove_import_types()
{
  return array(
    'all'                => 'All',
    'content'            => 'Content',
    'widgets'            => 'Widgets',
    'page_options'       => 'Page Options',
    'menus'              => 'Menus',
    'rev_slider'         => 'Revolution Slider',
    'vc_templates'       => 'VC Templates'
  );
}