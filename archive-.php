<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 *  @package ThemeMove
 */
$infinity_title_style           =  Kirki::get_option( 'infinity', 'page_heading_style' );
$infinity_heading_image         =  get_theme_mod('page_heading_image', page_heading_image);
$infinity_heading_bg_color      =  Kirki::get_option( 'infinity', 'page_heading_bg_color' );
$infinity_heading_color         =  Kirki::get_option( 'infinity', 'page_heading_color' );
$infinity_disable_parallax      =  !Kirki::get_option( 'infinity', 'page_heading_disable_parallax' );
$layout = Kirki::get_option( 'infinity', 'archive_layout' );
$post_grid_layout = Kirki::get_option('infinity', 'post_grid_layout');

get_header();

if (class_exists('NS_Featured_Posts')) {
  $infinity_post_featured_enable  =  Kirki::get_option( 'infinity', 'post_featured_enable' );
  $infinity_post_featured_number_of_posts  =  Kirki::get_option( 'infinity', 'post_featured_number_of_posts' );
  $infinity_post_featured_number_of_posts_in_a_row  =  Kirki::get_option( 'infinity', 'post_featured_number_of_posts_in_a_row' );
  $infinity_post_featured_show_after  =  Kirki::get_option( 'infinity', 'post_featured_show_after' );
} else {
  $infinity_post_featured_enable = false;
}


if($infinity_post_featured_enable && class_exists('NS_Featured_Posts')) {
  $class_featured_post = "col-md-" . $infinity_post_featured_number_of_posts_in_a_row;
  if ('masonry' == $post_grid_layout) {
    $class_featured_post = 'col-xs-12';
  }
  $featured_post_html = thememove_get_featured_post( $infinity_post_featured_number_of_posts, $class_featured_post );
}

?>
<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <?php if('sidebar-content' == $layout) : ?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
      <?php if ('sidebar-content' == $layout  || 'content-sidebar' == $layout) : ?>
        <?php $class = 'col-md-9'; ?>
      <?php  else : ?>
        <?php $class = 'col-md-12'; ?>
      <?php endif; ?>
      <div class="<?php echo esc_attr($class); ?>">
        <main id="main" class="content site-main">
          <?php if ( have_posts() ) : ?>
            <?php if ('image' == $infinity_title_style) : //If enable heading image ?>
              <header class="big-title image-background"
                <?php if("on" != $infinity_disable_parallax) : ?>
                  data-stellar-background-ratio="0.5"
                <?php endif; ?>>
                <?php
                infinity_the_archive_title( '<h1 class="entry-title"  style="color: ' . $infinity_heading_color . ';">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
              </header><!-- .entry-header -->
            <?php else : // single color heading ?>
              <header class="big-title color-background" style="background-color: <?php echo esc_attr($infinity_heading_bg_color); ?>">
                <?php
                infinity_the_archive_title( '<h1 class="entry-title" style="color:"' . $infinity_heading_color . ';">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
              </header><!-- .entry-header -->
            <?php endif; ?>

            <?php if('grid' == $post_grid_layout) : ?><div class="post-grid-layout row"><?php endif; ?>
            <?php if('list'== $post_grid_layout) : ?><div class="post-list-layout container"><?php endif; ?>
            <?php if('masonry'== $post_grid_layout) :
                if('full-width' == $layout) : $number_of_columns_masonry = '3'; else : $number_of_columns_masonry = '2'; endif;
            ?>
              <style>
                @media only screen and (min-width: 768px) {
                  .grid-sizer, .post-masonry-item {
                    width: <?php echo (100/$number_of_columns_masonry); ?>%;
                  }
                }
              </style>
              <div class="post-masonry-layout">
                <div class="grid-sizer"></div>
            <?php endif; ?>

            <?php
            if($infinity_post_featured_enable && class_exists('NS_Featured_Posts')) { $idx = 0; }
            ?>

            <?php while ( have_posts() ) : the_post(); ?>

              <?php
              if($infinity_post_featured_enable && class_exists('NS_Featured_Posts')) {
                if ( $idx++ == $infinity_post_featured_show_after ) {
                  switch ($post_grid_layout) {
                    case 'grid':
                      ?>
                      <div class="col-xs-12">
                        <div class="featured-posts">
                          <h3 class="featured-posts__title"><?php _e('Featured', 'thememove'); ?></h3>
                          <div class="row">
                            <?php echo $featured_post_html; ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      break;
                    case 'list':
                      ?>
                      <div class="row">
                        <div class="featured-posts col-xs-12">
                          <h3 class="featured-posts__title"><?php _e('Featured', 'thememove'); ?></h3>
                          <div class="row">
                            <?php echo $featured_post_html; ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      break;
                    case 'masonry':
                      ?>
                      <div class="post-masonry-item">
                        <div class="featured-posts container">
                          <h3 class="featured-posts__title"><?php _e('Featured', 'thememove'); ?></h3>
                          <div class="row">
                            <?php echo $featured_post_html; ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      break;
                    default:
                      ?>
                      <div class="featured-posts container">
                        <h3 class="featured-posts__title"><?php _e('Featured', 'thememove'); ?></h3>
                        <div class="row">
                          <?php echo $featured_post_html; ?>
                        </div>
                      </div>
                      <?php
                  }
                }
              }
              ?>


              <?php if($post_grid_layout == 'full') : ?>

                <?php get_template_part('template-parts/content', ''); ?>

              <?php elseif ('grid'== $post_grid_layout) : ?>

                <?php if('full-width' == $layout) : $post_class = 'col-md-4'; else : $post_class = 'col-md-6'; endif; ?>
                <div class="<?php echo esc_attr($post_class); ?>">
                  <?php get_template_part('template-parts/content', 'grid'); ?>
                </div>

              <?php elseif ('list' == $post_grid_layout) : ?>

                <?php get_template_part('template-parts/content', 'list'); ?>

              <?php elseif ('masonry' == $post_grid_layout) : ?>

                <?php get_template_part('template-parts/content', 'masonry'); ?>

              <?php endif; ?>

            <?php endwhile; ?>

            <?php if('masonry' == $post_grid_layout) : ?></div><?php endif; ?>
            <?php if('list' == $post_grid_layout) : ?></div><?php endif; ?>
            <?php if('grid' == $post_grid_layout) : ?></div><?php endif; ?>

            <?php infinity_paging_nav(); ?>

          <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; ?>
        </main><!-- #main -->
      </div>
      <?php if('content-sidebar' == $layout){ ?>
        <?php get_sidebar(); ?>
      <?php } ?>
    </div>
  </div>
</div><!--.content-wrapper-->
<?php get_footer(); ?>
<?php if('masonry' == $post_grid_layout) { ?>
  <script>
    jQuery(document).ready(function ($) {
      var $grid =  $('.post-masonry-layout').masonry({
        itemSelector: '.post-masonry-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
      });

      $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
      })
    });
  </script>
<?php } ?>

