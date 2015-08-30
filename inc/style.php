<?php
/**
 * Filter Primary Typography Fonts.
 */
function filter_ot_recognized_font_families( $array, $field_id ) {
  if ( $field_id == 'primary_typography' || $field_id == 'header_typography' ) {
  
	$systemFontSelect = array(
		'Arial' => 'Arial',
		'Calibri' => 'Calibri',
		'Century Gothic' => 'Century Gothic',
		'Courier' => 'Courier',
		'Courier New' => 'Courier New',
		'Georgia' => 'Georgia',
		'Modern' => 'Modern',
		'Tahoma' => 'Tahoma',
		'Times New Roman' => 'Times New Roman',
		'Trebuchet MS' => 'Trebuchet MS',
		'Verdana' => 'Verdana'
	);
  
    $array = $systemFontSelect;
  }
  
  return $array;
  
}
add_filter( 'ot_recognized_font_families', 'filter_ot_recognized_font_families', 10, 2 );

/**
 * A safe way to add/enqueue a CSS/JavaScript to the wordpress generated page. 
 */
function mega_enqueue_google_fonts() {
	$google_font_family = ot_get_option( 'google_font_family' );
	if ( ! empty( $google_font_family ) ) {
		echo $google_font_family;
	}
}
add_action( 'wp_head', 'mega_enqueue_google_fonts' );

function mega_enqueue_header_google_fonts() {
	$header_google_font_family = ot_get_option( 'header_google_font_family' );
	if ( ! empty( $header_google_font_family ) ) {
		echo $header_google_font_family;
	}
}
add_action( 'wp_head', 'mega_enqueue_header_google_fonts' );

/**
 * Add a style block to the theme for the primary typography.
 */
function mega_print_primary_typography() {
	$primary_typography = ot_get_option( 'primary_typography', array() );
	
	$google_font_name = ot_get_option( 'google_font_name' );
	
	if ( ! empty( $google_font_name ) ) {
		$primary_font = $google_font_name;
	} else if ( ! empty( $primary_typography['font-family'] ) ) {
		$primary_font = $primary_typography['font-family'];
	}
	
	// Don't do anything if the font-family is empty.
	if ( ! empty( $primary_typography['font-family'] ) || ! empty( $google_font_name ) ) :
?>
	<style>
		/* Primary Typography */
		body, input, textarea, select, .menu-item-description {
			font-family: "<?php echo $primary_font; ?>", 'Helvetica Neue', Helvetica, sans-serif;
		}
		/* AddThis Typography */
		#at16recap, #at_msg, #at16p label, #at16nms, #at16sas, #at_share .at_item, #at16p, #at15s, #at16p form input, #at16p textarea {
			font-family: "<?php echo $primary_font; ?>", 'Helvetica Neue', Helvetica, sans-serif !important;
		}
		/* WooCommerce Typography */
		.woocommerce ul.products li.product h3,
		.woocommerce-page ul.products li.product h3 {
			font-family: "<?php echo $primary_font; ?>", 'Helvetica Neue', Helvetica, sans-serif;
		}
		/* WPML Typography */
		#lang_sel {
			font-family: "<?php echo $primary_font; ?>", 'Helvetica Neue', Helvetica, sans-serif;
		}
		/* MailChimp Typography */
		#mc_signup_form .mc_signup_submit .button {
			font-family: "<?php echo $primary_font; ?>", 'Helvetica Neue', Helvetica, sans-serif;
		}
	</style>
<?php
	endif;
}
add_action( 'wp_head', 'mega_print_primary_typography' );

/**
 * Add a style block to the theme for the header typography.
 */
function mega_print_header_typography() {
	$header_typography = ot_get_option( 'header_typography' );
	
	$header_google_font_name = ot_get_option( 'header_google_font_name' );
	
	if ( ! empty( $header_google_font_name ) ) {
		$header_font = $header_google_font_name;
	} else if ( ! empty( $header_typography['font-family'] ) ) {
		$header_font = $header_typography['font-family'];
	}
	
	
	// Don't do anything if the font-family is empty.
	if ( ! empty( $header_typography['font-family'] ) || ! empty( $header_google_font_name ) ) :
?>
	<style>
		/* Header Typography */
		h1, h2, h3, h4, h5, h6 {
			font-family: "<?php echo $header_font; ?>", 'Helvetica Neue', Helvetica, sans-serif;
		}
		/* Site Generator Line */
		#site-generator p {
			font-family: "<?php echo $header_font; ?>", 'Helvetica Neue', Helvetica, sans-serif;
		}
	</style>
<?php
	endif;
}
add_action( 'wp_head', 'mega_print_header_typography' );

/**
 * Add a style block to the theme for the primary link color.
 */
