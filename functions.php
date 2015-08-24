<?php
/**
 * thememove functions and definitions
 *
 * @package ThemeMove
 */

if ( ! function_exists( 'thememove_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   * ===========================================================================
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function thememove_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on thememove, use a find and replace
     * to change 'thememove' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'thememove', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'full-thumb', 1170, 0, true );
    add_image_size( 'grid-thumb', 410, 270, true );
    add_image_size( 'list-thumb', 370, 370, true );
    add_image_size( 'simple-thumb', 370, 240, true );
    add_image_size( 'single-thumb', 1170, 770, true );
    add_image_size( 'small-thumb', 60, 60, true );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary' => esc_html__( 'Primary Menu', 'thememove' ),
      'social'  => esc_html__( 'Social Profile Links', 'thememove' ),
      'footer'  => esc_html__( 'Footer Menu', 'thememove' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
      'gallery',
      'video',
      'audio',
      'quote',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'thememove_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );
  }
endif; // thememove_setup
add_action( 'after_setup_theme', 'thememove_setup' );

/**
 * Define Constants
 * ================
 */
define( 'THEME_ROOT', get_template_directory_uri() );
require_once locate_template( '/inc/variables.php' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * ===========================================================================
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) {
  $content_width = 640; /* pixels */
}

/**
 * Register widget area.
 * ====================
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function thememove_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'thememove' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer 1 Widget Area', 'thememove' ),
    'id'            => 'footer',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer 2 Widget Area', 'thememove' ),
    'id'            => 'footer2',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer 3 Widget Area', 'thememove' ),
    'id'            => 'footer3',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  if ( class_exists( 'SitePress' ) || class_exists( 'Polylang' ) ) {
    register_sidebar( array(
      'name'          => __( 'Language Widget Area', 'thememove' ),
      'id'            => 'lang-area',
      'description'   => '',
      'before_widget' => '<aside id="%1$s" class="widget widget-language %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
  }
}

add_action( 'widgets_init', 'thememove_widgets_init' );

locate_template( '/inc/widget/thememove_twitter_widget.php', true, true );
locate_template( '/inc/widget/thememove_instagram_widget.php', true, true );
locate_template( '/inc/widget/thememove_facebook_widget.php', true, true );

/**
 * Enqueue scripts and styles.
 * ==========================
 */
function thememove_scripts() {
  wp_enqueue_style('infinity-style', THEME_ROOT . '/style.css');
  wp_enqueue_style('infinity-main', THEME_ROOT . '/css/main.css');

  wp_enqueue_style( 'thememove-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'thememove-pe-7-stroke', '//goo.gl/R4Zo33' );
  wp_enqueue_script( 'thememove-js-stellar', THEME_ROOT . '/js/jquery.stellar.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'thememove-js-owl-carousel', THEME_ROOT . '/js/owl.carousel.min.js' );
  wp_enqueue_script( 'thememove-js-magnific', THEME_ROOT . '/js/jquery.magnific-popup.min.js' );
  wp_enqueue_script( 'thememove-js-fitvids', THEME_ROOT . '/js/fitvids.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'thememove-js-main', THEME_ROOT . '/js/main.js', array( 'jquery' ), null, true );
  wp_enqueue_script('thememove-masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js');
  wp_enqueue_script('thememove-images-loaded', '//imagesloaded.desandro.com/imagesloaded.pkgd.min.js');

  if ( get_theme_mod( 'enable_smooth_scroll', enable_smooth_scroll ) ) {
    wp_enqueue_script( 'thememove-js-smooth-scroll', THEME_ROOT . '/js/smoothscroll.js' );
  }

  global $infinity_sticky_header;
  if ( ( get_theme_mod( 'header_sticky_enable', header_sticky_enable ) || $infinity_sticky_header == 'enable' ) && $infinity_sticky_header != 'disable' ) {
    wp_enqueue_script( 'thememove-js-head-room-jquery', THEME_ROOT . '/js/jQuery.headroom.min.js' );
    wp_enqueue_script( 'thememove-js-head-room', THEME_ROOT . '/js/headroom.min.js' );
  }

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  wp_enqueue_style( 'thememove-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'thememove_scripts' );

/**
 * Implement other setup.
 * ======================
 */
//load core
locate_template( '/core/initial.php', true, true );
locate_template( '/inc/customizer/customizer.php', true, true );
locate_template( '/inc/oneclick.php', true, true );

//load tmg
locate_template( '/inc/tmg-plugin-activation.php', true, true );
locate_template( '/inc/tmg-plugin-registration.php', true, true );

//load metabox
locate_template( '/inc/meta-box.php', true, true );

//load custom header
locate_template( '/inc/custom-header.php', true, true );

//Custom template tags for this theme.
locate_template( '/inc/template-tags.php', true, true );

//Custom functions that act independently of the theme templates.
locate_template( '/inc/extras.php', true, true );

//Load Jetpack compatibility file.
locate_template( '/inc/jetpack.php', true, true );

// Custom js
locate_template( '/inc/custom-js.php', true, true );

if( class_exists('NS_Featured_Posts') ) {
  /**
   * Get featured posts
   *
   * @param int|Number $num Number of featured posts
   * @return string
   */
  function thememove_get_featured_post( $num = 2, $css_class ) {

    ob_start();

    $args = array(
      'post_type'      => 'post',
      'post_count'     => intval( $num ),
      'posts_per_page' => intval( $num ),
      'meta_key'       => '_is_ns_featured_post',
      'meta_value'     => 'yes'
    );

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : $query->the_post();
      ?>
        <div class="<?php echo esc_attr($css_class); ?>">
          <?php get_template_part( 'template-parts/content', 'featured' ); ?>
        </div>
    <?php endwhile;
    endif;

    wp_reset_postdata();

    $featured_post_html = ob_get_clean();

    return $featured_post_html;
  }
}

// Extend VC
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
  function requireVcExtend() {
    require_once locate_template( '/inc/vc-extend.php' );
  }

  add_action( 'init', 'requireVcExtend', 2 );
}

// Adding new field for Quote Post Format
if ( ! function_exists( 'thememove_add_quote_text_field' ) ) {
  function thememove_add_quote_text_field() {
    global $post;
    ?>
    <div class="vp-pfui-elm-block">
      <label for="vp-pfui-format-quote-text"><?php _e( 'Quote', 'thememove' ); ?></label>

      <textarea name="_format_quote_text" id="vp-pfui-format-quote-text" cols="30"
                rows="10"><?php echo esc_attr( get_post_meta( $post->ID, '_format_quote_text', true ) ); ?></textarea>

    </div>
    <?php
  }

  add_action( 'vp_pfui_after_quote_meta', 'thememove_add_quote_text_field' );
}

if ( ! function_exists( 'thememove_add_gallery_type_field' ) ) {
  function thememove_add_gallery_type_field() {
    global $post;
    $type = get_post_meta( $post->ID, '_format_gallery_type', true );
    if ( ! $type ) {
      $type = 'slider';
    }
    ?>
    <div class="vp-pfui-elm-block">
      <label for="vp-pfui-format-gallery-type"><?php _e( 'Gallery Type', 'my-theme' ); ?></label>
      <input type="radio" name="_format_gallery_type" value="slider"
             id="slider" <?php checked( $type, "slider" ); ?>><label style="display: inline-block; padding:0 10px 0 0;"
                                                                     for="slider"><?php _e( 'Slider', 'thememove' ); ?></label>
      <input type="radio" name="_format_gallery_type" value="masonry"
             id="masonry" <?php checked( $type, "masonry" ); ?>><label
        style="display: inline-block; padding:0 10px 0 0;" for="masonry"><?php _e( 'Masonry', 'thememove' ); ?></label>
    </div>
    <?php
  }

  add_action( 'vp_pfui_after_gallery_meta', 'thememove_add_gallery_type_field' );
}

add_action( 'admin_init', 'thememove_admin_init' );

function thememove_admin_init() {
  $post_formats = get_theme_support( 'post-formats' );
  if ( ! empty( $post_formats[0] ) && is_array( $post_formats[0] ) ) {
    if ( in_array( 'quote', $post_formats[0] ) ) {
      add_action( 'save_post', 'thememove_custom_save_post' );
    }
  }
}

function thememove_custom_save_post( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  if ( ! defined( 'XMLRPC_REQUEST' ) ) {
    if ( isset( $_POST['_format_quote_text'] ) ) {
      update_post_meta( $post_id, '_format_quote_text', $_POST['_format_quote_text'] );
    }
    if ( isset( $_POST['_format_gallery_type'] ) ) {
      update_post_meta( $post_id, '_format_gallery_type', $_POST['_format_gallery_type'] );
    }
  }
}