<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $username
 * @var $style
 * @var $consumer_key
 * @var $consumer_secret
 * @var $access_token
 * @var $access_secret
 * @var $tweets_count
 * @var $link_new_page
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Twitter
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

?>

<div class="tm-twitter<?php echo esc_attr($el_class); ?>">
  <?php
  if (!empty($username) &&
    !empty($consumer_key) && !empty($consumer_secret) &&
    !empty($access_token) && !empty($access_secret)) {

    $data = $this->get_data($atts);
    if( $data != false ) { ?>
      <ul class="tm-tweets-list <?php echo esc_attr($style); ?>">
        <?php
        foreach( $data as $index => $tweet ) {
          if( $index >= $tweets_count ) {
            break;
          }

          // convert links and @ references
          if( 1 == $link_new_page ) {
            $tweet->text = preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a target="_blank" href="\\1">\\1</a>', $tweet->text);
            $tweet->text = preg_replace('/\B@([_a-z0-9]+)/i', '<a target="_blank" href="http://twitter.com/\\1">@\\1</a>', $tweet->text);
          }
          else {
            $tweet->text = preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a href="\\1">\\1</a>', $tweet->text);
            $tweet->text = preg_replace('/\B@([_a-z0-9]+)/i', '<a href="http://twitter.com/\\1">@\\1</a>', $tweet->text);
          }
          $this->get_li( $tweet, $atts );
        }
      ?>
      </ul>
    <?php
    }
  }
  ?>
</div>