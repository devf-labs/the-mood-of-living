<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 *  @package ThemeMove
 */

$layout = Kirki::get_option( 'infinity', 'site_layout' );

get_header(); ?>
<div class="content-wrapper ">
	<div class="container space-content">
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
        <main id="main" class="content site-main" role="main">
          <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

              <?php
              get_template_part( 'template-parts/content', get_post_format() );
              ?>

            <?php endwhile; ?>
            <?php infinity_paging_nav(); ?>
          <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
          <?php endif; ?>
        </main><!-- #main -->
      </div>
      <?php if('content-sidebar' == $layout){ ?>
        <?php get_sidebar(); ?>
      <?php } ?>
    </div>
  </div>
</div><!--.content-wrapper-->
<?php get_footer(); ?>