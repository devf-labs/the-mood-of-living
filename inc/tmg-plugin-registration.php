<?php
if (!function_exists('thememove_register_theme_plugins')) :
  function thememove_register_theme_plugins()
  {

    $plugins = array(
      array(
        'name'               => 'ThemeMove Core',
        'slug'               => 'thememove-core',
        'source'             => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/a69a99d8f7830fd9bb5f7fdb63088e27f9dc19b3/thememove-core.zip',
        'version'            => '1.2',
        'required'           => true,
        'force_activation'   => true,
        'force_deactivation' => true,
      ),
      array(
        'name'               => 'Visual Composer',
        'slug'               => 'js_composer',
        'source'             => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/7d99e35789198c80ee280d8a53839317d481b8e3/js_composer.zip',
        'version'            => '4.6.2',
        'required'           => true,
        'force_activation'   => false,
        'force_deactivation' => false,
      ),
      array(
        'name'               => 'Revolution Slider',
        'slug'               => 'revslider',
        'source'             => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/a69a99d8f7830fd9bb5f7fdb63088e27f9dc19b3/revslider.zip',
        'version'            => '4.6.93',
        'required'           => true,
        'force_activation'   => false,
        'force_deactivation' => false,
      ),
      array(
        'name'     				    => 'Vafpress Post Formats UI',
        'slug'     				    => 'vafpress-post-formats-ui-develop',
        'source'              => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/a69a99d8f7830fd9bb5f7fdb63088e27f9dc19b3/vafpress-post-formats-ui-develop.zip',
        'required' 				    => true,
        'version' 				    => '1.5',
        'force_activation' 	  => false,
        'force_deactivation'  => false,
      ),
      array(
        'name'               => 'Templatera',
        'slug'               => 'templatera',
        'source'             => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/a69a99d8f7830fd9bb5f7fdb63088e27f9dc19b3/templatera.zip',
        'version'            => '1.1.1',
        'required'           => true,
        'force_activation'   => false,
        'force_deactivation' => false,
      ),
      array(
        'name'     => 'NS Featured Posts',
        'slug'     => 'ns-featured-posts',
        'required' => false,
      ),
      array(
        'name'     => 'Widget Logic',
        'slug'     => 'widget-logic',
        'required' => false,
      ),
      array(
        'name'     => 'MailChimp for WordPress',
        'slug'     => 'mailchimp-for-wp',
        'required' => false,
      ),
      array(
        'name'     => 'Contact Form 7',
        'slug'     => 'contact-form-7',
        'required' => false,
      )
    );

    $config = array(
      'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
      'default_path' => '',                      // Default absolute path to pre-packaged plugins.
      'menu'         => 'tgmpa-install-plugins', // Menu slug.
      'parent_slug'  => 'themes.php',            // Parent menu slug.
      'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
      'has_notices'  => true,                    // Show admin notices or not.
      'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
      'is_automatic' => false,                   // Automatically activate plugins after installation or not.
      'message'      => '',                      // Message to output right before the plugins table.
      'strings' => array(
        'page_title'                      => __('Install Required Plugins', 'infinity'),
        'menu_title'                      => __('Install Plugins', 'infinity'),
        'installing'                      => __('Installing Plugin: %s', 'infinity'), // %s = plugin name.
        'oops'                            => __('Something went wrong with the plugin API.', 'infinity'),
        'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'infinity'), // %1$s = plugin name(s).
        'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'infinity'), // %1$s = plugin name(s).
        'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'infinity'), // %1$s = plugin name(s).
        'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'infinity'), // %1$s = plugin name(s).
        'notice_ask_to_update_maybe'      => _n_noop('There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'infinity'), // %1$s = plugin name(s).
        'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'infinity'), // %1$s = plugin name(s).
        'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'infinity'), // %1$s = plugin name(s).
        'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'infinity'), // %1$s = plugin name(s).
        'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'infinity'), // %1$s = plugin name(s).
        'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'infinity'),
        'update_link'                     => _n_noop('Begin updating plugin', 'Begin updating plugins', 'infinity'),
        'activate_link'                   => _n_noop('Begin activating plugin', 'Begin activating plugins', 'infinity'),
        'return'                          => __('Return to Required Plugins Installer', 'infinity'),
        'plugin_activated'                => __('Plugin activated successfully.', 'infinity'),
        'activated_successfully'          => __('The following plugin was activated successfully:', 'infinity'),
        'plugin_already_active'           => __('No action taken. Plugin %1$s was already active.', 'infinity'),  // %1$s = plugin name(s).
        'plugin_needs_higher_version'     => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'infinity'),  // %1$s = plugin name(s).
        'complete'                        => __('All plugins installed and activated successfully. %1$s', 'infinity'), // %s = dashboard link.
        'contact_admin'                   => __('Please contact the administrator of this site for help.', 'infinity'),
        'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
      )
    );

    tgmpa($plugins, $config);

  }

  add_action('tgmpa_register', 'thememove_register_theme_plugins');
endif;