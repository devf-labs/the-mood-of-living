<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package ThemeMove
 * @subpackage Lily
 */

get_header(); ?>

	<div id="main" class="clearfix">

		<section id="primary">
			<div id="content" role="main">
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Author Archives: %s', 'mega' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?></h1>
				</header><!-- .page-header -->
			
				<?php if ( have_posts() ) : ?>

					<?php
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop
						 * properly with a call to rewind_posts().
						 */
						the_post();
					?>

					<?php
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();
					?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

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
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>