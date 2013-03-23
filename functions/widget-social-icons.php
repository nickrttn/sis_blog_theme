<?php // Widget that displays social icons

class Sparrowinspace_Social_Icons_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'sparrowinspace_social_widget',
			'Custom Widget: Social Icons',
			array('description' => __('Displays a list of social icons', 'sparrowinspace-framework'))
		);
	}

	public function form($instance) {
		$defaults = array (
			'title' => __('Connect with us', 'sparrowinspace-framework'),
			'social_facebook' => 'http://facebook.com/sparrowinspace',
			'social_twitter' => 'https://twitter.com/sparrowinspace',
			'social_gplus' => 'https://plus.google.com/109417606020343176061/posts',
			'social_rss' => 'http://sparrowinspace.com/feed',
			'social_linkedin' => '',
			'social_pinterest' => '',
			'description' => __('Connect with us on our social networks.', 'sparrowinspace-framework')
		);

		$instance = wp_parse_args((array) $instance, $defaults);

		?>
		<!-- The Title -->
			<p>
				<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'sparrowinspace-framework'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>

			<!-- The Description -->
			<p>
				<label for="<?php echo $this->get_field_id('description') ?>"><?php _e('Description:', 'sparrowinspace-framework'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" value="<?php echo $instance['description']; ?>" />
			</p>

			<!-- Facebook -->
			<p>
				<label for="<?php echo $this->get_field_id('social_facebook') ?>">Facebook:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_facebook'); ?>" name="<?php echo $this->get_field_name('social_facebook'); ?>" value="<?php echo $instance['social_facebook']; ?>" />
			</p>

			<!-- Twitter -->
			<p>
				<label for="<?php echo $this->get_field_id('social_twitter') ?>">Twitter:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_twitter'); ?>" name="<?php echo $this->get_field_name('social_twitter'); ?>" value="<?php echo $instance['social_twitter']; ?>" />
			</p>

			<!-- Google+ -->
			<p>
				<label for="<?php echo $this->get_field_id('social_gplus') ?>">Google+:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_gplus'); ?>" name="<?php echo $this->get_field_name('social_gplus'); ?>" value="<?php echo $instance['social_gplus']; ?>" />
			</p>

			<!-- RSS -->
			<p>
				<label for="<?php echo $this->get_field_id('social_rss') ?>">Google+:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_rss'); ?>" name="<?php echo $this->get_field_name('social_rss'); ?>" value="<?php echo $instance['social_rss']; ?>" />
			</p>

			<!-- LinkedIn -->
			<p>
				<label for="<?php echo $this->get_field_id('social_linkedin') ?>">LinkedIn:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_linkedin'); ?>" name="<?php echo $this->get_field_name('social_linkedin'); ?>" value="<?php echo $instance['social_linkedin']; ?>" />
			</p>

			<!-- Pinterest -->
			<p>
				<label for="<?php echo $this->get_field_id('social_pinterest') ?>">Pinterest:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_pinterest'); ?>" name="<?php echo $this->get_field_name('social_pinterest'); ?>" value="<?php echo $instance['social_pinterest']; ?>" />
			</p>

<?php

	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

			// The Title
			$instance['title'] = strip_tags($new_instance['title']);
			
			// The Description
			$instance['description'] = $new_instance['description'];

			// The Social Link
			$instance['social_facebook'] = $new_instance['social_facebook'];
			$instance['social_twitter'] = $new_instance['social_twitter'];
			$instance['social_gplus'] = $new_instance['social_gplus'];
			$instance['social_rss'] = $new_instance['social_rss'];
			$instance['social_linkedin'] = $new_instance['social_linkedin'];
			$instance['social_pinterest'] = $new_instance['social_pinterest'];
			
			return $instance;
		}
		
		public function widget($args, $instance) {
			extract($args);
			
			// Get the title and prepare it for display
			$title = apply_filters('widget_title', $instance['title']);
			
			// Get the description
			$description = $instance['description'];

			// Get the social links
			$social_facebook = $instance['social_facebook'];
			$social_twitter = $instance['social_twitter'];
			$social_gplus = $instance['social_gplus'];
			$social_rss = $instance['social_rss'];
			$social_linkedin = $instance['social_linkedin'];
			$social_pinterest = $instance['social_pinterest'];
			
			echo $before_widget;
			
			if ($title) {
				echo $before_title . $title . $after_title;
			}
			
			if ($description) {
				echo '<p>' . $description . '</p>';
			}
			
			echo '<ul class="social-icons clearfix">';
			
			if ($social_facebook) : ?>
				<li><a href="<?php echo $social_facebook ?>" class="icon-facebook hide-text"></a></li>
			<?php endif;

			if ($social_twitter) : ?>
				<li><a href="<?php echo $social_twitter ?>" class="icon-twitter hide-text"></a></li>
			<?php endif;

			if ($social_gplus) : ?>
				<li><a href="<?php echo $social_gplus ?>" class="icon-google-plus hide-text"></a></li>
			<?php endif;

			if ($social_rss) : ?>
				<li><a href="<?php echo $social_rss ?>" class="icon-rss hide-text"></a></li>
			<?php endif;

			if ($social_linkedin) : ?>
				<li><a href="<?php echo $social_linkedin ?>" class="icon-linkedin hide-text"></a></li>
			<?php endif;

			if ($social_pinterest) : ?>
				<li><a href="<?php echo $social_pinterest ?>" class="icon-pinterest hide-text"></a></li>
			<?php endif;
			
			echo '</ul>';
			echo $after_widget; 
		}
	}

	register_widget('Sparrowinspace_Social_Icons_Widget');

?>