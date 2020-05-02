<?php
if ( ! class_exists( 'EPCL_tweets' ) ) {
	class epcl_tweets extends WP_Widget{

		function __construct(){
			$widget_ops = array('description' => esc_html__('Display recent tweets.', 'epcl_framework'));
			parent::__construct( false, esc_html__('(EP) Recent Tweets', 'epcl_framework'), $widget_ops);
		}

		function widget($args, $instance){
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			echo $before_widget;
				if($title) echo $before_title.$title.$after_title;
				if(!$instance['number']) $instance['number'] = 3;
				require_once(EPCL_PLUGIN_PATH.'/twitter_api/Creare_Twitter.php');

				$twitter = new Creare_Twitter();
				$twitter->screen_name = $instance['twitter_id'];
				$twitter->not = $instance['number'];

				$twitter->consumerkey = "dyEuG6BOYswj3PrgQzjqhg";
				$twitter->consumersecret = "aoDkmSI4dsUO6RVYP1GePg9e6uNQGedwPEsKwEFdAfA";
				$twitter->accesstoken = "487893934-bznK1m7TvMbiqLfDean2Sm32kSgAx93cwIM84nFV";
				$twitter->accesstokensecret = "cjZuusCesU2BHPWEJaeeZUfrcFmVwSYOLaxX47bedQ";
				$tweets = $twitter->getLatestTweets();

				foreach($tweets as $t) echo '<p class="border-effect"><i class="fa fa-twitter"></i>'.$t['tweet'].'<br><small>'.$t['time'].'</small></p>';

			echo $after_widget;
		}

		function update($new_instance, $old_instance){
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = (int) $new_instance['number'];
			$instance['twitter_id'] = $new_instance['twitter_id'];
			return $instance;
		}

		function form($instance){
			$defaults = array(
				'title' => 'Recent Tweets',
				'number' => 3,
				'twitter_id' => ''
			);
			$instance = wp_parse_args((array)$instance, $defaults);
			$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php esc_html_e('Title:', 'epcl_framework'); ?>
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of tweets to show:', 'epcl_framework'); ?></label>
				<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('twitter_id'); ?>">
					<?php esc_html_e('Twitter ID: (without @)', 'epcl_framework'); ?>
					<input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo $instance['twitter_id']; ?>" />
				</label>
			</p>
			<?php
		}

	}
}

function epcl_register_tweets() {
	register_widget('epcl_tweets');
}

add_action('widgets_init', 'epcl_register_tweets');
