<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeMove
 */

?>
</div>

  <!-- Footer
    ================================================== -->
  <footer id="colophon" role="contentinfo">
  
    <div class="greyLine"></div>
    <div id="site-generator-wrapper">
      <section id="site-generator" class="clearfix">
        
        
          
        <?php
        /*
         * Print the footer info.
         */
        $footer_info = ot_get_option( 'footer_info' );
        ?>

        <?php if ( ! empty( $footer_info ) ) { ?>
          <?php echo $footer_info; ?>
        <?php } ?>
        <?php get_template_part('template-parts/social-accounts' ); // Social accounts ?>
        <?php
        /*
         * Print the sub-footer info.
         */
        $sub_footer_info = ot_get_option( 'sub_footer_info' );
        ?>
        
        <div id="sub-footer-info">
          <?php if ( ! empty( $sub_footer_info ) ) { ?>
            <?php echo $sub_footer_info; ?>
          <?php } ?>
        </div>
      </section>
    </div><!-- #site-generator-wrapper -->
  </footer><!-- #colophon -->
</section>
<!-- Scroll to top -->
<?php if (get_theme_mod('enable_back_to_top', enable_back_to_top)) { ?>
  <a class="scrollup"><i class="fa fa-angle-up"></i><?php echo __('Go to top', 'thememove'); ?></a>
<?php } ?>

<?php wp_footer(); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c56d6c507ed878" async="async"></script>
</body>
</html>
