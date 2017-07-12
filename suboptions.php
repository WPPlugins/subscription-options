<?php

/**
 * Plugin Name: Subscription Options
 * Plugin URI: http://digitalcortex.net/plugins/subscription-options
 * Description: Adds subscription option icons for your RSS Feed; your FeedBurner Email Service; your Twitter Stream and even your Facebook page. Thousands of colour options. Totally user-defined. Also available: <a title="Upgrade for only $1.50" target="_blank" href="http://digitalcortex.net/plugins/subscription-options/addon-pack">The Subscription Options Add-on Pack</a>!
 * Version: 0.8.5
 * Author: Tom Saunter
 * Author URI: http://digitalcortex.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
/**
 * Add functions that will load the widget.
 */
add_action( 'widgets_init', 'suboptions_load_widgets' );

/**
 * Register the widget.
 * 'suboptions_widget' is the widget class used below.
 */
function suboptions_load_widgets() {
	register_widget( 'suboptions_widget' );
}

/**
 * Extends the widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update. Nice!
 */
class suboptions_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function suboptions_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'suboptions', 'description' => __('Add subscription options for your readers with related feed icons', 'suboptions') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'suboptions-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'suboptions-widget', __('Subscription Options', 'suboptions'), $widget_ops, $control_ops );
	}
	
	/**
	 * Display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Variables for the standard widget. */
		$title = apply_filters('widget_title', $instance['title'] );
		$size = $instance['size'];
		$rss_url = $instance['rss_url'];
		$rss_col = $instance['rss_col'];
		$email_url = $instance['email_url'];
		$email_col = $instance['email_col'];
		$twitter_url = $instance['twitter_url'];
		$twitter_col = $instance['twitter_col'];
		$facebook_url = $instance['facebook_url'];
		$facebook_col = $instance['facebook_col'];

		/* Variables for the add-on pack. */
		$linkedin_url = $instance['linkedin_url'];
		$linkedin_col = $instance['linkedin_col'];
		$flickr_url = $instance['flickr_url'];
		$flickr_col = $instance['flickr_col'];
		$google_url = $instance['google_url'];
		$google_col = $instance['google_col'];
		$podcast_url = $instance['podcast_url'];
		$podcast_col = $instance['podcast_col'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* If an RSS Feed URL was entered, display the RSS icon. */			
		if ( $rss_url )
			echo '<a target="_blank" title="Subscribe via RSS" href="'.$rss_url.'"><img class="suboptions-icon rounded-corners rss-icon" alt="Subscribe via RSS" style="background: '.$rss_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options/images/rss_transparent.png"/> </a>';
				
		/* If a FeedBurner Email Service URL was entered, display the email icon. */			
		if ( $email_url )
			echo '<a target="_blank" title="Subscribe via Email" href="'.$email_url.'"><img class="suboptions-icon rounded-corners email-icon" alt="Subscribe via Email" style="background: '.$email_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options/images/email_transparent.png"/> </a>';
			
		/* If a Twitter Stream URL was entered, display the Twitter icon. */			
		if ( $twitter_url )
			echo '<a target="_blank" title="Subscribe via Twitter" href="'.$twitter_url.'"><img class="suboptions-icon rounded-corners twitter-icon" alt="Subscribe via Twitter" style="background: '.$twitter_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options/images/twitter_transparent.png"/> </a>';
			
		/* If a Facebook Page URL was entered, display the Facebook icon. */			
		if ( $facebook_url )
			echo '<a target="_blank" title="Subscribe via Facebook" href="'.$facebook_url.'"><img class="suboptions-icon rounded-corners facebook-icon" alt="Subscribe via Facebook" style="background: '.$facebook_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options/images/facebook_transparent.png"/> </a>';
		
		/* If a LinkedIn Profile URL was entered, display the LinkedIn icon. */			
		if ( $linkedin_url )
			echo '<a target="_blank" title="Subscribe via LinkedIn" href="'.$linkedin_url.'"><img class="suboptions-icon rounded-corners linkedin_icon" alt="Subscribe via LinkedIn" style="background: '.$linkedin_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options-addon/linkedin_transparent.png"/> </a>';

		/* If a Flickr Page URL was entered, display the Flickr icon. */			
		if ( $flickr_url )
			echo '<a target="_blank" title="Subscribe via Flickr" href="'.$flickr_url.'"><img class="suboptions-icon rounded-corners flickr_icon" alt="Subscribe via Flickr" style="background: '.$flickr_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options-addon/flickr_transparent.png"/> </a>';

		/* If a Google+ URL was entered, display the Google+ icon. */			
		if ( $google_url )
			echo '<a target="_blank" title="Subscribe via Google+" href="'.$google_url.'"><img class="suboptions-icon rounded-corners google_icon" alt="Subscribe via Google+" style="background: '.$google_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options-addon/google_transparent.png"/> </a>';

		/* If a Podcasting Service URL was entered, display the Podcast icon. */			
		if ( $podcast_url )
			echo '<a target="_blank" title="Subscribe via Podcast" href="'.$podcast_url.'"><img class="suboptions-icon rounded-corners podcast_icon" alt="Subscribe via Podcast" style="background: '.$podcast_col.'; width: '.$size.'px; height: '.$size.'px; " src="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/subscription-options-addon/podcast_transparent.png"/> </a>';
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip HTML tags for the standard widget: */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['size'] = strip_tags( $new_instance['size'] );
		$instance['rss_url'] = strip_tags( $new_instance['rss_url'] );
		$instance['rss_col'] = strip_tags( $new_instance['rss_col'] );
		$instance['email_url'] = strip_tags( $new_instance['email_url'] );
		$instance['email_col'] = strip_tags( $new_instance['email_col'] );
		$instance['twitter_url'] = strip_tags( $new_instance['twitter_url'] );
		$instance['twitter_col'] = strip_tags( $new_instance['twitter_col'] );
		$instance['facebook_url'] = strip_tags( $new_instance['facebook_url'] );
		$instance['facebook_col'] = strip_tags( $new_instance['facebook_col'] );
		
		/* Strip HTML tags for the add-on pack: */
		$instance['linkedin_url'] = strip_tags( $new_instance['linkedin_url'] );
		$instance['linkedin_col'] = strip_tags( $new_instance['linkedin_col'] );
		$instance['flickr_url'] = strip_tags( $new_instance['flickr_url'] );
		$instance['flickr_col'] = strip_tags( $new_instance['flickr_col'] );
		$instance['google_url'] = strip_tags( $new_instance['google_url'] );
		$instance['google_col'] = strip_tags( $new_instance['google_col'] );
		$instance['podcast_url'] = strip_tags( $new_instance['podcast_url'] );
		$instance['podcast_col'] = strip_tags( $new_instance['podcast_col'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Makes use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		$defaults = array(
		
			/* Set up some default standard widget settings. */
			'title' => 'Subscription Options:',
			'size' => '70',
			'rss_url' => '',
			'rss_col' => '#FF9831',
			'email_url' => '',
			'email_col' => '#7AFD32',
			'twitter_url' => '',
			'twitter_col' => '#309AFE',
			'facebook_url' => '',
			'facebook_col' => '#FF005D',
			
			/* Set up some default add-on pack settings. */
			'linkedin_url' => '',
			'linkedin_col' => '#2680AA',
			'flickr_url' => '',
			'flickr_col' => '#FF0084',
			'google_url' => '',
			'google_col' => '#555555',
			'podcast_url' => '',
			'podcast_col' => '#B474E6',

          );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input class="suboptions-title" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- RSS Feed URL & Colour: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'rss_url' ); ?>"><?php _e('RSS Feed URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'rss_url' ); ?>" name="<?php echo $this->get_field_name( 'rss_url' ); ?>" value="<?php echo $instance['rss_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'rss_col' ); ?>" name="<?php echo $this->get_field_name( 'rss_col' ); ?>" value="<?php echo $instance['rss_col']; ?>" />
		</p>

		<!-- FeedBurner Email Service URL & Colour Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'email_url' ); ?>"><?php _e('FeedBurner Email Service URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'email_url' ); ?>" name="<?php echo $this->get_field_name( 'email_url' ); ?>" value="<?php echo $instance['email_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'email_col' ); ?>" name="<?php echo $this->get_field_name( 'email_col' ); ?>" value="<?php echo $instance['email_col']; ?>" />
		</p>
		
		<!-- Twitter Stream URL & Colour: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php _e('Twitter Stream URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" value="<?php echo $instance['twitter_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'twitter_col' ); ?>" name="<?php echo $this->get_field_name( 'twitter_col' ); ?>" value="<?php echo $instance['twitter_col']; ?>" />
		</p>
		
		<!-- Facebook Page URL & Colour: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e('Facebook Page URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" value="<?php echo $instance['facebook_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'facebook_col' ); ?>" name="<?php echo $this->get_field_name( 'facebook_col' ); ?>" value="<?php echo $instance['facebook_col']; ?>" />	
		</p>
		
		<!-- Decides to render Add-on Pack settings, if Add-on Pack is installed -->
		<?php
		if (function_exists('suboptions_addon')) {
		echo '<div id="suboptions-addon" class="suboptions-installed">';
		} else {
		echo '<p>Need more icons? Install the <a title="Install the Subscription Options Add-on Pack for $1.50" target="_blank" href="http://digitalcortex.net/plugins/subscription-options/addon-pack">Add-on Pack</a>!</p>';
		echo '<div id="suboptions-addon" class="suboptions-not-installed">';
		}
		?>
		
		<!-- Add-on Pack: LinkedIn Profile URL & Colour: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>"><?php _e('LinkedIn Profile URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" value="<?php echo $instance['linkedin_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'linkedin_col' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_col' ); ?>" value="<?php echo $instance['linkedin_col']; ?>" />
		</p>

		<!-- Add-on Pack: Flickr Page URL & Colour Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'flickr_url' ); ?>"><?php _e('Flickr Page URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'flickr_url' ); ?>" name="<?php echo $this->get_field_name( 'flickr_url' ); ?>" value="<?php echo $instance['flickr_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'flickr_col' ); ?>" name="<?php echo $this->get_field_name( 'flickr_col' ); ?>" value="<?php echo $instance['flickr_col']; ?>" />
		</p>

		<!-- Add-on Pack: Google+ URL & Colour: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'google_url' ); ?>"><?php _e('Google Plus URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'google_url' ); ?>" name="<?php echo $this->get_field_name( 'google_url' ); ?>" value="<?php echo $instance['google_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'google_col' ); ?>" name="<?php echo $this->get_field_name( 'google_col' ); ?>" value="<?php echo $instance['google_col']; ?>" />
		</p>

		<!-- Add-on Pack: Podcasting Service URL & Colour: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'podcast_url' ); ?>"><?php _e('Podcasting Service URL & Colour:', 'suboptions'); ?></label>
			<input class="suboptions-url" id="<?php echo $this->get_field_id( 'podcast_url' ); ?>" name="<?php echo $this->get_field_name( 'podcast_url' ); ?>" value="<?php echo $instance['podcast_url']; ?>" /><input class="suboptions-colour" id="<?php echo $this->get_field_id( 'podcast_col' ); ?>" name="<?php echo $this->get_field_name( 'podcast_col' ); ?>" value="<?php echo $instance['podcast_col']; ?>" />
		</p>
		</div>
		
		<!-- Icon Size: Text Input -->
		<p class="suboptions-item">
			<label class="suboptions-label" for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e('Icon Size:', 'suboptions'); ?></label><input class="suboptions-size" id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" value="<?php echo $instance['size']; ?>" style="width:30px; " /><?php _e(' pixels', 'suboptions'); ?>	
		</p>
		
	<?php
	
	}
}

/*
* Add a bit of style.
*/
function suboptions_style() {
	$siteurl = get_option('wpurl');
	$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/suboptions.css';
	echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action( 'wp_head', 'suboptions_style' );
add_action( 'admin_head', 'suboptions_style' );

?>