<?php

// Define constants
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/images');



// Include Javascript Files
function load_custom_scripts(){
	wp_enqueue_script('custom_script', THEMEROOT.'/js/scripts.js', array('jquery'), false, true);
	wp_enqueue_script('fitvids_script', THEMEROOT.'/js/jquery.fitvids.min.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'load_custom_scripts');



// Set the max width of the uploaded media
if (!isset($content_width)) $content_width = 600;


// Add Theme Support for Automatic Feed Links
function sparrowinspace_custom_feeds(){
	add_theme_support( 'automatic-feed-links' );
}

add_action('after_setup_theme', 'sparrowinspace_custom_feeds');


// Menus
function register_my_menus(){
	register_nav_menus(
		array(
			'top-menu-left' 	=> __('Top Menu Left', 'sparrowinspace-framework'),
			'top-menu-right'	=> __('Top Menu Right', 'sparrowinspace-framework'),
			'main-menu'			=> __('Main Menu', 'sparrowinspace-framework')
	));
}

add_action('init', 'register_my_menus');



// Sidebars
if(function_exists('register_sidebar')){
	register_sidebar(
		array(
			'name' 			=> __('Main Sidebar', 'sparrowinspace-framework'),
			'id'			=> 'main-sidebar',
			'description'	=> __('The main sidebar area', 'sparrowinspace-framework'),
			'before_widget'	=> '<div class="sidebar-widget">',
			'after_widget'	=> '</div> <!-- end sidebar-widget -->',
			'before_title'	=> '<h4>',
			'after_title'	=> '</h4>'
	));

	register_sidebar(
		array(
			'name' 			=> __('Footer', 'sparrowinspace-framework'),
			'id'			=> 'footer',
			'description'	=> __('The footer area, holds 4 widgets.', 'sparrowinspace-framework'),
			'before_widget'	=> '<div class="footer-widget span3">',
			'after_widget'	=> '</div> <!-- end footer-widget -->',
			'before_title'	=> '<h4>',
			'after_title'	=> '</h4>'
	));
}



// Theme Support for Post Formats/Post Thumbnails
if(function_exists('add_theme_support')){
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));
	add_theme_support('post-thumbnails', array('post'));
	set_post_thumbnail_size(600, 220, true);
	add_image_size('custom-blog-image', 600, 800);
}



// Localization
function custom_theme_localization() {
	$lang_dir = THEMEROOT . '/lang';
	load_theme_textdomain('sparrowinspace-framework', $lang_dir);
}

add_action('after_theme_setup', 'custom_theme_localization');



// Function to display comments
function sparrowinspace_comments($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;

	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>

		<li class="pingback" id="comment-<?php comment_ID(); ?>" >
			<article <?php comment_class(); ?>>
				<header class="clearfix">
					<h5><?php _e('Pingback:', 'sparrowinspace-framework'); ?></h5>
					<span><?php edit_comment_link(); ?></span>
				</header>

				<p><?php comment_author_link(); ?></p>

			</article>

	<?php elseif (get_comment_type() == 'comment') : ?>

		<li id="comment-<?php comment_ID(); ?>">
			<article <?php comment_class(); ?>>

				<header class="clearfix">

					<figure class="comment-avatar">
						<?php
						$avatar_size = 80;
						if ($comment->comment_parent != 0) {
						 	$avatar_size = 64;
						 }
						 echo get_avatar($comment, $avatar_size);
						?>
					</figure>			

					<h5><?php comment_author_link(); ?></h5>

					<span><?php _e('on', 'sparrowinspace-framework'); ?> <?php comment_date($d='j F, Y'); ?> <?php _e('at', 'sparrowinspace-framework'); ?> <?php comment_time(); ?> - <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
				
				</header>

				<?php if($comment->comment_approved == '0') : ?>
					<p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'sparrowinspace-framework'); ?></p>
				<?php endif; ?>

				<?php comment_text(); ?>
			</article>

	<?php endif; } 



// Custom Comments Form
function sparrowinspace_custom_comment_form($defaults){
	$defaults['comment_notes_before'] = '';
	$defaults['id_form'] = 'comment-form';
	$defaults['title_reply'] = __('Leave a Reply', 'sparrowinspace-framework');
	$defaults['title_reply_to'] = __( 'Leave a Reply to %s', 'sparrowinspace-framework' );
	$defaults['comment_field'] = '<p><textarea name="comment" id="comment" cols="30" rows="10"></textarea></p>';
	return $defaults;
}

add_filter( 'comment_form_defaults', 'sparrowinspace_custom_comment_form' );

function sparrowinspace_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ($req ? " aria-required='true'" : ' ');

	$fields = array(
		'author' => '<p>' .
					'<input type="text" id="author" name="author" placeholder="'.__('Name (required)', 'sparrowinspace-framework').'" value="' . esc_attr($commenter['comment_author']) . '" '. $aria_req .' />' .
					'</p>',
		'email' => '<p>' .
					'<input type="email" id="email" name="email" placeholder="'.__('Email (required) (will not be displayed)', 'sparrowinspace-framework').'" value="' . esc_attr($commenter['comment_author_email']) . '" '. $aria_req .' />' .
					'</p>',
		'url' => '<p>' .
					'<input type="url" id="url" name="url" placeholder="'.__('Website', 'sparrowinspace-framework').'" value="' . esc_attr($commenter['comment_author_url']) . '" />' .
					'</p>',
		);

	return $fields;

}

add_filter('comment_form_default_fields', 'sparrowinspace_custom_comment_fields');



// Load custom widgets
require_once('functions/widget-social-icons.php');
require_once('functions/sparrowinspace-customizer.php');

// Custom Jetpack Sharing Buttons location
function jptweak_remove_share() {
	remove_filter( 'the_content', 'sharing_display',19 );
	remove_filter( 'the_excerpt', 'sharing_display',19 );
}
add_action( 'loop_end', 'jptweak_remove_share' );

// Jetpack Infinite Scroll support
add_theme_support( 'infinite-scroll', array(
 	'type'           => 'scroll',
	'footer'	 => false,
	'footer_widgets' => 'footer',
	'container'      => 'articles',
	'wrapper'        => true,
));

// yarpp thumbnail size settings
add_image_size('yarpp-thumbnail', 130, 130, true );
define('YARPP_GENERATE_THUMBNAILS', true);
?>