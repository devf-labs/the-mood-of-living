<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $enable_carousel
 * @var $display_bullets
 * @var $enable_autoplay
 * @var $limit
 * @var $orderby
 * @var $order
 * @var $display_author
 * @var $display_url
 * @var $display_avatar
 * @var $size
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Testimonials
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
?>
  <div class="thememove_testimonials<?php echo esc_attr($el_class); ?>">
    <?php do_action('woothemes_testimonials', array('limit'           => $number,
                                                    'size'            => $size,
                                                    'orderby'         => $orderby,
                                                    'order'           => $order,
                                                    'display_author'  => $display_author,
                                                    'display_avatar'  => $display_avatar,
                                                    'display_url'     => $display_url,
                                                    'display_bullets' => $display_bullets,
    )); ?>
  </div>

<?php if($enable_carousel == 'true'){ ?>
<script>
  jQuery(document).ready(function ($) {
    $(".wpb_row .testimonials-list").owlCarousel(
      {
        items: 1,
        navigation: false,
        margin:30,
        <?php if($display_bullets == 'true'){ ?>
          dots: true,
        <?php }else { ?>
          dots: false,
        <?php } ?>
        loop: true,
        <?php if($enable_autoplay == 'true'){ ?>
          autoplay: true,
        <?php }else { ?>
          autoplay: false,
        <?php } ?>
        autoplayHoverPause: true
      }
    );
  });
</script>
<?php } ?>