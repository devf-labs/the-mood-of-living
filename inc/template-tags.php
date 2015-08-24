<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Infinity
 */

if ( ! function_exists( 'infinity_paging_nav' ) ) :
  /**
   * Display navigation to next/previous set of posts when applicable.
   */
  function infinity_paging_nav() {
    global $wp_query, $wp_rewrite;

    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages < 2 ) {
      return;
    }

    $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

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
      'total'     => $wp_query->max_num_pages,
      'current'   => $paged,
      'mid_size'  => 1,
      'add_args'  => array_map( 'urlencode', $query_args ),
      'prev_text' => __( 'Newer Posts', 'twentyfourteen' ),
      'next_text' => __( 'Older Posts', 'twentyfourteen' ),
    ) );

    if ( $links ) :

      ?>
      <div class="pagination loop-pagination">
        <?php echo $links; ?>
      </div><!-- .pagination -->
      <?php
    endif;
  }
endif;

if ( ! function_exists( 'the_posts_navigation' ) ) :
  /**
   * Display navigation to next/previous set of posts when applicable.
   *
   * @todo Remove this function when WordPress 4.3 is released.
   */
  function the_posts_navigation() {
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
      return;
    }
    ?>
    <nav class="navigation posts-navigation">
      <h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'infinity' ); ?></h2>

      <div class="nav-links">
        <div class="nav-previous"><?php next_posts_link( __( 'Older Posts', 'infinity' ) ); ?></div>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer Posts', 'infinity' ) ); ?></div>
      </div>
      <!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
  }
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
  /**
   * Display navigation to next/previous post when applicable.
   *
   * @todo Remove this function when WordPress 4.3 is released.
   */
  function the_post_navigation() {
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous ) {
      return;
    }
    ?>
    <nav class="navigation post-navigation">
      <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'infinity' ); ?></h2>

      <div class="nav-links">
        <?php
        previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
        next_post_link( '<div class="nav-next">%link</div>', '%title' );
        ?>
      </div>
      <!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
  }
endif;

if ( ! function_exists( 'infinity_related_posts' ) ) :
  /**
   * Display related posts
   */
  function infinity_related_posts() {
    global $post;

    // Get all tags
    $tags = wp_get_post_tags( $post->ID );

    if ( $tags ) :
      $first_tag = $tags[0]->term_id;
      $args = array(
        'tag__in'             => array( $first_tag ),
        'post__not_in'        => array( $post->ID ),
        'posts_per_page'      => 3,
        'ignore_sticky_posts' => 1
      );

      $query     = new WP_Query( $args );

      if ( $query->have_posts() ) : ?>
        <div class="related-posts">
          <h3> <?php _e( 'Related Posts', 'infinity' ); ?> </h3>
          <div class="post-simple-layout container">
            <div class="row">
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-sm-4">
                  <?php get_template_part( 'template-parts/content', 'simple' ); ?>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      <?php endif;
      wp_reset_postdata();
      ?>
    <?php endif; ?>
  <?php }
endif;

if ( ! function_exists( 'infinity_posted_on' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function infinity_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() ),
      esc_attr( get_the_modified_date( 'c' ) ),
      esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf( esc_html_x( '%s', 'post date', 'infinity' ), $time_string );

    $byline = sprintf(
      esc_html_x( 'by %s', 'post author', 'infinity' ),
      '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

  }
endif;

if ( ! function_exists( 'infinity_entry_category' ) ) :
  /**
   * Prints HTML with meta information for the categories
   */
  function infinity_entry_categories() {
    if ( 'post' == get_post_type() ) {
      $categories_list = get_the_category_list( ' ' );
      if ( $categories_list && infinity_categorized_blog() ) {
        printf( esc_html__( '%1$s', 'infinity' ), $categories_list ); // WPCS: XSS OK.
      }
    }
  }
endif;

if ( ! function_exists( 'infinity_entry_tags' ) ) :
  /**
   * Prints HTML with meta information for the tags
   */
  function infinity_entry_tags() {
    if ( 'post' == get_post_type() ) {
      $tags_list = get_the_tag_list( '', '' );
      if ( $tags_list ) {
        printf( esc_html__( '%1$s', 'infinity' ), $tags_list ); // WPCS: XSS OK.
      }
    }
  }
endif;

if ( ! function_exists( 'infinity_entry_comments' ) ) :
  /**
   * Prints HTML with meta information for the comments
   */
  function infinity_entry_comments() {
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';
      comments_popup_link( esc_html__( 'Leave a comment', 'infinity' ), esc_html__( '1 Comment', 'infinity' ), esc_html__( '% Comments', 'infinity' ) );
      echo '</span>';
    }

    //edit_post_link( esc_html__( 'Edit', 'infinity' ), '<span class="edit-link">', '</span>' );
  }
endif;

if ( ! function_exists( 'infinity_entry_readmore' ) ) :
  /**
   * Customize Read More link
   * @return string
   */
  function infinity_entry_readmore() {
    global $post;
    $infinity_hide_readmore = Kirki::get_option( 'infinity', 'post_general_hide_read_more' );

    if ( $infinity_hide_readmore ) {
      return '';
    }

    return '<p class="more-link"><a href="' . get_permalink( $post->ID ) . '">' . esc_html( 'Continue reading', 'infinity' ) . '</a></p>';
  }

  add_filter( 'the_content_more_link', 'infinity_entry_readmore' );
