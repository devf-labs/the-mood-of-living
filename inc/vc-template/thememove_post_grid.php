<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $layout
 * @var $total_posts
 * @var $posts_per_page
 * @var $item_width_md
 * @var $number_of_columns_masonry
 * @var $number_of_columns_simple
 * @var $responsive
 * @var $enable_featured_posts
 * @var $number_of_featured_posts
 * @var $number_of_featured_posts_in_a_row
 * @var $show_after
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Post_Grid
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$this->get_query($atts);

$class = 'col-md-' . $item_width_md;

if('' != $responsive) {
  $class .= ' ' . $responsive;
}

ob_start();

?>
<?php

if($enable_featured_posts && class_exists('NS_Featured_Posts')) {
  $class_featured_post = "col-md-" . $number_of_featured_posts_in_a_row;
  if ('masonry' == $layout) {
    $class_featured_post = 'col-xs-12';
  }
  $featured_post_html = thememove_get_featured_post( $number_of_featured_posts, $class_featured_post );
}

?>
<div class="tm-post-grid <?php echo esc_attr($el_class); ?>">

  <?php if($this->query->have_posts()) { ?>

  <?php if('grid' == $layout) { ?><div class="post-grid-layout row"><?php } ?>
  <?php if('list'== $layout) { ?><div class="post-list-layout container"><?php } ?>
  <?php if('simple'== $layout) { ?><div class="post-simple-layout container"><div class="row"> <?php } ?>
  <?php if('masonry'== $layout) { ?>
    <style>
      @media only screen and (min-width: 768px) {
        .grid-sizer, .post-masonry-item {
          width: <?php echo esc_attr($number_of_columns_masonry ? (100/$number_of_columns_masonry) : 33.333); ?>%;
        }
      }
    </style>
    <div class="post-masonry-layout">
    <div class="grid-sizer"></div>
  <?php } ?>

    <?php
      if(class_exists('NS_Featured_Posts') && $enable_featured_posts) { $id = 0; }
    ?>
    <?php while($this->query->have_posts()) { ?>

      <?php $this->query->the_post(); ?>
      <?php
      if($enable_featured_posts && class_exists('NS_Featured_Posts')) {
        if ( $id++ == $show_after ) {
          switch ($layout) {
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

      <?php if($layout == 'full') { ?>

        <?php get_template_part('template-parts/content', ''); ?>

      <?php } elseif ('grid'== $layout) { ?>

        <div class="<?php echo esc_attr($class); ?>">
          <?php get_template_part('template-parts/content', 'grid'); ?>
        </div>

      <?php } elseif ('list' == $layout) { ?>

        <?php get_template_part('template-parts/content', 'list'); ?>

      <?php } elseif ('masonry' == $layout) { ?>

        <?php get_template_part('template-parts/content', 'masonry'); ?>

      <?php } elseif ('simple' == $layout) { ?>

        <div class="col-sm-<?php echo esc_attr($number_of_columns_simple); ?>">
          <?php get_template_part('template-parts/content', 'simple'); ?>
        </div>
  <?php
      }
    } ?>
    <?php if('masonry' == $layout) { ?></div><?php } ?>
    <?php if('simple' == $layout) { ?></div></div><?php } ?>
    <?php if('list' == $layout) { ?></div><?php } ?>
    <?php if('grid' == $layout) { ?></div><?php } ?>
  <?php
    wp_reset_postdata();
  } else {
    get_template_part('template-parts/content', 'none');
  }
  ?>
  <?php if($this->num_pages >= 2) { ?>
    <div class="pagination posts-pagination loop-pagination">
      <?php echo $this->get_paging_nav(); ?>
    </div><!-- .pagination -->
  <?php } ?>
</div>
<?php if('masonry' == $layout) { ?>
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
