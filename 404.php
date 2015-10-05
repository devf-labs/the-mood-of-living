<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Lily
 * @since Lily 1.0
 */

get_header(); ?>

  <div id="main" class="clearfix">

  <div id="primary">
    <div id="content" role="main">

      <article id="post-0" class="post error404 not-found">
        <header class="entry-header">
          <h1 class="entry-title"><?php _e( '404', 'mega' ); ?></h1>
        </header>

        <div class="entry-content">
          <h2><?php _e( 'Unfortunately the page you tried to access was unavailable due to an error.', 'mega' ); ?></h2>
          
          <p>
          <?php _e( 'Please', 'mega' ); ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="back">
              <?php _e( 'click here', 'mega' ); ?>
              <?php _e( 'to return to the homepage.', 'mega' ); ?>
            </a>
          </p>
        </div><!-- .entry-content -->
      </article><!-- #post-0 -->

    </div><!-- #content -->
  </div><!-- #primary -->