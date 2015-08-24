<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 *  @package ThemeMove
 */

/**
 * Add custom classes to the array of header classes
 * ================================================
 * @param string $class Classes for the header element
 * @return array
 */
function get_header_classes( $class = '' ) {
  $classes = array();

  $classes[] = 'header';

  $classes = array_map( 'esc_attr', $classes );

  $classes = apply_filters( 'header_class', $classes, $class );

  return array_unique( $classes );
}

/**
 * Print header classes
 * @param string $classes
 */
function header_class( $classes = '' ) {
  echo 'class="' . join(' ', get_header_classes($classes)) . '"';
}

/**
 * Add custom classes to the array of footer classes
 * ================================================
 * @param string $class Classes for the footer element
 * @return array
 */
function get_footer_classes( $class = '' ) {
  $classes = array();

  $classes[] = 'footer';

  $classes = array_map( 'esc_attr', $classes );

  $classes = apply_filters( 'footer_class', $classes, $class );

  return array_unique( $classes );
}

/**
 * Print header classes
 * @param string $classes
 */
function footer_class( $classes = '' ) {
  echo 'class="' . join(' ', get_footer_classes($classes)) . '"';
}


/**
 * Adds custom classes to the array of body classes.
 * ================================================
 * @param array $classes Classes for the body element.
 * @return array
 */
function thememove_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

  if (get_theme_mod('box_mode_enable')) {
    $classes[] = 'boxed';
  }

  global $infinity_uncover_enable;
  if ((get_theme_mod( 'footer_uncovering_enable', footer_uncovering_enable) || $infinity_uncover_enable  == 'enable')&& $infinity_uncover_enable != 'disable') {
    $classes[] = 'uncover';
  }

  global $infinity_disable_title;
  if ($infinity_disable_title == 'on') {
    $classes[] = 'disable-title';
  }

  global $infinity_bread_crumb_enable;
  if ($infinity_bread_crumb_enable == 'disable') {
    $classes[] = 'disable-breadcrumb';
  }

  if(get_post_meta(get_the_ID(), "thememove_contact_address", true) && is_page_template()){
    $classes[] = 'map-enable';
  }

  global $infinity_sticky_header;
  if ((get_theme_mod( 'header_sticky_enable',header_sticky_enable) || $infinity_sticky_header == 'enable')
    && $infinity_sticky_header != 'disable') {
    $classes[] = 'header-sticky';
  }

  global $infinity_page_layout_private;
  if (get_theme_mod( 'site_layout',site_layout) == 'full-width' || $infinity_page_layout_private == 'full-width' ) {
    $classes[] = 'full-width';
  }elseif(get_theme_mod( 'site_layout',site_layout ) == 'content-sidebar' || $infinity_page_layout_private == 'content-sidebar' ){
    $classes[] = 'content-sidebar';
  }elseif(get_theme_mod( 'site_layout',site_layout ) == 'sidebar-content' || $infinity_page_layout_private == 'sidebar-content' ){
    $classes[] = 'sidebar-content';
  }

  global $infinity_custom_class;
  if ($infinity_custom_class) {
    $classes[] = $infinity_custom_class;
  }

  $classes[] = 'scheme';

  return $classes;

	return $classes;
}
add_filter( 'body_class', 'thememove_body_classes' );

/**
 * Enable HTML code in WP Widget Titles
 * @param $title The title of WP Widget
 * @return HTML title
 */
