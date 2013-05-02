<?php
// Add a menu option to link to the customizer
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Sparrow in Space Theme Options', "Sparrow in Space Theme Options", 'edit_theme_options', 'customize.php');
}

// Add options to the theme customizer page
add_action('customize_register', 'sparrowinspace_customize_register');
function sparrowinspace_customize_register($wp_customize){

	/*************************************************************
	*							SECTIONS 						 *
	*************************************************************/
	
	// Section Header
	$wp_customize->add_section('sparrowinspace_header', array(
		'title' => __('Header', 'sparrowinspace-framework'),
		'description' => __('Allows you to change how things look in the header.', 'sparrowinspace-framework'),
		'priority' => 36
	));

// Section Front Page
		$wp_customize->add_section('sparrowinspace_front_page', array(
		'title' => __('Front Page', 'sparrowinspace-framework'),
		'description' => __('Allows you to change how things look on the front page.', 'sparrowinspace-framework'),
		'priority' => 119
	));

	// Section Posts
	$wp_customize->add_section('sparrowinspace_posts', array(
		'title' => __('Posts', 'sparrowinspace-framework'),
		'description' => __('Allows you to change how things look in the posts.', 'sparrowinspace-framework'),
		'priority' => 120
	));

	// Section Footer
	$wp_customize->add_section('sparrowinspace_footer', array(
		'title' => __('Footer', 'sparrowinspace-framework'),
		'description' => __('Allows you to change which parts of the footer to display', 'sparrowinspace-framework'),
		'priority' => 126
	));

	// Section Forms
		$wp_customize->add_section('sparrowinspace_contact_email', array(
		'title' => __('Forms', 'sparrowinspace-framework'),
		'description' => __('Set the receiver email for the contact form.', 'sparrowinspace-framework'),
		'priority' => 124
	));


	/*************************************************************
	*							HEADER   						 *
	*************************************************************/

	// Display Top Left Menu
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_top_left_menu]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_top_left_menu]', array(
		'label' => __('Display Top Left Menu?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_header',
		'settings' => 'sparrowinspace_custom_settings[display_top_left_menu]',
		'type' => 'checkbox'
	));
	
	// Display Top Right Menu
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_top_right_menu]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_top_right_menu]', array(
		'label' => __('Display Top Right Menu?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_header',
		'settings' => 'sparrowinspace_custom_settings[display_top_right_menu]',
		'type' => 'checkbox'
	));

	// Display logo
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_logo]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_logo]', array(
		'label' => __('Display Logo?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_header',
		'settings' => 'sparrowinspace_custom_settings[display_logo]',
		'type' => 'checkbox'
	));

	// Upload new logo

	$wp_customize->add_setting('sparrowinspace_custom_settings[logo]', array(
		'default' => IMAGES.'/logo.png',
		'type' => 'option'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Upload a new logo, 84x84px.', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_header',
		'settings' => 'sparrowinspace_custom_settings[logo]'
	)));

	// Display Main Menu
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_main_menu]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_main_menu]', array(
		'label' => __('Display Main Menu?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_header',
		'settings' => 'sparrowinspace_custom_settings[display_main_menu]',
		'type' => 'checkbox'
	));



	/*************************************************************
	*							FRONT PAGE    					 *
	*************************************************************/

	// Display Tags on the front page
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_tags_front]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_tags_front]', array(
		'label' => __('Display tags on the front page?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_front_page',
		'settings' => 'sparrowinspace_custom_settings[display_tags_front]',
		'type' => 'checkbox'
	));	

	/*************************************************************
	*							POSTS    						 *
	*************************************************************/

	// Display Author Info at the end of posts
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_author_info]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_author_info]', array(
		'label' => __('Display Author Info at the end of posts?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_posts',
		'settings' => 'sparrowinspace_custom_settings[display_author_info]',
		'type' => 'checkbox'
	));

	// Display Tags at the end of posts
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_tags_posts]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_tags_posts]', array(
		'label' => __('Display Tags at the end of posts?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_posts',
		'settings' => 'sparrowinspace_custom_settings[display_tags_posts]',
		'type' => 'checkbox'
	));


	/*************************************************************
	*							FOOTER   						 *
	*************************************************************/

	// Display Footer Widgets Area
	$wp_customize->add_setting('sparrowinspace_custom_settings[display_footer_widgets]', array(
		'default' => 0,
		'type' => 'option'
	));

	$wp_customize->add_control('sparrowinspace_custom_settings[display_footer_widgets]', array(
		'label' => __('Display Footer Widgets area?', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_footer',
		'settings' => 'sparrowinspace_custom_settings[display_footer_widgets]',
		'type' => 'checkbox'
	));



	/*************************************************************
	*							FORMS   						 *
	*************************************************************/
	
	$wp_customize->add_setting('sparrowinspace_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('sparrowinspace_custom_settings[contact_email]', array(
		'label' => __('Contact Form Email Address', 'sparrowinspace-framework'),
		'section' => 'sparrowinspace_contact_email',
		'settings' => 'sparrowinspace_custom_settings[contact_email]',
		'type' => 'text'
	));
}
?>