function mega_print_primary_link_color_style() {
	$primary_link_color = ot_get_option( 'primary_link_color' );
	
	// Don't do anything if the primary link color is empty or the default.
	if ( empty( $primary_link_color ) || $primary_link_color == '#ababab' )
		return;
?>
	<style>
		/* Primary Link color */
		a {
			color: <?php echo $primary_link_color; ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'mega_print_primary_link_color_style' );

/**
 * Add a style block to the theme for the secondary link color.
 */
function mega_print_secondary_link_color_style() {
	$secondary_link_color = ot_get_option( 'secondary_link_color' );
	
	// Don't do anything if the secondary link color is empty or the default.
	if ( empty( $secondary_link_color ) || $secondary_link_color == '#111111' )
		return;
?>
	<style>
		/* Secondary Link color */
		#site-generator .social {
			color: <?php echo $secondary_link_color; ?>;
		}
		#respond input#submit:hover,
		#respond input#submit:active {
			background-color: <?php echo $secondary_link_color; ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'mega_print_secondary_link_color_style' );

/**
 * Add a style block to the theme for the secondary link color hover/active.
 */
function mega_print_secondary_link_color_hover_style() {
	$secondary_link_color_hover = ot_get_option( 'secondary_link_color_hover' );
	
	// Don't do anything if the secondary link color hover/active is empty or the default.
	if ( empty( $secondary_link_color_hover ) || $secondary_link_color_hover == '#bca474' )
		return;
?>
	<style>
		/* Secondary Link Color &mdash; Hover/Active */
		#site-generator .social:focus,
		#site-generator .social:active,
		#site-generator .social:hover {
			color: <?php echo $secondary_link_color_hover; ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'mega_print_secondary_link_color_hover_style' );

/**
 * Add a style block to the theme for the navigation link color.
 */
function mega_print_navigation_link_color_style() {
	$navigation_link_color = ot_get_option( 'navigation_link_color' );
	
	// Don't do anything if the navigation link color is empty or the default.
	if ( empty( $navigation_link_color ) || $navigation_link_color == '#bca474' )
		return;
?>
	<style>
		/* Navigation Link color */
		#access ul li a:hover,
		#access ul li.sfHover > a,
		#access ul .current-menu-item > a,
		#access ul .current_page_item > a {
			color: <?php echo $navigation_link_color; ?>;
		}
		#access ul li li a:hover,
		#access ul li li.sfHover > a,
		#access ul li .current-menu-item > a,
		#access ul li .current_page_item > a {
			color: <?php echo $navigation_link_color; ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'mega_print_navigation_link_color_style' );

/**
 * Add a style block to the theme for the secondary text color.
 */
