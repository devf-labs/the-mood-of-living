<?php

/**
 * ThemeMove Post Grid
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Post_Grid extends WPBakeryShortCode {
  public $query = '';
  public $num_pages = 0;
  public $paged = 0;
  public $offset = 0;

  public function __construct( $settings ) {
    parent::__construct( $settings );
    $this->paged = $this->get_page();
  }

  /**
   * Get current page
   * @return int
   */
  public function get_page() {
    global $wp_rewrite;
    if ( $wp_rewrite->using_permalinks() ) {
      $link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      $pieces = explode( '/', $link );

      for ( $i = 0; $i < count( $pieces ); $i ++ ) {
        if ( 'page' == $pieces[ $i ] ) {
          return intval( $pieces[ $i + 1 ] );
        }
      }
    } else {
      if ( isset( $_GET['paged'] ) ) {
        return intval( $_GET['paged'] );
      }
    }

    return 1;
  }

  /**
   * @param $atts
   */
  public function get_query( $atts ) {


    $total_posts    = intval( $atts['total_posts'] ) != - 1 ? intval( $atts['total_posts'] ) : 1000;
    $posts_per_page = intval( $atts['posts_per_page'] ) > 0 ? intval( $atts['posts_per_page'] ) : 5;

    $offset = $posts_per_page * ( $this->paged - 1 );
    $args   = array(
      'post_type'      => 'post',
      'offset'         => $offset,
      'post_count'     => $total_posts,
      'posts_per_page' => $posts_per_page,
    );

    $this->query = new WP_Query( $args );

    $this->num_pages = intval( $atts['total_posts'] ) != - 1 ? ceil( $total_posts / $posts_per_page ) : $this->query->max_num_pages;
  }

  /***
   * Display navigation to next/previous set of posts when applicable.
   * @return array|string
   */
  public function get_paging_nav() {
    global $wp_rewrite;

    // Don't print empty markup if there's only one page.
    if ( $this->num_pages < 2 ) {
      return '';
    }

    if ( ! $this->paged ) {
      $this->paged = $this->query->get( 'paged' ) ? intval( $this->query->get( 'paged' ) ) : 1;
    }

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
      wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links( array(
      'base'      => $pagenum_link,
      'format'    => $format,
      'total'     => $this->num_pages,
      'current'   => $this->paged,
      'mid_size'  => 1,
      'add_args'  => array_map( 'urlencode', $query_args ),
      'prev_text' => __( 'Newer Posts', 'thememove' ),
      'next_text' => __( 'Older  Posts', 'thememove' ),
    ) );

    if ( ! $links ) {
      return '';
    }

    return $links;
  }
}

