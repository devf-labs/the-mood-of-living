<?php

/**
 * ThemeMove Facebook Page Like
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_ThemeMove_Facebook_Page_Like extends WPBakeryShortCode {
}

// Mapping shortcode
vc_map(array(
    'name' => __('Facebook Page Like', 'thememove'),
    'base' => 'thememove_facebook_page_like',
    'description' => __('Facebook Page "Like" button', 'thememove'),
    'category' => __('by THEMEMOVE', 'thememove'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __('Facebook Page URL', 'thememove'),
            'description' => __('Enter your facebook page URL, example: https://www.facebook.com/thememove', 'thememove'),
            'param_name' => 'url',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Width', 'thememove'),
            'description' => __('The pixel width of the embed (Min. 180 to Max. 500)', 'thememove'),
            'param_name' => 'width',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Height', 'thememove'),
            'description' => __('The pixel height of the embed (Min. 70)', 'thememove'),
            'param_name' => 'height',
        ),
        array(
            'type' => 'checkbox',
            'param_name' => 'use_small_header',
            'value' => array(
                __('Use Small Header', 'thememove') => true
            ),
            'description' => __('Uses a smaller version of the page header', 'thememove'),
        ),
        array(
            'type' => 'checkbox',
            'param_name' => 'adapt_to_container',
            'value' => array(
                __('Adapt to shortcode container width', 'thememove') => true
            ),
            'description' => __('Shortcode will try to fit inside the container', 'thememove'),
        ),
        array(
            'type' => 'checkbox',
            'value' => array(
                __('Hide cover photo', 'thememove') => true
            ),
            'param_name' => 'hide_cover',
            'description' => __('Hide the cover photo in the header', 'thememove'),
        ),
        array(
            'type' => 'checkbox',
            'param_name' => 'show_face',
            'value' => array(
                __('Show Friend\'s Faces', 'thememove') => true
            ),
            'description' => __('Show profile photos when friends like this', 'thememove'),
        ),
        array(
            'type' => 'checkbox',
            'param_name' => 'show_posts',
            'value' => array(
                __('Show Page Posts', 'thememove') => true
            ),
            'description' => __('Show posts from the Page\'s timeline', 'thememove'),
        ),
    )
));