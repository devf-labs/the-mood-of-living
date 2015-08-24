<?php
/**
 * Template part for displaying single posts.
 *
 *  @package ThemeMove
 */
$infinity_hide_category       =  Kirki::get_option( 'infinity', 'post_general_hide_category' );
$infinity_hide_date       =  Kirki::get_option( 'infinity', 'post_general_hide_date' );
$infinity_hide_share_buttons     =  Kirki::get_option( 'infinity', 'post_general_hide_share_buttons' );
$infinity_hide_featured_image     =  Kirki::get_option( 'infinity', 'post_general_hide_featured_image' );
$infinity_hide_comment_link     =  Kirki::get_option( 'infinity', 'post_general_hide_comment_link' );
?>

<article <?php post_class(); ?>>
  <?php if(has_post_format('gallery')) { ?>
    <?php $gallery_images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>
    <?php $gallery_type = get_post_meta( get_the_ID(), '_format_gallery_type', true ); ?>
    <?php if($gallery_images) { ?>
      <div class="post-img post-gallery<?php echo ' ' . esc_attr($gallery_type); ?>">
        <?php if ('masonry' == $gallery_type) { ?><div class="grid-thumb-sizer"></div><?php } ?>
        <?php foreach($gallery_images as $image) { ?>
          <?php if ('masonry' == $gallery_type) {
            $img = wp_get_attachment_image_src($image, 'full-thumb');
          } else {
            $img = wp_get_attachment_image_src($image, 'single-thumb');
          } ?>
          <?php $caption  = get_post_field('post_excerpt', $image); ?>
          <div <?php if('masonry' == $gallery_type) { ?> class="thumb-masonry-item" <?php } ?>><img src="<?php echo esc_url($img[0]); ?>" alt="<?php echo ''; ?>"></div>
        <?php } ?>
      </div>
    <?php } ?>
  <?php } elseif(has_post_format('video')) { ?>
    <div class="post-video">
      <?php $video = get_post_meta( get_the_ID(), '_format_video_embed' , true ); ?>
      <?php if(wp_oembed_get($video)) { ?>
        <?php echo wp_oembed_get($video); ?>
      <?php } else { ?>
        <?php echo $video; ?>
      <?php } ?>
    </div>
  <?php } elseif(has_post_format('audio')) { ?>
    <div class="post-audio">
      <?php $audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
      <?php if(wp_oembed_get( $audio )) { ?>
        <?php echo wp_oembed_get($audio); ?>
      <?php } else { ?>
        <?php echo $audio; ?>
      <?php } ?>
    </div>
  <?php } elseif(has_post_format('quote')) { ?>
    <?php $source_name = get_post_meta( $post->ID, '_format_quote_source_name', true ); ?>
    <?php $url = get_post_meta( $post->ID, '_format_quote_source_url', true ); ?>
    <?php $quote = get_post_meta( $post->ID, '_format_quote_text', true ); ?>
    <?php if($quote) { ?>
      <div class="post-quote">
        <h2><?php echo esc_attr($quote); ?></h2>
        <div class="source-name">
          <?php if($source_name) { ?>
            <?php if($url) { ?>
              <a href="<?php echo esc_url($url); ?>" target="_blank"><?php echo esc_attr($source_name); ?></a>
            <?php } else { ?>
              <span><?php echo esc_attr($source_name); ?></span>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  <?php } else { ?>
    <?php if(has_post_thumbnail() && !$infinity_hide_featured_image) { ?>
      <div class="post-img">
        <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-thumb');?></a>
      </div>
    <?php }  ?>
  <?php } ?>

  <div class="entry-header">

    <?php if(!$infinity_hide_category) { ?>
      <div class="post-categories">
        <?php infinity_entry_categories(); ?>
      </div><!--post-categories-->
    <?php } ?>

		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

    <?php if(!$infinity_hide_date) { ?>
      <div class="post-date">
        <?php infinity_posted_on(); ?>
      </div><!--post-date-->
    <?php } ?>

	</div><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'infinity' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer">
    <div class="post-tags">
      <?php infinity_entry_tags(); ?>
    </div><!--post-tags-->
    <div class="post-meta">
      <div class="row">
        <?php if($infinity_hide_comment_link || $infinity_hide_share_buttons) {
          $class = 'col-xs-12';
        } else {
          $class = 'col-xs-12 col-sm-6';
        } ?>
        <?php if(!$infinity_hide_comment_link) { ?>
          <div class="post-comments <?php echo esc_attr($class); ?>">
            <?php infinity_entry_comments(); ?>
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
	</div><!-- .entry-footer -->
</article><!-- #post-## -->