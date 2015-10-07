<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Lily
 * @since Lily 1.0
 */

get_header(); ?>

  <div id="main" class="clearfix row">

    <div id="primary" class="col-md-9">
      <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

        <?php if ( 'portfolio' == get_post_type() ) : ?>
          <?php get_template_part( 'template-parts/single-portfolio' ); ?>
        <?php else : ?>
          <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
        <?php endif; // End if ( 'portfolio' == get_post_type() ) ?>

        <?php endwhile; // end of the loop. ?>

      </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>