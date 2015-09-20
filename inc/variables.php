<?php
/**
 * Define default value for customizer
 *
 * @package ThemeMove
 */

/**
 * Get all default color schemes
 * @return array of color schemes
 */
function thememove_get_color_schemes() {
  return apply_filters('thememove_color_schemes', array(
    'scheme1'  => array(
      'label'  => __( 'Color Scheme 01', 'thememove' ),
      'colors' => array(
        '#ddbe86',//primary_color--------------------------0
        '#111111',//secondary_color------------------------1
        '#ffffff',//body_bg_color--------------------------2
        '#000',//body_text_color------------------------3
        '#111111',//heading_color--------------------------4
        '#ddbe85',//body_link_color------------------------5
        '#666666',//body_link_hover_color------------------6
        '#ffffff',//header_bg_color------------------------7
        '#000',//header_text_color----------------------8
        '#eeeeee',//header_border_bottom_color-------------9
        '#cccccc',//social_color---------------------------10
        '#ddbe86',//social_hover_color---------------------11
        '#000',//search_color---------------------------12
        '#eeeeee',//search_input_border_color--------------13
        '#ddbe86',//search_input_border_color_focus--------14
        '#ddbe86',//search_btn_color-----------------------15
        '#ffffff',//menu_bg_color--------------------------16
        '#000000',//menu_link------------------------------17
        '#649494',//menu_link_hover------------------------18
        '#ffffff',//sub_menu_bg_color----------------------19
        '#666666',//sub_menu_link--------------------------20
        '#ddbe86',//sub_menu_link_hover--------------------21
        '#ddbe86',//sub_menu_border_bottom_&_top-----------22
        '#eeeeee',//sub_menu_border_left_&_right-----------23
        '#858585',//mobile_button_normal-------------------24
        '#ddbe86',//mobile_button_active-------------------25
        '#ddbe86',//mobile_menu_border_bottom_&_top--------26
        '#eeeeee',//mobile_menu_border_left_&_right--------27
        '#ffffff',//mobile_menu_sub_menu_bg----------------28
        '#ffffff',//mobile_menu_sub_menu_toggle_btn_bg-----29
        '#ddbe86',//mobile_menu_sub_menu_toggle_btn_color--30
        '#ffffff',//footer_bg_color------------------------31
        '#eeeeee',//footer_border_color--------------------32
        '#000000',//footer_text_color----------------------33
        '#000000',//footer_link_color----------------------34
        '#649494',//footer_link_color_on_hover-------------35
        '#f7f7f7',//footer_menu_bg_color-------------------36
        '#000000',//footer_menu_link_color-----------------37
        '#649494',//footer_menu_link_color_on_hover--------38
        '#ffffff',//copyright_bg_color---------------------39
        '#111111',//copyright_text_color-------------------40
        '#ddbe86',//copyright_link_color-------------------41
        '#111111',//copyright_link_color_on_hover----------42
        '#ffffff',//page_heading_bg------------------------43
        '#111111',//page_heading_text----------------------44
        '#ffffff',//page_bg_color--------------------------45
        '#ddbe86',//button_background_color----------------46
        '#ddbe86',//button_border_color--------------------47
        '#ffffff',//button_text_color----------------------48
        '#ffffff',//button_background_color_on_hover-------49
        '#ddbe86',//button_border_color_on_hover-----------50
        '#ddbe86',//button_text_color_on_hover-------------51
      )
    )
  ));
}

//Create default settings for section: site settings
define('box_mode_enable', 0);
define('site_layout', 'content-sidebar');
define('archive_layout', 'content-sidebar');
define('search_layout', 'sidebar-content');
define('post_layout', 'content-sidebar');
define('enable_back_to_top', 1);
define('enable_smooth_scroll', 1);
define('logo_image', 'http://www.lily.thememove.com/data/images/logo.png');
define('favicon_image', 'http://www.lily.thememove.com/data/images/favicon.png');
define('apple_touch_icon', 'http://www.lily.thememove.com/data/images/apple_touch_icon.png');

//Create default settings for section: header settings
define('header_sticky_enable', 0);
define('header_search_enable', 1);

//Create default settings for section: page settings
define('page_general_disable_comment',  1);
define('page_padding_top',   40);
define('page_padding_bottom', 0);
define('page_padding_left',  15);
define('page_padding_right', 15);
define('page_heading_font_weight', 400);
define('page_heading_font_size', 36);
define('page_heading_letter_spacing', 0.05);
define('enable_page_heading', 0);
define('page_heading_padding_top',   75);
define('page_heading_padding_bottom', 75);
define('page_heading_padding_left',   0);
define('page_heading_padding_right',  0);
define('page_heading_style',  'bg_color');
define('page_heading_image', 'http://lily.thememove.com/data/images/page_heading_title_bg.jpg');
define('page_heading_disable_parallax', 0);

//Create default settings for section: post settings
define('post_general_hide_category',        0);
define('post_general_hide_date',            0);
define('post_general_hide_tags',            1);
define('post_general_hide_share_buttons',   0);
define('post_general_hide_read_more',       0);
define('post_general_hide_comment_link',    0);
define('post_general_hide_featured_image',  0);
define('post_grid_layout',  'grid');
define('post_featured_enable',  1);
define('post_featured_tag_name',  'featured');
define('post_featured_number_of_posts',  2);
define('post_featured_number_of_posts_in_a_row',  2);
define('post_featured_show_after',  2);

//Create default settings for section: footer settings
define('footer_uncovering_enable', 0);
define('footer_copyright_enable', 1);
define('footer_copyright_text', __('Made with <a target="_blank" href="http://thememove.com"><i class="fa fa-heart"></i></a> by ThemeMove.com. All rights Reserved.','thememove'));

//Create default settings for section: site typography
define('body_font_family', 'Georgia, Helvetica Neue,Helvetica, sans-serif');
define('body_font_weight', 400);
define('body_font_size', 15);
define('site_heading_font_family', 'Georgia, Helvetica Neue,Helvetica, sans-serif');
define('site_heading_font_weight', 400);
define('site_h1_font_size', 32);
define('site_h2_font_size', 28);
define('site_h3_font_size', 20);
define('site_h4_font_size', 16);
define('site_h5_font_size', 15);
define('site_h6_font_size', 12);

//Create default settings for section: button settings
define('button_general_padding_top',    10);
define('button_general_padding_bottom', 10);
define('button_general_padding_left',   15);
define('button_general_padding_right',  15);
define('button_general_font_weight',    600);
define('button_general_font_size',      12);
define('button_general_letter_spacing', 0.1);
