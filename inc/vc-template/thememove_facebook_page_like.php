<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $url
 * @var $width
 * @var $height
 * @var $use_small_header
 * @var $adapt_to_container
 * @var $hide_cover
 * @var $show_face
 * @var $show_posts
 * Shortcode class
 * @var $this WPBakeryShortCode_ThemeMove_Facebook_Page_Like
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<div class="tm-facebook-page fb-page"
     data-href="<?php echo esc_url($url); ?>"
     data-width="<?php echo esc_attr($width); ?>"
     data-height="<?php echo esc_attr($height); ?>"
     data-small-header="<?php echo esc_attr($use_small_header == 1 ? 'true' : 'false'); ?>"
     data-adapt-container-width="<?php echo esc_attr($adapt_to_container == 1 ? 'true' : 'false'); ?>"
     data-hide-cover="<?php echo esc_attr($hide_cover == 1 ? 'true' : 'false'); ?>"
     data-show-facepile="<?php echo esc_attr($show_face == 1 ? 'true' : 'false'); ?>"
     data-show-posts="<?php echo esc_attr($show_posts == 1 ? 'true' : 'false'); ?>"
    >
    <div class="fb-xfbml-parse-ignore">
        <blockquote cite="<?php echo esc_url($url); ?>"><a href="<?php echo esc_url($url); ?>"><?php echo esc_url($url);?></a>
        </blockquote>
    </div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=609411882431242";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>