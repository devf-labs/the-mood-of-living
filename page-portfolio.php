<?php
/**
 * Template Name: Portfolio
 * Description: A Page Template that adds a portfolio to pages
 *
 * @package WordPress
 * @subpackage Razzo
 * @since Razzo 1.0
 */

get_header(); ?>

	<div id="main" class="clearfix">
	
		<?php $portfolio_message = ot_get_option( 'portfolio_message' ); ?>
		<?php if ( ! empty( $portfolio_message ) ) { ?>
			<div class="welcome-header">
				<?php echo $portfolio_message; ?>
			</div><!-- .welcome-header -->
		<?php } else { ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo the_title();?></h1>
			</header><!-- .entry-header -->
		<?php } ?>

		<div id="primary">	
			<div id="content" role="main">
				<?php $portfolios_per_page = ot_get_option( 'portfolios_per_page' ); ?>
			
				<div id="portfolio-wrapper" class="clearfix">
				
					<?php $portfolio_filtering = ot_get_option( 'portfolio_filtering' ); ?>
					
					<?php if ( ! empty( $portfolio_filtering ) ) : ?>
					
						<?php $wp_list_categories = wp_list_categories( array( 'title_li' => '', 'show_option_none' => '', 'taxonomy' => 'portfolio-category', 'walker' => new Walker_Portfolio_Category(), 'orderby' => 'name', 'style' => 'none', 'echo' => 0 ) ); ?>
						
						<?php if ( ! empty( $wp_list_categories ) ) : ?>
						
							<nav id="filters" class="clearfix option-set">
								<?php $sep = '<span class="sep">|</span>'; ?>
								<?php $wp_list_categories = str_replace( '<br />', $sep, $wp_list_categories ); ?>
								<a href="#" data-filter="*" class="selected"><?php _e( 'All', 'mega' ) ?></a>
								<?php echo $sep; ?>
												
								<?php
								if ( $sep != '' ) {
									$wp_list_categories = strrev( $wp_list_categories );
									$sep = strrev( $sep );
									$wp_list_categories = explode( $sep, $wp_list_categories, 2 );
									$wp_list_categories = implode( '', $wp_list_categories );
									$wp_list_categories = strrev( $wp_list_categories );
								}
								?>
												
								<?php echo $wp_list_categories; ?>
							</nav>
						
						<?php endif; // End if ( ! empty( $wp_list_categories ) ) ?>
						
					<?php endif; // End if ( ! empty( $portfolio_filtering ) ) ?>
					
					<div id="portfolio" class="clearfix">
						<?php $wp_query = new WP_Query(); ?>
						<?php $wp_query->query('post_type=portfolio&posts_per_page='.$portfolios_per_page.'&post_status=publish'.'&paged='.$paged); ?>
							
						<?php  if ( $wp_query->have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

								<?php get_template_part( 'content-portfolio' ); ?>

							<?php endwhile; ?>
							
						<?php else : ?>
									
							<div class="entry-content clearfix">
								<p class="no-found"><?php _e( 'No portfolios found, please add some portfolios.', 'mega' ); ?></p>
							</div><!-- .entry-content -->

						<?php endif; ?>
					</div><!-- #portfolio -->
					
					<?php mega_pagination_content_nav( 'nav-pagination' ); ?>
					
					<?php wp_reset_query(); ?>
					
				</div><!-- #portfolio-wrapper -->
				
				<?php  if ( !empty( $post->post_content ) ) : ?>
					<div class="portfolio-content">
						<?php the_content(); ?>
					</div>
				<?php endif; ?>
			
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>