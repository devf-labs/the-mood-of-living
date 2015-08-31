<?php
/**
 * The template for displaying all single posts.
 *
 *  @package ThemeMove
 */
$layout         = Kirki::get_option( 'infinity', 'post_layout' );
get_header(); ?>

<div class="content-wrapper">
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
        <main id="main" class="site-main">

          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'single' ); ?>

            <?php infinity_entry_author(); ?>

            <?php infinity_related_posts(); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
            ?>

          <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
      </div>
      <?php if('content-sidebar' == $layout){ ?>
        <?php get_sidebar(); ?>
      <?php } ?>
    </div>
  </div>
</div><!--.content-wrapper-->
<?php get_footer(); ?>
