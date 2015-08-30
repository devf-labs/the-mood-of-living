<?php
/**
 * Template Name: Full Width
 * Description: A Page Template that adds a full width to pages
 *
 * @package WordPress
 * @subpackage Heat
 * @since Heat 1.0
 */

get_header(); ?>

	<div id="main" class="clearfix">
		<?php global $woocommerce; ?>
		<?php if ( $woocommerce && sizeof( $woocommerce->cart->get_cart() ) !== 0 ) : ?>
			<header class="entry-header clearfix">
				<h1 class="entry-title-lead clearfix"><?php echo the_title(); ?></h1>
			</header><!-- .entry-header -->
		<?php endif; ?>

		<div id="primary">
			<div id="content" role="main">
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>