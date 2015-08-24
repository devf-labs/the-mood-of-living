<?php
/**
 * ThemeMove Twitter Shortcode
 * @version 1.0
 * @package ThemeMove
 */

class WPBakeryShortCode_Thememove_Twitter extends WPBakeryShortCode
{
  /**
   * Retrieve twitter fresh data
   *
   * @param $atts
   * @return array|bool
   */
  function get_twitter_data($atts)
  {

    if (!class_exists('OAuthToken')) {
      require_once get_template_directory() . '/inc/oauth/oauth.php';
    }
    require_once get_template_directory() . '/inc/oauth/twitter-oauth.php';

    $twitterConnection = new TwitterOAuth (
      $atts['consumer_key'],
      $atts['consumer_secret'],
      $atts['access_token'],
      $atts['access_secret']
    );

    $data = $twitterConnection->get('statuses/user_timeline', array(
      'screen_name' => $atts['username'],
      'count' => $atts['tweets_count'],
      'exclude_replies' => false
    ));

    if ($twitterConnection->http_code === 200) {
      return $data;
    }

    return false;
  }

  /**
   * Wrapper ro getting twitter data with cache mechanism
   *
   * @param $atts
   * @return array|bool|mixed|void
   */
  public function get_data($atts)
  {

    $data_store = 'tm-tww-' . $atts['username'];
    $back_store = 'tm-tww-bk-' . $atts['username'];

    $cache_time = 60 * 10;

    if (($data = get_transient($data_store)) === false) {

      $data = $this->get_twitter_data($atts);

      if ($data) {

        // save a transient to expire in $cache_time and a permanent backup option ( fallback )
        set_transient($data_store, $data, $cache_time);
        update_option($back_store, $data);

      } // fall to permanent backup store
      else {
        $data = get_option($back_store);
      }
    }

    return $data;
  }

  /**
   * Generates HTML code for each Tweet
   *
   * @param $tweet
   * @param $atts
   */
  function get_li($tweet, $atts)
  {

    echo '<li class="tweet">';
    $html = '';

    switch ($atts['style']) {

      case 'style-1':
      case 'style-2':

        $html .= '<div class="tweet-header">';
        $html .= '<img class="user-profile-image" src="' . $tweet->user->profile_image_url . '">';
        $html .= '<a class="username"' . ($atts['link_new_page'] == 1 ? 'target="_blank"' : 'target="_self"') . ' href="http://twitter.com/' . $tweet->user->screen_name . '">';
        $html .= '<span class="user-name">@' . $tweet->user->name . '</span></a>';
        $html .= '<span class="time"><i class="fa fa-clock-o"></i>' . date('M d Y', strtotime($tweet->created_at)) . '</span></a>';
        $html .= '</div>';
        $html .= '<p class="tweet-text" >' . $tweet->text . '</p>';
        $html .= '';

        break;

      case 'style-3':
      default:

        $html .= '<a class="username"' . ($atts['link_new_page'] == 1 ? 'target="_blank"' : 'target="_self"') . ' href="http://twitter.com/' . $tweet->user->screen_name . '">';
        $html .= '<span class="username">@' . $tweet->user->name . '</span></a>';
        $html .= '<p class="tweet-text" >' . $tweet->text . '</p>';
        $html .= '<span class="time"><i class="fa fa-clock-o"></i>' . date('M d Y', strtotime($tweet->created_at)) . '</span>';

        break;
    }

    if(1 == $atts['show_buttons']) {
      $html .= '<ul class="tweet-actions">';
      $html .= '<li class="action replay"><a href="https://twitter.com/intent/tweet?in_reply_to=' . $tweet->id_str . '" onclick="window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600\');return false" title="'.__('Reply', 'thememove').'"><i class="fa fa-mail-reply"></i> ' . __('reply', 'thememove') . '</a></li>';
      $html .= '<li class="action retweet"><a href="https://twitter.com/intent/retweet?tweet_id=' . $tweet->id_str . '" onclick="window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600\');return false" title="'.__('Retweet', 'thememove').'"><i class="fa fa-retweet"></i> ' . __('retweet', 'thememove') . '</a></li>';
      $html .= '<li class="action favorite"><a href="https://twitter.com/intent/favorite?tweet_id=' . $tweet->id_str . '" onclick="window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600\');return false" title="'.__('Favorite', 'thememove').'"><i class="fa fa-star"></i> ' . __('favorite', 'thememove') . '</a></li>';
      $html .= '</ul>';
    }
    echo $html;
    echo '</li>';
  }
}

// Mapping shortcode
vc_map(array(
  'name' => __('Twitter', 'thememove'),
  'base' => 'thememove_twitter',
  'description' => __('Latest tweets widget', 'thememove'),
  'category' => __('by THEMEMOVE', 'thememove'),
  'params' => array(
    array(
      'type' => 'textfield',
      'admin_label' => true,
      'heading' => __('Twitter Username', 'thememove'),
      'param_name' => 'username',
      'value' => '',
      'description' => __('
<p>You need to authenticate yourself to Twitter with creating an app for get access information to retrieve your tweets and display them on your page.</p><ol>
    <li>Go to <a href="http://goo.gl/tyCR5W" target="_blank">https://apps.twitter.com/app/new</a> and log in, if necessary</li>
    <li>Enter your Application Name, Description and your website address. You can leave the callback URL empty.</li>
    <li>Submit the form by clicking the Create your Twitter Application</li>
    <li>Go to the "Keys and Access Token" tab and copy the consumer key (API key) and consumer secret</li>
    <li>Paste them in the following input boxes</li>
    <li>Click on the "Create my access token" in bottom of page for creating access token and copy them</li>
    <li>Paste them in the following input boxes</li>
  </ol>
  ', 'thememove'),
    ),
    array(
      'type'          => 'dropdown',
      'heading'       => __( 'Style', 'thememove' ),
      'param_name'    => 'style',
      'admin_label'   => true,
      'value'       => array(
        'Avatar Image Float Left'           => 'style-1',
        'Align Center'                      => 'style-2',
        'Only text (without avatar image)'  => 'style-3',
      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Consumer Key (API Key)', 'thememove'),
      'param_name' => 'consumer_key',
      'value' => '',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Consumer Secret (API Secret)', 'thememove'),
      'param_name' => 'consumer_secret',
      'value' => '',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Access Token', 'thememove'),
      'param_name' => 'access_token',
      'value' => '',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Access Token Secret', 'thememove'),
      'param_name' => 'access_secret',
      'value' => '',
    ),
    array(
      'type' => 'checkbox',
      'param_name' => 'show_buttons',
      'description' => __('Show Reply, Retweet and Favorite buttons', 'thememove'),
      'value' => array (
        __('Show Twitter Buttons?', 'thememove') => true,
      ),
    ),
    array(
      'type' => 'textfield',
      'admin_label' => true,
      'heading' => __('Number of Tweets', 'thememove'),
      'param_name' => 'tweets_count',
      'value' => '2',
    ),
    array(
      'type' => 'checkbox',
      'param_name' => 'link_new_page',
      'value' => array(
        __('Open Tweet Links in New Window', 'thememove') => true,
      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Extra class name', 'thememove'),
      'param_name' => 'el_class',
      'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememove'),
    ),
  )
));