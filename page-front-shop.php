<?php
/**
 * Template Name: Front Page Shop
 *
 * @package ThemeMove
 * @subpackage Lily
 */

get_header(); ?>
assadf
	<div id="main" class="clearfix">

		<div id="primary">
			<div id="content" role="main">
					
				<?php $home_welcome_message = ot_get_option( 'home_welcome_message' ); ?>
				<?php if ( ! empty( $home_welcome_message ) ) { ?>
					<div class="welcome-header">
						<?php echo $home_welcome_message; ?>
					</div><!-- .welcome-header -->
				<?php } else { ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo the_title();?></h1>
					</header><!-- .entry-header -->
				<?php } ?>
					
					<?php $enable_home_slider = ot_get_option( 'enable_home_slider' ); ?>
					<?php if ( ! empty( $enable_home_slider ) ) { ?>
						<?php $home_slider = ot_get_option( 'home_slider_list', array() ); ?>
						<?php $home_slider_height = ot_get_option( 'home_slider_height' ); ?>
						<?php
						if ( empty( $home_slider_height ) ) {
							$home_slider_height = 370;
						}
						?>
							
						<?php if ( ! empty( $home_slider ) ) { ?>
							<div id="home-slider-wrapper" class="clearfix">
								<div id="home-slider" class="royalSlider rsDefault clearfix" style="height: <?php echo $home_slider_height; ?>px;">
											
									<?php foreach( $home_slider as $slide ) : ?>
										<div class="rsContent">
											<?php if ( ! empty( $slide['home_slider_image'] ) ) { ?>
												<img src="<?php echo $slide['home_slider_image']; ?>" alt="<?php echo $slide['title']; ?>" class="rsImg" data-rsTmb="<?php echo $slide['home_slider_image']; ?>" />
											<?php } ?>
												
											<?php if ( ! empty( $slide['title'] ) || ! empty( $slide['home_slider_description'] ) || ! empty( $slide['home_slider_link'] ) ) { ?>
												<div class="infoBlock rsABlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="300">
													<?php if ( ! empty( $slide['title'] ) ) { ?>
														<?php $rgb = hex2rgb($slide['home_slider_highlight_color']); ?>
														<?php $opacity = .9; ?>
														<?php $rgba = "rgba( " . $rgb[0] . ", " . $rgb[1] . ", " . $rgb[2] . ", " . $opacity . ")"; ?>
														<h2 style="background-color: <?php echo $slide['home_slider_highlight_color']; ?>; background-color: <?php echo $rgba; ?>"><?php echo $slide['title']; ?></h2>
													<?php } ?>
													
													<?php if ( ! empty( $slide['home_slider_description'] ) ) { ?>
														<p class="home-slider-description"><?php echo $slide['home_slider_description']; ?></p>
													<?php } ?>
													
													<?php if ( ! empty( $slide['home_slider_link'] ) ) { ?>
														<p class="home-slider-link"><a href="<?php echo $slide['home_slider_link']; ?>"><i class="icon-angle-right"></i></a></p>
													<?php } ?>
												</div><!-- .infoBlock -->
											<?php } ?>
										</div><!-- .rsContent -->
										
									<?php endforeach; ?>
										
								</div><!-- #home-slider -->
							</div><!-- #home-slider-wrappper -->
								
						<?php } else { ?>
							
							<div id="slide-0">
										
								<div class="entry-content clearfix">
									<p class="no-found"><?php _e( 'No slides found, please add some slides.', 'mega' ); ?></p>
								</div><!-- .entry-content -->
								
							</div><!-- #slide-0 -->
						<?php } // End if ( ! empty( $home_slider ) ) ?>
					<?php } // End if ( ! empty( $enable_home_slider ) ) ?>
				
				
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
							
						<div id="banner-0">
										
							<div class="entry-content clearfix">
								<p class="no-found"><?php _e( 'No banners found, please add some banners.', 'mega' ); ?></p>
							</div><!-- .entry-content -->
								
						</div><!-- #banner-0 -->
					<?php } // End if ( ! empty( $home_slider_shop ) ) ?>
				<?php } // End if ( ! empty( $enable_home_slider_shop ) ) ?>
				
					
				<?php  if ( !empty( $post->post_content ) ) : ?>
					<div class="home-content">
						<?php the_content(); ?>
					</div>
				<?php endif; ?>
					
			</div><!-- #content -->
		</div><!-- #primary -->
	
<?php get_footer(); ?>