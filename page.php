<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 *  @package ThemeMove
 */

$infinity_sticky_header       = get_post_meta(get_the_ID(), "infinity_sticky_header", true);
$infinity_uncover_enable      = get_post_meta(get_the_ID(), "infinity_uncover_enable", true);
$infinity_custom_logo         = get_post_meta(get_the_ID(), "infinity_custom_logo", true);
$infinity_page_layout         = get_post_meta(get_the_ID(), 'infinity_page_layout', true);
$infinity_custom_class        = get_post_meta(get_the_ID(), "infinity_custom_class", true);

if ('default' != $infinity_page_layout) {
  // page layout is not default layout
  $layout = get_post_meta(get_the_ID(), "infinity_page_layout", true);
} else {
  // get layout from customizer if page layout is set default
  $layout = Kirki::get_option( 'infinity', 'site_layout' );
}

get_header(); ?>

<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <?php if('sidebar-content' == $layout){ ?>
        <?php get_sidebar(); ?>
      <?php } ?>
      <?php if ('sidebar-content' == $layout  || 'content-sidebar' == $layout) { ?>
        <?php $class = 'col-md-9'; ?>
      <?php } else { ?>
        <?php $class = 'col-md-12'; ?>
      <?php } ?>
      <div class="<?php echo esc_attr($class); ?>">
        <main class="content site-main">
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'page' ); ?>
          <?php endwhile; // end of the loop. ?>
        </main>
      </div>
      <?php if('content-sidebar' == $layout){ ?>
        <?php get_sidebar(); ?>
      <?php } ?>
    </div>
  </div>
</div><!--.content-wrapper-->
<?php get_footer(); ?>