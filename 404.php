<?php
/**
 * The template for displaying 404 pages (not found).
 *
 *  @package ThemeMove
 */
$layout = Kirki::get_option( 'infinity', 'site_layout' );
get_header(); ?>

<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <?php if('sidebar-content' == $layout){ ?>
        <?php get_sidebar(); ?>
      <?php } ?>
      <?php if ('sidebar-content' == $layout  || 'content-sidebar' == $layout) { ?>
        <?php $class = 'col-md-9'; ?>
      <?php } else { ?>
        <?php $class = 'col-md-12'; ?>
      <?php } ?>
      <div class="<?php echo esc_attr($class); ?>">
        <main id="main" class="site-main">

          <section class="error-404 not-found">
            <header class="page-header">
              <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'infinity' ); ?></h1>
            </header><!-- .page-header -->

          </section><!-- .error-404 -->
        </main><!-- #main -->
      </div>
      <?php if('content-sidebar' == $layout){ ?>
        <?php get_sidebar(); ?>
      <?php } ?>
    </div>
  </div>
</div><!-- .content-wrapper  -->

<?php get_footer(); ?>
