<?php
/**
 * The main template file.
 *
 * @package ThemeMove
 * @subpackage Lily
 */

get_header(); ?>

	<div id="main" class="clearfix row">
		<div id="primary" class="col-md-9">
			<div id="content" role="main">
				<?php $enable_blog_title = ot_get_option( 'enable_blog_title' ); ?>
				<?php if ( ! empty( $enable_blog_title ) ) { ?>
					<?php $blog_message = ot_get_option( 'blog_message' ); ?>
					<?php if ( ! empty( $blog_message ) ) { ?>
						<header class="welcome-header clearfix">
							<h1><?php echo $blog_message; ?></h1>
						</header>
					<?php } else { ?>
						<header class="welcome-header clearfix">
							<h1><?php echo wp_title( '',true ); ?></h1>
						</header><!-- .entry-header -->
					<?php } ?>
				<?php } // End if ( ! empty( $enable_blog_title ) ) ?>

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

					<?php endwhile; ?>
			
					<?php mega_content_nav( 'nav-below' ); ?>

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