function mega_print_secondary_text_color() {
	$secondary_text_color = ot_get_option( 'secondary_text_color' );
	
	// Don't do anything if the secondary text color is empty or the default.
	if ( empty( $secondary_text_color ) || $secondary_text_color == '#777777' )
		return;
?>
	<style>
		/* Secondary Text Color */
		.archive footer.entry-meta span,
		.search footer.entry-meta span,
		.blog footer.entry-meta span,
		.entry-category .sep,
		#header-info,
		#header-info .sep,
		#additional-info a,
		.welcome-header p,
		.message-paragraph,
		.entry-meta,
		.entry-meta p,
		.entry-meta a,
		#site-generator p,
		.page-template-page-full-width-slider-php .no-found,
		.page-template-page-home-portfolio-php .no-found,
		.page-template-page-home-slider-php .no-found {
			color: <?php echo $secondary_text_color; ?>;
		}
		.post-thumbnail hr {
			background-color: <?php echo $secondary_text_color; ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'mega_print_secondary_text_color' );

/**
 * Add a style block to the theme for the body background color.
 */
function mega_print_primary_borders_color() {
	$primary_borders_color = ot_get_option( 'primary_borders_color' );
	
	// Don't do anything if the primary_borders_color is empty or the default.
	if ( empty( $primary_borders_color ) || $primary_borders_color == '#cfcfcf' )
		return;
?>
	<style>
		/* Primary Borders Color */
		.single-post #primary,
		.entry-content,
		.blog .welcome-header,
		.archive .page-header,
		.search .page-header,
		.blog .page-header,
		.archive #primary,
		.search #primary,
		.blog #primary,
		footer.entry-meta,
		.page-template-page-contact-php .entry-header,
		#block-map-wrapper,
		#home-slider-wrapper
		.single-portfolio .entry-header,
		.portfolio-media,
		input[type=text],
		input[type=password],
		textarea,
		#branding,
		#access ul li ul,
		#info-above-the-footer,
		.entry-header,
		.welcome-header,
		.entry-content table,
		.comment-content table,
		.entry-content td,
		.comment-content td,
		.singular #author-info,
		.archive #author-info,
		.error404 .entry-header,
		.widget,
		.widget_search #searchsubmit,
		.widget_calendar #wp-calendar th,
		.widget_calendar #wp-calendar tfoot td,
		#respond input[type="text"],
		#respond textarea,
		#supplementary-wrapper,
		#site-generator,
		.fancybox-wrap,
		.grid .column,
		.tabs.ui-tabs-nav,
		.ui-tabs .ui-tabs-nav,
		.ui-tabs .ui-tabs-nav .ui-tabs-active a,
		.ui-tabs .ui-tabs-panel,
		.framed .ui-accordion-content-active,
		.framed .ui-state-default,
		.framed .ui-widget-content .ui-state-default,
		.framed .ui-state-active,
		.framed .ui-widget-content .ui-state-active,
		.framed .ui-accordion-header:first-child,
		.framed .ui-accordion-header:last-of-type,
		.hr,
		.person-desc ul,
		.atm-i,
		.woocommerce #container,
		.woocommerce #content .products ul,
		.woocommerce #content ul.products,
		.woocommerce-page #content .products ul,
		.woocommerce-page #content ul.products,
		.woocommerce #content nav.woocommerce-pagination,
		.woocommerce #content nav.woocommerce-pagination,
		.woocommerce-page #content nav.woocommerce-pagination,
		.woocommerce-page #content nav.woocommerce-pagination,
		.woocommerce #content table.shop_table td,
		.woocommerce-page #content table.shop_table td,
		.woocommerce #content .cart-collaterals .cart_totals tr td,
		.woocommerce #content .cart-collaterals .cart_totals tr th,
		.woocommerce-page #content .cart-collaterals .cart_totals tr td,
		.woocommerce-page #content .cart-collaterals .cart_totals tr th,
		.commentlist > li.comment,
		.commentlist .children > li.bypostauthor {
			border-color: <?php echo $primary_borders_color; ?>;
		}
		#content .woocommerce-message,
		#content .woocommerce-error,
		#content .woocommerce-info,
		.woocommerce div.product .woocommerce-tabs ul.tabs:before,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs:before,
		.woocommerce #content div.product .woocommerce-tabs ul.tabs:before,
		.woocommerce-page #content div.product .woocommerce-tabs ul.tabs:before,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce form.login,
		.woocommerce-page form.login,
		.woocommerce form.checkout_coupon,
		.woocommerce-page form.checkout_coupon,
		.woocommerce form.register,
		.woocommerce-page form.register,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce #content div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a {
			border-color: <?php echo $primary_borders_color; ?> !important;
		}
		@media only screen and (max-width: 959px) and (min-width: 771px) {
			.ui-tabs .ui-tabs-nav li a {
				border-color: <?php echo $primary_borders_color; ?>;
			}
		}
		@media only screen and (min-width: 580px) and (max-width: 770px) {
			.ui-tabs .ui-tabs-nav li a {
				border-color: <?php echo $primary_borders_color; ?>;
			}
		}
		@media (max-width: 579px) {
			.ui-tabs .ui-tabs-nav li a {
				border-color: <?php echo $primary_borders_color; ?>;
			}
		}
		.archive footer.entry-meta .sep,
		.search footer.entry-meta .sep,
		.blog footer.entry-meta .sep,
		.single-portfolio .portfolio-meta .sep,
		.entry-meta .sep,
		.sep,
		#filters .sep
		{
			color: <?php echo $primary_borders_color; ?>;
		}
		hr {
			background-color: <?php echo $primary_borders_color; ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'mega_print_primary_borders_color' );

/**
 * Adds background image.
 */
function mega_print_background_style() {
	$background = ot_get_option( 'background', array() );
?>
	<style>
		/* Background */
		body {
			<?php if ( ! empty( $background['background-color'] ) ) { ?>
			background-color: <?php echo $background['background-color']; ?>;
			<?php } ?>
			
			<?php if ( ! empty( $background['background-image'] ) ) { ?>
			background-image: url('<?php echo $background['background-image']; ?>');
			<?php } ?>
			
			<?php if ( ! empty( $background['background-repeat'] ) ) { ?>
			background-repeat: <?php echo $background['background-repeat']; ?>;
			<?php } ?>
			
			<?php if ( ! empty( $background['background-attachment'] ) ) { ?>
			background-attachment: <?php echo $background['background-attachment']; ?>;
			<?php } ?>
			
			<?php if ( ! empty( $background['background-position'] ) ) { ?>
			background-position: <?php echo $background['background-position']; ?>;
			<?php } ?>
		}
	</style>
<?php
}
add_action( 'wp_head', 'mega_print_background_style' );
