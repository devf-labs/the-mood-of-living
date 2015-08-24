<?php
function thememove_welcome(){ ?>
  <div class="wrap about-wrap">
    <?php
      $theme = wp_get_theme();
      $name = $theme->get('Name');
      $version = $theme->get('Version');
    ?>
    <h1><?php printf(__('Welcome to %s', 'thememove'), $name . ' ' . $version); ?></h1>
    <div class="about-text woocommerce-about-text">
      <?php printf(__('Thank you for purchased the latest version! %s is powerful, stable and secure. We hope you enjoy using it.', 'thememove'), $name . ' ' . $version); ?></div>
    <div class="changelog">
      <h4><?php _e('Best Features', 'thememove'); ?></h4>
      <div class="changelog about-integrations">
        <div class="wc-feature feature-section col three-col">
          <div>
            <h4><?php _e('Live preview with Customizer', 'thememove'); ?></h4>
            <p><?php _e('You can use the Customizer to modify Appearance settings in a live preview. To access the Customizer for your current theme, you can go to ThemeMove >> Customize in your dashboard.', 'thememove'); ?></p>

          </div>
          <div>
            <h4><?php _e('One click update', 'thememove'); ?></h4>
            <p><?php _e('You can launch the update by clicking the link in the new version banner (if it\'s there) or by going to the Dashboard > Updates screen. Once you are on the "Update WordPress" page, click the button "Update Now" to start the process off. You shouldn\'t need to do anything else and, once it\'s finished, you will be up-to-date.', 'thememove'); ?></p>
          </div>
          <div class="last-feature">
            <h4><?php _e('One click demo setup', 'thememove'); ?></h4>
            <p><?php _e('Start your website with carbon copy of our demo, surly it will make a difference.', 'thememove'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
}