<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Razzo
 * @since Razzo 1.0
 */

get_header(); ?>

    <div id="main" class="clearfix row">

        <div id="primary" class="col-md-9">
            <div id="content" role="main">
                <header class="entry-header">
                    <h1 class="entry-title-lead"><?php echo the_title();?></h1>
                </header><!-- .entry-header -->

                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                    <?php endwhile; ?>

                    <?php mega_content_nav( 'nav-below' ); // Pagination ?>

                <?php else : ?>

                    <article id="post-0" class="post no-results not-found">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php _e( 'Nothing Found', 'mega' ); ?></h1>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <p><?php _e( 'Apologies, but no results were found for the requested archive.', 'mega' ); ?></p>
                        </div><!-- .entry-content -->
                    </article><!-- #post-0 -->

                <?php endif; ?>

            </div><!-- #content -->
        </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>