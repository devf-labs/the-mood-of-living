<?php
add_action('wp_footer', 'thememove_js_custom_code');
function thememove_js_custom_code()
{ ?>
  <?php if (Kirki::get_option( 'infinity', 'custom_js_enable' )) { ?>
    <?php echo html_entity_decode(get_theme_mod('custom_js')); ?>
  <?php } ?>

  <script>
    (function ($) {
      jQuery(window).on('resize', function () {
        if ($(window).width() >= 992) {
          $('#page').css('padding-bottom', $('.uncover .bottom-wrapper').outerHeight());
        }
      });

      jQuery(window).on('load', function () {
        jQuery(window).trigger('resize');
      });
    })(jQuery);
  </script>


  <?php
    global $infinity_sticky_header;
    if ((Kirki::get_option( 'infinity', 'header_sticky_enable') || $infinity_sticky_header == 'enable')
      && $infinity_sticky_header != 'disable') { ?>
      <script>
        jQuery(document).ready(function ($) {
          var $height = $(".site-branding").outerHeight();
          $(".header").headroom({
              offset : $height
          });
        });
      </script>
  <?php } ?>

  <?php if (Kirki::get_option( 'infinity', 'enable_back_to_top')) { ?>
    <script>
      jQuery(document).ready(function ($) {
        var $window = $(window);
        // Scroll up
        var $scrollup = $('.scrollup');

        $window.scroll(function () {
          if ($window.scrollTop() > 100) {
            $scrollup.addClass('show');
          } else {
            $scrollup.removeClass('show');
          }
        });

        $scrollup.on('click', function (evt) {
          $("html, body").animate({scrollTop: 0}, 600);
          evt.preventDefault();
        });
      });
    </script>
  <?php } ?>

<?php }