// Mapping shortcode
vc_map( array(
  'name'        => __( 'Post Grid', 'thememove' ),
  'description' => __( 'Show all posts in grid.', 'thememove' ),
  'base'        => 'thememove_post_grid',
  'category'    => __( 'by THEMEMOVE', 'thememove' ),
  'params'      => array(
    array(
      'group'       => __( 'General', 'thememove' ),
      'type'        => 'dropdown',
      'heading'     => __( 'Post layout', 'thememove' ),
      'description' => __( 'Select a template to display post', 'thememove' ),
      'param_name'  => 'layout',
      'admin_label' => true,
      'value'       => array(
        __( 'Full Post Layout', 'thememove' )    => 'full',
        __( 'Grid Post Layout', 'thememove' )    => 'grid',
        __( 'List Post Layout', 'thememove' )    => 'list',
        __( 'Simple Post Layout', 'thememove' )  => 'simple',
        __( 'Masonry Post Layout', 'thememove' ) => 'masonry'
      )
    ),
    array(
      'group'       => __( 'General', 'thememove' ),
      'type'        => 'textfield',
      'heading'     => __( 'Total Posts', 'thememove' ),
      'param_name'  => 'total_posts',
      'value'       => - 1,
      'description' => __( 'Set max limit for items in grid or enter -1 to display all (limited to 1000)', 'thememove' ),
    ),
    array(
      'group'       => __( 'General', 'thememove' ),
      'type'        => 'textfield',
      'heading'     => __( 'Posts per page', 'thememove' ),
      'param_name'  => 'posts_per_page',
      'value'       => 5,
      'description' => __( 'Number of items to show per page', 'thememove' ),
    ),
    array(
      'group'       => __( 'General', 'thememove' ),
      'type'        => 'dropdown',
      'heading'     => __( 'Item Width', 'thememove' ),
      'description' => __( 'Enter item width in a row (has 12 columns)', 'thememove' ),
      'param_name'  => 'item_width_md',
      'value'       => array(
        __( 'Default (6 columns - 1/2 - 2 items in a row)', 'thememove' ) => 6,
        __( '1 columns - 1/1 - 12 items in a row', 'thememove' )          => 1,
        __( '2 columns - 1/6 - 6 items in a row', 'thememove' )           => 2,
        __( '3 columns - 1/4 - 4 items in a row', 'thememove' )           => 3,
        __( '4 columns - 1/3 - 3 items in a row', 'thememove' )           => 4,
        __( '6 columns - 1/2 - 2 items in a row', 'thememove' )           => 6,
        __( '12 columns - 1/1 - 1 item in a row', 'thememove' )           => 12,
      ),
      'dependency'  => array(
        'element' => 'layout',
        'value'   => 'grid',
      )
    ),
    array(
      'group'      => __( 'General', 'thememove' ),
      'type'       => 'textfield',
      'heading'    => __( 'Number of columns', 'thememove' ),
      'param_name' => 'number_of_columns_masonry',
      'value'      => 3,
      'dependency' => array( 'element' => 'layout', 'value' => 'masonry' )
    ),
    array(
      'group'      => __( 'General', 'thememove' ),
      'type'       => 'dropdown',
      'heading'    => __( 'Number of posts in a row', 'thememove' ),
      'param_name' => 'number_of_columns_simple',
      'value'      => array(
        __( 'Default (2 posts)', 'thememove' ) => 6,
        __( '12 posts', 'thememove' )          => 1,
        __( '6  posts', 'thememove' )          => 2,
        __( '4  posts', 'thememove' )          => 3,
        __( '3  posts', 'thememove' )          => 4,
        __( '2  posts', 'thememove' )          => 6,
        __( '1  posts', 'thememove' )          => 12,
      ),
      'dependency' => array( 'element' => 'layout', 'value' => 'simple' )
    ),
    array(
      'group'       => __( 'General', 'thememove' ),
      'type'        => 'textfield',
      'heading'     => __( 'Extra class name', 'thememove' ),
      'param_name'  => 'el_class',
      'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememove' ),
    ),
    array(
      'group'       => __( 'Responsive Options', 'thememove' ),
      'type'        => 'thememove_responsive',
      'heading'     => __( 'Responsiveness', 'thememove' ),
      'param_name'  => 'responsive',
      'description' => __( 'Adjust Number of items in a row for different screen sizes.', 'thememove' ),
      'dependency'  => array(
        'element' => 'layout',
        'value'   => 'grid',
      )
    ),
  )
) );

if ( class_exists('NS_Featured_Posts') ) {
  vc_add_param( 'thememove_post_grid',
    array(
      'group'      => __( 'General', 'thememove' ),
      'type'       => 'checkbox',
      'param_name' => 'enable_featured_posts',
      'value'      => array(
        __( 'Enable featured posts', 'thememove' ) => true
      ),
      'dependency' => array( 'element' => 'layout', 'value' => array( 'full', 'grid', 'list', 'masonry' ) )
    )
  );
  vc_add_param( 'thememove_post_grid',
    array(
      'group'      => __( 'Featured Posts', 'thememove' ),
      'type'       => 'textfield',
      'heading'    => __( 'Number of featured posts', 'thememove' ),
      'param_name' => 'number_of_featured_posts',
      'value'      => 2,
      'dependency' => array( 'element' => 'enable_featured_posts', 'not_empty' => true )
    )
  );
  vc_add_param( 'thememove_post_grid',
    array(
      'group'       => __( 'Featured Posts', 'thememove' ),
      'type'        => 'dropdown',
      'heading'     => __( 'Number of featured posts in a row', 'thememove' ),
      'description' => __( 'If you are using \'Masonry\' Post Layout, this option will be not work and all featured posts will be show in only one column.', 'thememove' ),
      'param_name'  => 'number_of_featured_posts_in_a_row',
      'value'       => array(
        __( 'Default (2 posts)', 'thememove' ) => 6,
        __( '12 posts', 'thememove' )          => 1,
        __( '6  posts', 'thememove' )          => 2,
        __( '4  posts', 'thememove' )          => 3,
        __( '3  posts', 'thememove' )          => 4,
        __( '2  posts', 'thememove' )          => 6,
        __( '1  posts', 'thememove' )          => 12,
      ),
      'dependency'  => array( 'element' => 'enable_featured_posts', 'not_empty' => true )
    )
  );
  vc_add_param( 'thememove_post_grid',
    array(
      'group'      => __( 'Featured Posts', 'thememove' ),
      'type'       => 'textfield',
      'heading'    => __( 'Show Featured posts after how many posts?', 'infinity' ),
      'param_name' => 'show_after',
      'value'      => 3,
      'dependency' => array( 'element' => 'enable_featured_posts', 'not_empty' => true )
    )
  );
}