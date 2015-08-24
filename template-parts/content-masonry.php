<?php
/**
 * Template part for displaying posts.
 * Masonry layout
 *  @package ThemeMove
 */

$infinity_hide_category       =  Kirki::get_option( 'infinity', 'post_general_hide_category' );
$infinity_hide_date           =  Kirki::get_option( 'infinity', 'post_general_hide_date' );
$infinity_hide_tags           =  Kirki::get_option( 'infinity', 'post_general_hide_tags' );
$infinity_hide_share_buttons  =  Kirki::get_option( 'infinity', 'post_general_hide_share_buttons' );
$infinity_hide_featured_image =  Kirki::get_option( 'infinity', 'post_general_hide_featured_image' );
$infinity_hide_comment_link   =  Kirki::get_option( 'infinity', 'post_general_hide_comment_link' );
?>
<article <?php post_class('post-masonry-item'); ?>>
  <?php if(has_post_thumbnail() && !$infinity_hide_featured_image) { ?>
    <div class="post-img">
      <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail(); ?></a>
      <?php if(has_post_format('video')) { ?>
        <i class="fa fa-video-camera"></i>
      <?php } ?>
      <?php if(has_post_format('audio')) { ?>
        <i class="fa fa-music"></i>
      <?php } ?>
    </div>
  <?php } ?>

  <div class="entry-header">
    <?php if(!$infinity_hide_category) { ?>
      <div class="post-categories">
        <?php infinity_entry_categories(); ?>
      </div><!--post-categories-->
    <?php } ?>
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  </div><!-- .entry-header -->

  <div class="entry-content">
    <p><?php echo thememove_string_limit_words(get_the_excerpt(), 20); ?>&hellip;</p>
    <p class="more-link"><a href="<?php echo get_permalink(); ?>"><?php echo esc_html('Continue reading', 'infinity'); ?></a></p>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php if(!$infinity_hide_tags) { ?>
      <div class="post-tags">
        <?php infinity_entry_tags(); ?>
      </div><!--post-tags-->
    <?php } ?>
    <div class="post-meta">
      <div class="row">
        <?php if($infinity_hide_date || $infinity_hide_share_buttons) {
          $class = 'col-xs-12 meta-center';
        } else {
          $class = 'col-xs-12 col-sm-6';
        } ?>

        <?php if(!$infinity_hide_date) { ?>
          <div class="post-date <?php echo esc_attr($class); ?>">
            <?php infinity_posted_on(); ?>
          </div><!--post-date-->
        <?php } ?>
        <?php if (!$infinity_hide_share_buttons) { ?>
          <div class="post-share-buttons <?php echo esc_attr($class); ?>">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo rawurlencode(the_title('', '', false)); ?>%20-%20<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-twitter"></i>
            </a>
            <?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
            <a data-pin-do="skipLink" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url($pin_image); ?>&amp;description=<?php echo rawurlencode(the_title('', '', false)); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-pinterest"></i>
            </a>
            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-google-plus"></i>
            </a>
            <a href="mailto:<?php echo get_option( 'admin_email' ); ?>"><i class="fa fa-envelope-o"></i></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </footer>

</article>