function html_widget_title( $title ) {
//HTML tag opening/closing brackets
  $title = str_replace( '[', '<', $title );
  $title = str_replace( '[/', '</', $title );
// bold -- changed from 's' to 'strong' because of strikethrough code
  $title = str_replace( 'strong]', 'strong>', $title );
  $title = str_replace( 'b]', 'b>', $title );
// italic
  $title = str_replace( 'em]', 'em>', $title );
  $title = str_replace( 'i]', 'i>', $title );
// underline
// $title = str_replace( 'u]', 'u>', $title ); // could use this, but it is deprecated so use the following instead
  $title = str_replace( '<u]', '<span style="text-decoration:underline;">', $title );
  $title = str_replace( '</u]', '</span>', $title );
// superscript
  $title = str_replace( 'sup]', 'sup>', $title );
// subscript
  $title = str_replace( 'sub]', 'sub>', $title );
// del
  $title = str_replace( 'del]', 'del>', $title ); // del is like strike except it is not deprecated, but strike has wider browser support -- you might want to replace the following 'strike' section to replace all with 'del' instead
// strikethrough or <s></s>
  $title = str_replace( 'strike]', 'strike>', $title );
  $title = str_replace( 's]', 'strike>', $title ); // <s></s> was deprecated earlier than so we will convert it
  $title = str_replace( 'strikethrough]', 'strike>', $title ); // just in case you forget that it is 'strike', not 'strikethrough'
// tt
  $title = str_replace( 'tt]', 'tt>', $title ); // Will not look different in some themes, like Twenty Eleven -- FYI: http://reference.sitepoint.com/html/tt
// marquee
  $title = str_replace( 'marquee]', 'marquee>', $title );
// blink
  $title = str_replace( 'blink]', 'blink>', $title ); // only Firefox and Opera support this tag
// wtitle1 (to be styled in style.css using .wtitle1 class)
  $title = str_replace( '<wtitle1]', '<span class="wtitle1">', $title );
  $title = str_replace( '</wtitle1]', '</span>', $title );
// wtitle2 (to be styled in style.css using .wtitle2 class)
  $title = str_replace( '<wtitle2]', '<span class="wtitle2">', $title );
  $title = str_replace( '</wtitle2]', '</span>', $title );

  return $title;
}
add_filter( 'widget_title', 'html_widget_title' );


/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function thememove_setup_author() {
  global $wp_query;

  if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
    $GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
  }
}
add_action( 'wp', 'thememove_setup_author' );

/**
 * Custom comment layout
 * @param $comment
 * @param $args
 * @param $depth
 */
function ThemeMove_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>">
    <div class="comment-author vcard">
      <?php echo get_avatar($comment,$size='100'); ?>
    </div>
    <div class="comment-content">
      <?php if ($comment->comment_approved == '0') : ?>
        <em><?php _e('Your comment is awaiting moderation.','thememove') ?></em>
        <br />
      <?php endif; ?>
      <div class="metadata">
        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
        <span class="date"><?php printf(__('%1$s','thememove'), get_comment_date(),  get_comment_time()) ?></span>
        <?php edit_comment_link(__('(Edit)','thememove'),'  ','') ?>
      </div>
      <?php comment_text() ?>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
  </div>
<?php
}

/**
 * @param $string
 * @param $word_limit
 *
 * @return string
 */
function thememove_string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));

  if(count($words) > $word_limit) {
    array_pop($words);
  }

  return implode(' ', $words);
}

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 * ==========================================================================
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function infinity_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'infinity' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'infinity_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function infinity_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'infinity_render_title' );
endif;

/***
 * is_tree conditional
 * ===================
 */
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  if(is_page()&&($post->post_parent==$pid||is_page($pid)))
    return true;   // we're at the page or at a sub page
  else
    return false;  // we're elsewhere
};

/***
 * Get mini cart HTML
 * ==================
 * @return string
 */
if (class_exists('WooCommerce')) {
  function thememove_minicart() {
    $cart_html = '';
    $qty       = WC()->cart->get_cart_contents_count();

    $cart_html .= '<div class="tm-mini-cart">';
    $cart_html .= '<i class="tm-mini-cart__icon fa fa-shopping-cart"></i>';
    $cart_html .= '<span class="tm-mini-cart__qty">' . $qty . ' ' . ($qty >= 1 ? __('items', 'thememove' ) : __('item', 'thememove' )) . ' ' . __('in cart', 'thememove') . '</span>';
    $cart_html .= '<a class="tm-mini-cart__link" href="' . WC()->cart->get_checkout_url() . '"">' . __('Check out', 'thememove') . '</a>';
    $cart_html .= '</div>';

    return $cart_html;
  }
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * ========================================================================
 * @param $fragments
 * @return mixed
 */
if (class_exists('WooCommerce')) {
  add_filter('woocommerce_add_to_cart_fragments', 'thememove_header_add_to_cart_fragment');
  function thememove_header_add_to_cart_fragment($fragments)
  {
    ob_start();
    $cart_html = thememove_minicart();

    echo $cart_html;

    $fragments['.tm-mini-cart'] = ob_get_clean();

    return $fragments;
  }
}