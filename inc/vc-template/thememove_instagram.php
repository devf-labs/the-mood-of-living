<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $username
 * @var $number_items
 * @var $item_width_md
 * @var $show_follow_text
 * @var $spacing
 * @var $show_likes_comments
 * @var $link_new_page
 * @var $responsive
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Instagram
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$class = 'col-md-' . $item_width_md;

if('' != $responsive) {
  $class .= ' ' . $responsive;
}
// if hidden on device, find [class*=col] and replace to '', use only vc_hidden
$class_container = ' ' . preg_replace( '/col\-(lg|md|sm|xs)[^\s]*/', '', $class );
?>

<div class="tm-instagram container <?php echo esc_attr($el_class); echo trim($class_container); ?>">
  <?php if (!empty($username)) {
    $media_array = $this->scrape_instagram( $username, $number_items );

    if ( is_wp_error( $media_array ) ) { ?>
      <div class="tm-instagram--error"><p><?php echo esc_attr( $media_array->get_error_message() ); ?></p></div>
    <?php } else { ?>
      <ul class="tm-instagram-pics row" <?php if(0 != $spacing){echo 'style="margin:-' . (15+$spacing) . 'px;"'; }?>>
        <?php foreach ( $media_array as $item ) { ?>
          <li class="item<?php echo ' ' . $class; if('video' == $item['type']) { echo ' video'; } ?>"
              style="padding: <?php echo esc_attr($spacing); ?>px;">
            <?php if (1 == $show_likes_comments) { ?>
              <ul class="item-info">
                <li class="likes"><span><?php echo esc_attr($item['likes']); ?></span></li>
                <li class="comments"><span><?php echo esc_attr($item['comments']); ?></span></li>
              </ul>
            <?php } ?>
            <a href="<?php echo esc_url($item['link']) ?>" target="<?php echo esc_attr($link_new_page == 1 ? '_blank' : '_self'); ?>"
               class="item-link<?php if(1 == $show_likes_comments){ echo ' show-info'; };?>">
              <img src="<?php echo esc_url( $item['thumbnail'] ); ?>" alt="<?php echo esc_attr($item['description']); ?>" title="<?php $item['description']; ?>"  class="item-image"/>
              <?php if('video' == $item['type']) { ?>
                <span class="play-button"></span>
              <?php } ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    <?php  } ?>
    <?php if(1 == $show_follow_text) { ?>
      <p class="tm-instagram-follow-links">
        <?php echo $content; ?>
      </p>
    <?php }
  } ?>
</div>