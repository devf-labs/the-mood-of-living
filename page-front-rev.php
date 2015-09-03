<?php
/**
 * Template Name: Front Page Rev
 *
 * @package ThemeMove
 * @subpackage Lily
 */

get_header(); ?>

	<div id="main" class="clearfix">

		<div id="primary">
			<div id="content" role="main">		
				<div id="block-rev-slider" class="clearfix">
					
					<?php $revAlias = get_post_meta( $post->ID, 'mega_revslider_alias', true ); ?>
					<?php putRevSlider( $revAlias ) ?>
							
				</div><!-- #block-rev-slider -->

				<div class="latest-stories margin-40 clearfix">
					<div class="before"></div>
					<h4>Mood of Living: A quality of Lifestyle Magazine and Global Marketplace</h4>
				</div>
				
				<?php $enable_home_banners_shop = ot_get_option( 'enable_home_banners_shop' ); ?>
				<?php if ( ! empty( $enable_home_banners_shop ) ) { ?>
					<?php $home_banners_shop = ot_get_option( 'home_banners_shop_list', array() ); ?>
							
					<?php if ( ! empty( $home_banners_shop ) ) { ?>
						<div id="home-banners-wrapper" class="clearfix">
							<div id="home-banners" class="clearfix">
											
								<?php foreach( $home_banners_shop as $banner ) : ?>
									<div class="banner">
										<?php if ( ! empty( $banner['home_banner_link'] ) ) { ?>
											<a href="<?php echo $banner['home_banner_link']; ?>">
										<?php } ?>
										
										<?php if ( ! empty( $banner['home_banner_image'] ) ) { ?>
											<img src="<?php echo $banner['home_banner_image']; ?>" alt="<?php echo $banner['title']; ?>" class="rsImg" data-rsTmb="<?php echo $banner['home_banner_image']; ?>" />
										<?php } ?>
										
										<?php if ( ! empty( $banner['title'] ) || ! empty( $banner['home_banner_description'] ) || ! empty( $banner['home_banner_link'] ) ) { ?>
											<?php $rgb = hex2rgb( $banner['home_banner_highlight_color'] ); ?>
											<div class="banner-info-wrapper" style="background-color: <?php echo $banner['home_banner_highlight_color']; ?>">
												<div class="banner-info clearfix">
													<?php if ( ! empty( $banner['title'] ) ) { ?>
														<h2><?php echo $banner['title']; ?></h2>
													<?php } ?>
														
													<?php if ( ! empty( $banner['home_banner_description'] ) ) { ?>
														<p class="home-banner-description"><?php echo $banner['home_banner_description']; ?></p>
													<?php } ?>	
												</div><!-- .banner-info -->
											</div><!-- .banner-info-wrapper -->
										<?php } ?>
										
										<?php if ( ! empty( $banner['home_banner_link'] ) ) { ?>
											</a>
										<?php } ?>
									</div><!-- .banner -->
										
								<?php endforeach; ?>
										
							</div><!-- #home-banners -->
						</div><!-- #home-banners-wrappper -->
								
					<?php } else { ?>
							
					<?php } // End if ( ! empty( $home_slider_shop ) ) ?>
				<?php } // End if ( ! empty( $enable_home_slider_shop ) ) ?>
				
				
				<div id="home-portfolio-wrapper" class="clearfix row">
						
						
						<div id="home-portfolio" class="col-sm-8">
							<div class="row">
								
						<?php
							$home_portfolios_per_page = ot_get_option( 'home_portfolios_per_page' );

							$home_portfolio_meet = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 1, 'no_found_rows' => true, 'post_status' => 'publish', 'portfolio-category' => 'meet'));  

							$home_portfolio_live = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 1, 'no_found_rows' => true, 'post_status' => 'publish', 'portfolio-category' => 'live')); 

							$home_portfolio_find = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 1, 'no_found_rows' => true, 'post_status' => 'publish', 'portfolio-category' => 'find')); 

							$home_portfolio_journal = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 1, 'no_found_rows' => true, 'post_status' => 'publish', 'category' => 'journal')); 
						?>	

								<?php /* Start the Loops */ ?>
									
								<?php while ( $home_portfolio_meet->have_posts() ) : $home_portfolio_meet->the_post(); ?>
									<div class="col-md-6">
										<?php get_template_part( 'template-parts/content-portfolio' ); ?>
									</div>
								<?php endwhile; ?>
								
								<?php while ( $home_portfolio_live->have_posts() ) : $home_portfolio_live->the_post(); ?>
									<div class="col-md-6">
										<?php get_template_part( 'template-parts/content-portfolio' ); ?>
									</div>
								<?php endwhile; ?>
								
								<?php while ( $home_portfolio_find->have_posts() ) : $home_portfolio_find->the_post(); ?>
									<div class="col-md-6">
										<?php get_template_part( 'template-parts/content-portfolio' ); ?>
									</div>
								<?php endwhile; ?>
								
								<?php while ( $home_portfolio_journal->have_posts() ) : $home_portfolio_journal->the_post(); ?>
									<div class="col-md-6">
										<?php get_template_part( 'template-parts/content-portfolio' ); ?>
									</div>
								<?php endwhile; ?>
														
							<?php wp_reset_query(); ?>
							
							</div>
						</div><!-- #home-portfolio -->
						<?php  if ( !empty( $post->post_content ) ) : ?>
							<div class="home-content col-md-4">
								<?php the_content(); ?>
							</div>
						<?php endif; ?>
					</div><!-- #home-portfolio-wrapper -->
					

					
			</div><!-- #content -->
		</div><!-- #primary -->
	
<?php get_footer(); ?>