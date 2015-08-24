<?php
/**
 * The template used for displaying page content in page.php
 *
 *  @package ThemeMove
 */
$infinity_disable_title        = get_post_meta(get_the_ID(), "infinity_disable_title", true);
$infinity_heading_image       = get_post_meta(get_the_ID(), "infinity_heading_image", true);
$infinity_title_style         = get_post_meta(get_the_ID(), "infinity_title_style",   true);
$infinity_disable_parallax    = get_post_meta(get_the_ID(), "infinity_disable_parallax", true);
$infinity_heading_bg_color    = get_post_meta(get_the_ID(), "infinity_heading_bg_color", true);
$infinity_heading_color       = get_post_meta(get_the_ID(), "infinity_heading_color", true);
$infinity_alt_title           = get_post_meta(get_the_ID(), "infinity_alt_title", true);

if($infinity_heading_image && 'default' != $infinity_title_style) {
  $infinity_heading_image = get_post_meta(get_the_ID(), "infinity_heading_image", true);
} else {
  $infinity_heading_image = get_theme_mod('page_heading_image', page_heading_image);
}

if("default" == $infinity_title_style) {
  $infinity_title_style       =  Kirki::get_option( 'infinity', 'page_heading_style' );
  $infinity_heading_image     =  get_theme_mod('page_heading_image', page_heading_image);
  $infinity_heading_bg_color  =  Kirki::get_option( 'infinity', 'page_heading_bg_color' );
  $infinity_heading_color     =  Kirki::get_option( 'infinity', 'page_heading_color' );
  $infinity_disable_parallax  =  !Kirki::get_option( 'infinity', 'page_heading_disable_parallax' );
}
?>


<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
  <?php if ("on" != $infinity_disable_title) { ?>
    <?php if (('image' == $infinity_title_style ||
               'image' == Kirki::get_option( 'infinity', 'page_heading_style' )) && "bg_color" != $infinity_title_style) { //If enable heading image ?>
      <header class="big-title image-background"
              <?php if(("on" != $infinity_disable_parallax  || !Kirki::get_option( 'infinity', 'page_heading_disable_parallax')) && !$infinity_disable_parallax){ ?>
                data-stellar-background-ratio="0.5"
              <?php } ?>>
        <?php if ($infinity_alt_title) { ?>
          <h1 class="entry-title" itemprop="headline"><?php echo $infinity_alt_title; ?></h1>
        <?php } else { ?>
          <?php the_title( '<h1 class="entry-title" itemprop="headline"  style="color: ' . esc_attr($infinity_heading_color) . ';" itemprop="headline">', '</h1>' ); ?>
        <?php } ?>
      </header><!-- .entry-header -->
    <?php } else { // single color heading ?>
      <header class="big-title color-background" style="background-color: <?php echo esc_attr($infinity_heading_bg_color); ?>">
        <?php if ($infinity_alt_title) {?>
          <h1 class="entry-title" itemprop="headline" style="color: <?php echo esc_attr($infinity_heading_color); ?>"><?php echo $infinity_alt_title; ?></h1>
        <?php } else { ?>
          <?php the_title('<h1 class="entry-title" itemprop="headline" style="color: ' . esc_attr($infinity_heading_color) . ';" itemprop="headline">', '</h1>'); ?>
        <?php } ?>
      </header><!-- .entry-header -->
    <?php } ?>
  <?php } ?>
	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'infinity' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
<?php if ( ( comments_open() || get_comments_number() ) ) : comments_template(); endif; ?>