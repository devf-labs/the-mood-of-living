<?php

/**
 * Class ThemeMove_Social_Links
 * @property mixed data
 * @package ThemeMove
 */
Class ThemeMove_Social_Links {
  private $settings = array();

  private $value = '';

  private $social_networks = array();

  /**
   * @param $settings
   * @param $value
   */
  public function __construct($settings, $value) {
    $this->settings = $settings;
    $this->value = $value;

    $this->social_networks = array(
      'behance' => __('Behance', 'thememove'),
      'bitbucket' => __('Bitbucket', 'thememove'),
      'codepen' => __('Codepen', 'thememove'),
      'dashcube' => __('Dashcube', 'thememove'),
      'delicious' => __('Delicious', 'thememove'),
      'deviantart' => __('DeviantArt', 'thememove'),
      'digg' => __('Digg', 'thememove'),
      'dribbble' => __('Dribbble', 'thememove'),
      'facebook' => __('Facebook', 'thememove'),
      'flickr' => __('Flickr', 'thememove'),
      'foursquare' => __('Foursquare', 'thememove'),
      'github' => __('Github', 'thememove'),
      'google-plus' => __('Google+', 'thememove'),
      'instagram' => __('Instagram', 'thememove'),
      'linkedin' => __('Linkedin', 'thememove'),
      'pinterest' => __('Pinterest', 'thememove'),
      'qq' => __('QQ', 'thememove'),
      'rss' => __('RSS', 'thememove'),
      'reddit' => __('Reddit', 'thememove'),
      'skype' => __('Skype', 'thememove'),
      'slack' => __('Slack', 'thememove'),
      'soundcloud' => __('Soundcloud', 'thememove'),
      'stumbleupon' => __('StumbleUpon', 'thememove'),
      'tumblr' => __('Tumblr', 'thememove'),
      'twitch' => __('Twitch', 'thememove'),
      'twitter' => __('Twitter', 'thememove'),
      'vine' => __('Vine', 'thememove'),
      'weibo' => __('Weibo', 'thememove'),
      'whatsapp' => __('WhatsApp', 'thememove'),
      'yahoo' => __('Yahoo', 'thememove'),
      'youtube-play' => __('Youtube', 'thememove'),
    );
  }

  /**
   * @return array
   */
  private function getData() {
    $data = preg_split( '/\s+/', $this->value);
    $data_arr = array();

    foreach($data as $d) {
      $pieces = explode('|', $d);
      if(count($pieces) == 2) {
        $key = $pieces[0];
        $link = $pieces[1];
        $data_arr[$key] = $link;
      }
    }

    return $data_arr;
  }

  private function getLink($key) {
    $link_arr = $this->getData();
    foreach($link_arr as $key1 => $link) {
      if($key == $key1) {
        return $link;
      }
    }
    return '';
  }

  /**
   * Render HTML
   * @return string
   */
  public function render() {
    $html = '';
    $html .= '<div class="tm_social_links" data-social-links="true">
              <input name="' . esc_attr( $this->settings['param_name'] ) . '" class="wpb_vc_param_value ' .
      esc_attr( $this->settings['param_name'] ) . ' ' . esc_attr( $this->settings['type'] ) .
      '_field" type="hidden" value="' . esc_attr( $this->value ) . '"/>
             <table class="vc_table tm_table tm_social-links-table">
              <tr data-social="">
                <th>' . __('Social Network', 'thememove') . '</th>
                <th>' . __('Link', 'thememove') . '</th>
              </tr>
            ';
    foreach ( $this->social_networks as $key => $social ) {
      $html .= '
        <tr data-social="' . $key . '">
          <td class="tm_social tm_social--' . $key . '">
            <label>
            <span><i class="fa fa-' . $key . '"></i>' . $social . '</span>
            </label>
          </td>
          <td><input type="text" name="' . $key . '" class="social_links_field" value="' . $this->getLink($key)  . '' . '"></td>
        </tr>
      ';
    }
    return $html;
  }
}

/**
 * Register params
 * @param $settings
 * @param $value
 * @return string
 */
function thememove_social_links_settings_field( $settings, $value ) {
  $social_links = new ThemeMove_Social_Links($settings, $value);

  return $social_links->render();
}
vc_add_shortcode_param( 'social_links', 'thememove_social_links_settings_field', get_template_directory_uri() . '/inc/vc-params/thememove-social-links/thememove_social_links.js');