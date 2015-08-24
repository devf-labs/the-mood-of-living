<?php
if (!class_exists('TM_Twitter_Widget')) {

  add_action('widgets_init', 'load_thememove_twitter_widget');

  function load_thememove_twitter_widget()
  {
    register_widget('TM_Twitter_Widget');
  }
  /**
   * Twitter Widget by ThemeMove
   */
  class TM_Twitter_Widget extends WP_Widget
  {
    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
      parent::__construct(
        'tm_twitter',
        __('ThemeMove - Twitter', 'thememove'),
        array('description' => __('Latest tweets widget.', 'thememove'))
      );
    }

    function widget($args, $instance)
    {
      extract( $args );

      $title            = isset($instance['title']) ? $instance['title'] : '';
      $username         = isset($instance['username']) ? $instance['username'] : '';
      $consumer_key     = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
      $consumer_secret  = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
      $access_token     = isset($instance['access_token']) ? $instance['access_token'] : '';
      $access_secret    = isset($instance['access_secret']) ? $instance['access_secret'] : '';
      $link_new_page    = isset($instance['link_new_page']) ? $instance['link_new_page'] : '';
      $tweets_count     = isset($instance['tweets_count']) ? $instance['tweets_count'] : '2';
      $style            = isset($instance['style']) ? $instance['style'] : 'style-3';

      echo $args['before_widget'];

      $output = '<h3 class="widget-title">' . $title . '</h3>';

      $output .= '<div class="tm-twitter">';

      if (!empty($username) &&
        !empty($consumer_key) && !empty($consumer_secret) &&
        !empty($access_token) && !empty($access_secret)) {
        $data = $this->get_data($instance);
        if( $data != false ) {
          $output .= '<ul class="tm-tweets-list ' . $style . '">';
          foreach( $data as $index => $tweet ) {
            if( $index >= $tweets_count ) {
              break;
            }

            if( 'on' == $link_new_page) {
              $tweet->text = preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a target="_blank" href="\\1">\\1</a>', $tweet->text);
              $tweet->text = preg_replace('/\B@([_a-z0-9]+)/i', '<a target="_blank" href="http://twitter.com/\\1">@\\1</a>', $tweet->text);
            }
            else {
              $tweet->text = preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a href="\\1">\\1</a>', $tweet->text);
              $tweet->text = preg_replace('/\B@([_a-z0-9]+)/i', '<a href="http://twitter.com/\\1">@\\1</a>', $tweet->text);
            }
            $output .= $this->get_li( $tweet, $instance );

          }
          $output .= '</ul>';
        }
      }

      $output .= '</div>';

      echo $output;

      echo $args['after_widget'];
    }

    function form($instance) {
      $title            = isset($instance['title']) ? $instance['title'] : '';
      $username         = isset($instance['username']) ? $instance['username'] : '';
      $style            = isset($instance['style']) ? $instance['style'] : 'style-3';
      $consumer_key     = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
      $consumer_secret  = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
      $access_token     = isset($instance['access_token']) ? $instance['access_token'] : '';
      $access_secret    = isset($instance['access_secret']) ? $instance['access_secret'] : '';
      $link_new_page    = isset($instance['link_new_page']) ? $instance['link_new_page'] : '';
      $tweets_count     = isset($instance['tweets_count']) ? $instance['tweets_count'] : '2';
      $show_buttons     = isset($instance['show_buttons']) ? $instance['show_buttons'] : '';
      ?>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title', 'thememove') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
          name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php _e('User Name', 'thememove') ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id('username')); ?>"
               name="<?php echo esc_attr($this->get_field_name('username')); ?>" value="<?php echo esc_attr($username); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php _e('Select Style', 'thememove'); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id('style')); ?>"
                name="<?php echo esc_attr($this->get_field_name('style')); ?>">
          <option value="style-1" <?php echo esc_attr($style == 'style-1' ? 'selected="true"' : ''); ?>><?php _e('Avatar Image Float Left', 'thememove'); ?></option>
          <option value="style-2" <?php echo esc_attr($style == 'style-2' ? 'selected="true"' : ''); ?>><?php  _e('Align Center', 'thememove'); ?></option>
          <option value="style-3" <?php echo esc_attr($style == 'style-3' ? 'selected="true"' : ''); ?>><?php _e('Only text (without avatar image)', 'thememove'); ?></option>
        </select>
      </p>
      <?php _e('
      <p class="help">
        You need to authenticate yourself to Twitter with creating an app for get access information to retrieve your tweets and display them on your page
      </p>
      <ol>
        <li>Go to <a href="http://goo.gl/tyCR5W" target="_blank">https://apps.twitter.com/app/new</a> and log in, if necessary</li>
        <li>Enter your Application Name, Description and your website address. You can leave the callback URL empty.</li>
        <li>Submit the form by clicking the Create your Twitter Application</li>
        <li>Go to the "Keys and Access Token" tab and copy the consumer key (API key) and consumer secret</li>
        <li>Paste them in the following input boxes</li>
        <li>Click on the "Create my access token" in bottom of page for creating access token and copy them</li>
        <li>Paste them in the following input boxes</li>
      </ol>
      ', 'thememove'); ?>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>"><?php _e('Consumer Key (API Key)', 'thememove') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>"
               name="<?php echo esc_attr($this->get_field_name('consumer_key')); ?>" value="<?php echo esc_attr($consumer_key); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>"><?php _e('Consumer Secret (API Secret)', 'thememove') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>"
               name="<?php echo esc_attr($this->get_field_name('consumer_secret')); ?>" value="<?php echo esc_attr($consumer_secret); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('access_token')); ?>"><?php _e('Access Token', 'thememove') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('access_token')); ?>"
               name="<?php echo esc_attr($this->get_field_name('access_token')); ?>" value="<?php echo esc_attr($access_token); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id('access_secret')); ?>"><?php _e('Access Token Secret', 'thememove') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('access_secret')); ?>"
               name="<?php echo esc_attr($this->get_field_name('access_secret')); ?>" value="<?php echo esc_attr($access_secret); ?>"/>
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('show_buttons')); ?>" name="<?php echo esc_attr($this->get_field_name('show_buttons')); ?>" <?php checked($show_buttons, 'on'); ?> />
        <label for="<?php echo esc_attr($this->get_field_id('show_buttons')); ?>"><?php _e('Show Twitter Buttons?', 'thememove') ?></label>
      </p>
      <p class="help"><?php echo _e('Show Reply, Retweet and Favorite buttons', 'thememove'); ?></p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('tweets_count')); ?>"><?php _e('Number of Tweets', 'thememove') ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id('tweets_count')); ?>"
               name="<?php echo esc_attr( $this->get_field_name('tweets_count') ); ?>" value="<?php echo esc_attr(esc_attr($tweets_count)); ?>" size="3"/>
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('link_new_page')); ?>" name="<?php echo esc_attr($this->get_field_name('link_new_page') ); ?>" <?php checked($link_new_page, 'on'); ?> />
        <label for="<?php echo esc_attr($this->get_field_id('link_new_page')); ?>"><?php _e('Open Tweet Links in New Page', 'thememove') ?></label>
      </p>
    <?php
    }

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
    function get_data($atts)
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
     * @param $tweet
     * @param $atts
     * @return string
     */
    function get_li($tweet, $atts)
    {

      $html = '<li class="tweet">';

      switch ($atts['style']) {

        case 'style-1':
        case 'style-2':

          $html .= '<div class="tweet-header">';
          $html .= '<img class="user-profile-image" src="' . $tweet->user->profile_image_url . '">';
          $html .= '<a class="username"' . (isset($atts['link_new_page'])  && 'on' == $atts['link_new_page'] ? 'target="_blank"' : '') . ' href="http://twitter.com/' . $tweet->user->screen_name . '">';
          $html .= '<span class="user-name">@' . $tweet->user->name . '</span></a>';
          $html .= '<span class="time"><i class="fa fa-clock-o"></i>' . date('M d Y', strtotime($tweet->created_at)) . '</span></a>';
          $html .= '</div>';
          $html .= '<p class="tweet-text" >' . $tweet->text . '</p>';
          $html .= '';

          break;

        case 'style-3':
        default:

          $html .= '<a class="username"' . (isset($atts['link_new_page'])  && 'on' == $atts['link_new_page'] ? 'target="_blank"' : '') . ' href="http://twitter.com/' . $tweet->user->screen_name . '">';
          $html .= '<span class="username">@' . $tweet->user->name . '</span></a>';
          $html .= '<p class="tweet-text" >' . $tweet->text . '</p>';
          $html .= '<span class="time"><i class="fa fa-clock-o"></i>' . date('M d Y', strtotime($tweet->created_at)) . '</span>';

          break;
      }

      if(isset($atts['show_buttons']) && 'on' == $atts['show_buttons']) {
        $html .= '<ul class="tweet-actions">';
        $html .= '<li class="action replay"><a href="https://twitter.com/intent/tweet?in_reply_to=' . $tweet->id_str . '" onclick="window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600\');return false" title="'.__('Reply', 'thememove').'"><i class="fa fa-mail-reply"></i> ' . __('reply', 'thememove') . '</a></li>';
        $html .= '<li class="action retweet"><a href="https://twitter.com/intent/retweet?tweet_id=' . $tweet->id_str . '" onclick="window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600\');return false" title="'.__('Retweet', 'thememove').'"><i class="fa fa-retweet"></i> ' . __('retweet', 'thememove') . '</a></li>';
        $html .= '<li class="action favorite"><a href="https://twitter.com/intent/favorite?tweet_id=' . $tweet->id_str . '" onclick="window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600\');return false" title="'.__('Favorite', 'thememove').'"><i class="fa fa-star"></i> ' . __('favorite', 'thememove') . '</a></li>';
        $html .= '</ul>';
      }
      $html .= '</li>';
      return $html;
    }
  } // end class
} // end if