<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $avatar
 * @var $shape
 * @var $social_shape
 * @var $link_new_page
 * @var $el_class
 * @var $social_links
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Aboutme
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$image_attr = wp_get_attachment_image_src($avatar);

?>
<div class="tm-aboutme <?php echo esc_attr($el_class); ?>">
  <?php if ($image_attr) { ?>
  <div class="tm-aboutme__avatar tm-aboutme__avatar--<?php echo esc_attr($shape); ?>">
    <img src="<?php echo esc_attr($image_attr[0]); ?>" alt=""/>
  </div>
  <?php } ?>
  <?php if ('' != $content) { ?>
    <div class="tm-aboutme__description">
      <?php echo $content; ?>
    </div>
  <?php } ?>
  <?php if ('' != $social_links) { ?>
    <?php $social_links_arr = $this->getSocialLinks($atts); ?>
    <?php if (!empty($social_links_arr)) { ?>
      <ul class="tm-aboutme__social">
      <?php foreach($social_links_arr as $key=>$link) { ?>
        <li class="tm-aboutme__social__item tm-aboutme__social__item--<?php echo esc_attr($social_shape);?>">
          <a href="<?php echo esc_attr($link) ?>" class="tm-aboutme__social__link" target="<?php echo esc_attr($link_new_page==1 ? '_blank' : '_self'); ?>">
            <i class="fa fa-<?php echo esc_attr($key); ?> tm-aboutme__social__icon"></i>
          </a>
        </li>
      <?php } ?>
      </ul>
    <?php } ?>
  <?php } ?>
</div>