endif;

if ( ! function_exists( 'infinity_entry_author' ) ) :
  /**
   * Display author information
   */
  function infinity_entry_author() {
    $output = '<div class="author-info">';
    if (get_the_author_meta('description')) {
      $output .= get_avatar( get_the_author_meta( 'user_email' ), 100 );
    } else {
      $output .= get_avatar( get_the_author_meta( 'user_email' ), 50 );
    }
    $output .= '<a class="author-info__name" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . get_the_author() . '</a>';
    $output .= '<p class="author-info__description">' . get_the_author_meta( 'description' ) . '</p>';
    $output .= '<a class="author-info__email" href="mailto:' . get_the_author_meta( 'user_email' ) . '" title="' . sprintf( esc_html_x( 'Email to %s', 'infinity' ), get_the_author() ) . '">' . get_the_author_meta( 'user_email' ) . '</a>';
    $output .= '</div>';

    echo $output;
  }
endif;

if ( ! function_exists( 'infinity_the_archive_title' ) ) :
  /**
   * Shim for `the_archive_title()`.
   *
   * Display the archive title based on the queried object.
   *
   * @todo Remove this function when WordPress 4.3 is released.
   *
   * @param string $before Optional. Content to prepend to the title. Default empty.
   * @param string $after Optional. Content to append to the title. Default empty.
   */
  function infinity_the_archive_title( $before = '', $after = '' ) {
    if ( is_category() ) {
      $title = sprintf( __( 'Category / <span> %s </span>', 'infinity' ), single_cat_title( '', false ) );
    } elseif ( is_tag() ) {
      $title = sprintf( __( 'Tag / <span> %s </span>', 'infinity' ), single_tag_title( '', false ) );
    } elseif ( is_author() ) {
      $title = sprintf( __( 'Author / <span> %s </span>', 'infinity' ), '<span class="vcard">' . get_the_author() . '</span>' );
    } elseif ( is_year() ) {
      $title = sprintf( __( 'Year : <span> %s </span>', 'infinity' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'infinity' ) ) );
    } elseif ( is_month() ) {
      $title = sprintf( __( 'Month : <span> %s </span>', 'infinity' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'infinity' ) ) );
    } elseif ( is_day() ) {
      $title = sprintf( __( 'Day : <span> %s </span>', 'infinity' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'infinity' ) ) );
    } elseif ( is_tax( 'post_format' ) ) {
      if ( is_tax( 'post_format', 'post-format-aside' ) ) {
        $title = esc_html_x( 'Asides', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
        $title = esc_html_x( 'Galleries', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
        $title = esc_html_x( 'Images', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
        $title = esc_html_x( 'Videos', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
        $title = esc_html_x( 'Quotes', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
        $title = esc_html_x( 'Links', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
        $title = esc_html_x( 'Statuses', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
        $title = esc_html_x( 'Audio', 'post format archive title', 'infinity' );
      } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
        $title = esc_html_x( 'Chats', 'post format archive title', 'infinity' );
      }
    } elseif ( is_post_type_archive() ) {
      $title = sprintf( esc_html__( 'Archives: %s', 'infinity' ), post_type_archive_title( '', false ) );
    } elseif ( is_tax() ) {
      $tax = get_taxonomy( get_queried_object()->taxonomy );
      /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
      $title = sprintf( __( '%1$s / <span>%2$s</span>', 'infinity' ), $tax->labels->singular_name, single_term_title( '', false ) );
    } else {
      $title = esc_html__( 'Archives', 'infinity' );
    }

    /**
     * Filter the archive title.
     *
     * @param string $title Archive title to be displayed.
     */
    $title = apply_filters( 'get_the_archive_title', $title );

    if ( ! empty( $title ) ) {
      echo $before . $title . $after;  // WPCS: XSS OK.
    }
  }
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
  /**
   * Shim for `the_archive_description()`.
   *
   * Display category, tag, or term description.
   *
   * @todo Remove this function when WordPress 4.3 is released.
   *
   * @param string $before Optional. Content to prepend to the description. Default empty.
   * @param string $after Optional. Content to append to the description. Default empty.
   */
  function the_archive_description( $before = '', $after = '' ) {
    $description = apply_filters( 'get_the_archive_description', term_description() );

    if ( ! empty( $description ) ) {
      /**
       * Filter the archive description.
       *
       * @see term_description()
       *
       * @param string $description Archive description to be displayed.
       */
      echo $before . $description . $after;  // WPCS: XSS OK.
    }
  }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function infinity_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'infinity_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,
      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'infinity_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so infinity_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so infinity_categorized_blog should return false.
    return false;
  }
}

/**
 * Flush out the transients used in infinity_categorized_blog.
 */
function infinity_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient( 'infinity_categories' );
}

add_action( 'edit_category', 'infinity_category_transient_flusher' );
add_action( 'save_post', 'infinity_category_transient_flusher' );