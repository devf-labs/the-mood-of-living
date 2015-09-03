<?php
/**
 * Template Name: Front Page
 *
 * @package WordPress
 * @subpackage Lily
 */

get_header(); ?>

	<div id="main" class="clearfix">

		<div id="primary">
			<div id="content" role="main">
				<?php $home_welcome_message = ot_get_option( 'home_welcome_message' ); ?>
				<?php if ( ! empty( $home_welcome_message ) ) { ?>
					<div class="welcome-header">
						<?php echo $home_welcome_message; ?>
					</div><!-- .welcome-header -->
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
														<?php $rgb = hex2rgb( $slide['home_slider_highlight_color'] ); ?>
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

					<div id="home-portfolio-wrapper">
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
						
						<?php $view_more_projects_text = ot_get_option( 'view_more_projects_text' ); ?>
						<?php $portfolio_page = ot_get_option( 'portfolio_page' ); ?>
						<?php if ( ! empty( $view_more_projects_text ) ) { ?>
							<a class="more-link" href="<?php echo get_permalink( $portfolio_page ); ?>"><?php echo $view_more_projects_text; ?> <i class="icon-double-angle-right"></i></a>
						<?php } ?>
						
						<div id="home-portfolio" class="clearfix">
						<?php echo $home_portfolios_per_page; ?>
						<?php $home_portfolios_per_page = ot_get_option( 'home_portfolios_per_page' ); ?>
						<?php $home_portfolio = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $home_portfolios_per_page, 'no_found_rows' => true, 'post_status' => 'publish')); ?>
							
							<?php echo $home_portfolio->have_posts(); ?>
							<?php if ( $home_portfolio->have_posts() ) : ?>
	
								<?php /* Start the Loop */ ?>
								<?php while ( $home_portfolio->have_posts() ) : $home_portfolio->the_post(); ?>

									<?php get_template_part( 'template-parts/content-portfolio' ); ?>

								<?php endwhile; ?>
												
							<?php else : ?>
											
								<div class="entry-content clearfix">
										<div class="column one-half">
											<p><?php printf( __( '<a href="%s" class="button minimal"><i class="icon-plus-sign"></i> Add your first work</a>', 'mega' ), admin_url( 'post-new.php?post_type=portfolio' ) ); ?></p>
											<h2><?php _e( 'Welcome', 'mega' ) ?></h2>
											<h3><?php _e( 'You made it! Congratulations on starting your site!', 'mega' ) ?></h3>
											<p><?php _e( 'This is your site\'s frontpage, and it\'s the first thing your visitors will see when they arrive. You\'ll be able to organize and style this page however you like.', 'mega' ) ?></p>
											<p><?php printf( __( '<strong>You can start adding works to your site by heading into the <a href="%s">Admin Area</a>.</strong>', 'mega' ), admin_url( 'post-new.php?post_type=portfolio' ) ); ?></p>
										</div>
										
										<div class="column one-half column-last">
											<img src="<?php echo get_template_directory_uri(); ?>/images/banner-blankslate.jpg" width="475" height="240" alt="">
										</div>
										
										<div class="column one-half">
											<h3><?php _e( 'Adding Portfolio Items', 'mega' ) ?></h3>
											<p><?php _e( 'To add a new portfolio item, navigate to <strong>Portfolios > Add New</strong>. Here you can add the title of the project, a description in the main text editor, enter project details (client, date, url), upload medias, type an excerpt and assign various categories.', 'mega' ) ?></p>
											
											<p><?php _e( 'You have to set a <strong>&ldquo;featured image&rdquo;</strong> to each portfolio item that will be diplayed on the portfolio page. To do so, upload an image and set it as featured image. The image won\'t be automatically cropped to the appropriate dimensions. But if you want to control exactly how it displays, be sure they have the same dimensions.', 'mega' ) ?></p>
										</div>
										
										<div class="column one-half column-last">
											<p><?php printf( __( '<a href="%s" class="button minimal"><i class="icon-plus-sign"></i> Create Slideshow</a>', 'mega' ), admin_url( 'themes.php?page=ot-theme-options' ) ); ?></p>
											<h3><?php _e( 'Home Slideshow', 'mega' ) ?></h3>
											<p><?php _e( 'The Front Page features a slideshow into which you can insert your own content. To add a new slide to the slideshow , navigate to <strong>Appearance > Theme Options > Home Slider</strong> and upload an image from your computer. Repeat this process until you have created all of your slides and click <strong>&ldquo;Save Changes&rdquo;</strong>.', 'mega' ) ?></p>
										</div>
								</div><!-- .entry-content -->

							<?php endif; ?>
							
							<?php wp_reset_query(); ?>
							
						</div><!-- #home-portfolio -->
					</div><!-- #home-portfolio-wrapper -->
					
					<?php  if ( !empty( $post->post_content ) ) : ?>
						<div class="home-content">
							<?php the_content(); ?>
						</div>
					<?php endif; ?>
					
			</div><!-- #content -->
		</div><!-- #primary -->
	
<?php get_footer(); ?>