<?php
/**
 * The Footer widget areas for shop.
 *
 * @package ThemeMove
 * @subpackage Lily
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if ( ! is_active_sidebar( 'sidebar-8'  )
		&& ! is_active_sidebar( 'sidebar-9' )
		&& ! is_active_sidebar( 'sidebar-10'  )
		&& ! is_active_sidebar( 'sidebar-11'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="supplementary-wrapper" class="clearfix">
	<div id="supplementary" <?php mega_footer_sidebar_class(); ?>>
		<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
		<div id="first" class="widget-area clearfix" role="complementary">
			<?php dynamic_sidebar( 'sidebar-8' ); ?>
		</div><!-- #first .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
		<div id="second" class="widget-area clearfix" role="complementary">
			<?php dynamic_sidebar( 'sidebar-9' ); ?>
		</div><!-- #second .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-10' ) ) : ?>
		<div id="third" class="widget-area clearfix" role="complementary">
			<?php dynamic_sidebar( 'sidebar-10' ); ?>
		</div><!-- #third .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'sidebar-11' ) ) : ?>
		<div id="fourth" class="widget-area clearfix" role="complementary">
			<?php dynamic_sidebar( 'sidebar-11' ); ?>
		</div><!-- #fourth .widget-area -->
		<?php endif; ?>
	</div><!-- #supplementary -->
</div><!-- #supplementary-wrapper -->