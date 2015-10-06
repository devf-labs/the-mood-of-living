<?php
/**
 * The Template for displaying single portfolio.
 *
 * @package ThemeMove
 * @subpackage Lily
 */

get_header(); ?>

	<div id="main" class="clearfix">
	
		<div class="content-wrapper">
	
			<?php if ( has_post_thumbnail() ) : ?>
			
				<div <?php post_class('portfolio-featured clearfix ') ?>>
										
						<?php the_post_thumbnail( 'original' ); ?>
						
				</div>
					<?php endif; // End if ( has_post_thumbnail() ) ?>
					
		 </div><!-- .content-wrapper -->
						

		<div id="primary">
			<div id="content" class="clearfix" role="main">

			<?php if ( have_posts() ) : ?>
			
				<?php while ( have_posts() ) : the_post(); ?>
				
				 <?php
					$projecturl  = get_post_meta( get_the_ID(), 'mega_portfolio_url', true );
					$mediaType = get_post_meta( get_the_ID(), 'mega_portfolio_type', true );
					$project_slideshow = get_post_meta( get_the_ID(), 'mega_portfolio_slideshow', true );
					$projectclient = get_post_meta( get_the_ID(), 'mega_portfolio_client', true );
					$projectdate = get_post_meta( get_the_ID(), 'mega_portfolio_date', true );	
				?>	
				
				<div <?php post_class( 'clearfix' ); ?> id="post-<?php the_ID(); ?>">
				
					<div class="portfolio-media">
					
						<?php switch( $mediaType ) {
						
							case 'Images': ?>
								  
								<?php  $args = array(
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'post_type' => 'attachment',
									'post_parent' => get_the_ID(),
									'post_mime_type' => 'image',
									'post_status' => null,
									'numberposts' => -1,
									'exclude' => get_post_thumbnail_id()
								);
								$attachments = get_posts( $args );
								
								switch( $project_slideshow ) {
								
									case 'Yes':
									
										$portfolio_slider_height = get_post_meta( get_the_ID(), 'mega_portfolio_slider_height', true );
										if ( empty( $portfolio_slider_height ) )  
											$portfolio_slider_height = 600;
										?>
											
										<?php if ( $attachments ) : ?>
										
											<div id="portfolio-slider-wrapper" class="clearfix">
												<div id="portfolio-slider" class="royalSlider rsDefault clearfix">
										
													<?php foreach ( $attachments as $attachment) : ?>             
														<?php
															$small_src = wp_get_attachment_image_src( $attachment->ID, 'related-projects-image' );
															$src = wp_get_attachment_image_src( $attachment->ID, 'single-portfolio-image' );
															$attachment_title = apply_filters( 'the_title', $attachment->post_title );
															$attachment_caption = apply_filters( 'the_title', $attachment->post_excerpt );
															$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );	
														?>
														<div class="rsContent">
															<img class="rsImg" src="<?php echo $src[0]; ?>" width="<?php echo $src[1]; ?>" height="<?php echo $src[2]; ?>" alt="<?php echo $attachment_title; ?>" data-rsTmb="<?php echo $small_src[0]; ?>" />
															<div class="rsCaption">
																<figure><?php echo $attachment_caption; ?></figure>
															</div>
														</div><!-- .rsContent -->
													<?php endforeach; ?>
													
												</div><!-- #portfolio-slider -->
											</div><!-- #portfolio-slider-wrappper -->
											
											
											
										<?php endif; ?>
									
									<?php break; ?>
									
									<?php case 'No': ?>
									
										<?php if ( $attachments ) : ?>
										
											<div id="portfolio-images" class="clearfix" style="display: none">
										
												<?php foreach ( $attachments as $attachment) : ?>             
													<?php
														$src = wp_get_attachment_image_src( $attachment->ID, 'single-portfolio-image' );
														$attachment_title = apply_filters( 'the_title', $attachment->post_title );
														$attachment_caption = apply_filters( 'the_title', $attachment->post_excerpt );
														$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );	
													?>
													<div class="project-image clearfix">
														<img src="<?php echo $src[0]; ?>" width="<?php echo $src[1]; ?>" height="<?php echo $src[2]; ?>" alt="<?php echo $attachment_title; ?>" />
														<?php if ( $attachment_caption ) : ?>
															<figure><?php echo $attachment_caption; ?></figure>
														<?php endif; ?>
													</div><!-- .project-image -->
												<?php endforeach; ?>
											
											</div><!-- #portfolio-images -->
											
										<?php endif; ?>
									
									<?php break; ?>
								
								<?php } ?>
								
							<?php break;

							case 'Video': 
									$m4v = get_post_meta(get_the_ID(), 'mega_video_m4v', true);
									$ogv = get_post_meta(get_the_ID(), 'mega_video_ogv', true);
									$poster = get_post_meta(get_the_ID(), 'mega_video_poster', true);
									$youtubevimeo_url = get_post_meta(get_the_ID(), 'mega_youtube_vimeo_url', true);
									$embed = get_post_meta(get_the_ID(), 'mega_video_embed_code', true);
									$ratio_width = get_post_meta(get_the_ID(), 'mega_video_ratio_width', true);
									$ratio_height = get_post_meta(get_the_ID(), 'mega_video_ratio_height', true);
										
									$ratio = '';
									if (!empty($ratio_width)) 
										$ratio = ((int)$ratio_height / (int)$ratio_width * 100) .'%';
										
										
							?>
								
							<?php if ( !empty( $youtubevimeo_url ) ) {?>
								<div class="fluid-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>>
									<?php mega_get_video(get_the_ID(),1400,786); ?>
								</div>
							<?php } elseif ( $embed != '' ) { ?>
								<div class="fluid-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>>
								<?php echo stripslashes(htmlspecialchars_decode($embed));?>
								</div>
							<?php } else { ?>
								<script type="text/javascript">
									jQuery(document).ready(function(){										
										jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
												ready: function () {
													jQuery(this).jPlayer("setMedia", {
														<?php if($m4v != '') : ?>
														m4v: "<?php echo $m4v; ?>",
														<?php endif; ?>
														<?php if($ogv != '') : ?>
														ogv: "<?php echo $ogv; ?>",
														<?php endif; ?>
														<?php if ($poster != '') : ?>
														poster: "<?php echo $poster; ?>"
														<?php endif; ?>
													});
												},
												size: {
													width: "100%",
													height: "100%",
													cssClass: "fullwidth"   
												},
												autohide :{hold:2000},
												swfPath: "<?php echo get_template_directory_uri(); ?>/js",
												cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>",
												supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all"
											});
											
									});
									</script>

								<div id="jp_container_<?php the_ID(); ?>" class="jp-video">
									<div class="jp-type-single">
										<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer jp-jplayer-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>></div>
											<div class="jp-gui">
												<div class="jp-video-play">
													<a class="jp-video-play-icon" tabindex="1">Play</a>
												</div>
												<div class="jp-interface">
													<div class="jp-progress">
														<div class="jp-seek-bar">
															<div class="jp-play-bar"></div>
														</div>
													</div>
													<div class="jp-current-time">00:00</div>								
													<div class="jp-duration">00:00</div>								
															
														<ul class="jp-controls">
															<li><a class="jp-play" tabindex="1">Play</a></li>
															<li><a class="jp-pause" tabindex="1">Pause</a></li>
															<li><a class="jp-mute" tabindex="1">Mute</a></li>
															<li><a class="jp-unmute" tabindex="1">Unmute</a></li>
														</ul>
														<div class="jp-volume-bar">
															<div class="jp-volume-bar-value"></div>
														</div>
														<ul class="jp-toggles">										
															<li><a class="jp-full-screen" tabindex="1">Full Screen</a></li>
															<li><a class="jp-restore-screen" tabindex="1">Restore Screen</a></li>
														</ul>
														
												</div>							
											</div>
											
											<div class="jp-no-solution">
												<span><?php _e( 'Update Required', 'mega' ); ?> </span>
												<?php _e( 'To play the media you will need to either update your browser to a recent version or update your Flash plugin.', 'mega' ); ?>
											</div>
									</div>
								</div>
									
							<?php }
							
							break;

									default:
									break;
							} ?>
					
					</div><!-- .portfolio-media -->
					
					<div class="articleDetail clearfix">	
							<div>
								
							<?php $portfolio_meta = ot_get_option( 'portfolio_meta' ); ?>
												
									
									<?php if ( $portfolio_meta == 'categories' ) { ?>
										<h3 class="articleType"><?php echo custom_taxonomies_terms_links(); ?></h3>
									
									<?php } ?>
										<h1 class="articleName"><?php the_title(); ?></h1>
									
									<?php if ($post->post_excerpt != "" ) {
											echo "<p class='articleSlogn'>".$post->post_excerpt."</p>";
											}
											?>
									
									<p class="articleDate"><?php the_time('F j, Y') ?> | <?php the_author() ?></p>
							</div>	
							<?php
							if (in_array('element find', get_post_class())){ ?>
							<div class="shop-categories">
								
								<h3>Shop</h3>
								<br />
								<a href="/by-trend">By Trend</a>
								<a href="/by-story">By Story</a>
								<a href="/by-ocassion">By Ocassion</a>
								<a href="/women">Women</a>
								<a href="/men">Men</a>
								<a href="/home">Home</a>
								<a href="/art">Art</a>
							</div>
							<?php } ?>
				</div>

					
					<div id="portfolio-description" class="portfolio-description">
						<div class="entry-content clearfix">
							<?php the_content(); ?>
							<div class="portfolio-meta clearfix">
							
								<ul class="portfolio-details clearfix">	
									<?php if ( $projectdate ) : ?>
										<li>
											<?php _e( 'Date', 'mega' ); ?>: <strong><?php echo $projectdate; ?></strong>
										</li>
									<?php endif; ?>
									
									<?php if ( $projectclient) : ?>
										<li>
											<?php _e( 'Client', 'mega' ); ?>: <strong><?php echo $projectclient; ?></strong>
										</li>
									<?php endif; ?>
									
									
									<?php if ( $projecturl ) : ?>
										<li>
											<?php _e( 'Link', 'mega' ); ?>: <strong><a href="<?php echo $projecturl; ?>" target="_blank"><?php echo str_replace( 'http://','', $projecturl ); ?></a></strong>
										</li>
									<?php endif;?>
								</ul>
										
								<?php $portfolio_page = ot_get_option( 'portfolio_page' ); ?>
							</div><!-- .portfolio-meta -->
						</div><!-- .entry-content -->
					</div><!-- .portfolio-description -->
					
					<nav id="nav-single" class="clearfix">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'mega' ); ?></h3>
						
						<?php if ( get_previous_post() ) : ?>
							<span class="nav-next"><?php next_post_link( '%link', __( 'Next project <i class="icon-double-angle-right"></i>', 'mega' ) ); ?></span>
						<?php endif; ?>
						
						<?php if ( get_next_post() ) : ?>
							<span class="nav-previous"><?php previous_post_link( '%link', __( '<i class="icon-double-angle-left"></i> Previous project', 'mega' ) ); ?></span>
						<?php endif; ?>
					</nav><!-- #nav-single -->
				</div><!-- id="post-<?php the_ID(); ?>" -->
				
				
				<?php endwhile; // end of the loop. ?>
				
			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>