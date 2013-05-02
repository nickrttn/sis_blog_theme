<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title('&#9652;', true, 'right'); ?></title>
	
	<meta name="author" content="">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="<?php print IMAGES; ?>/icons/favicon.ico">
	<link rel="apple-touch-icon" href="<?php print IMAGES; ?>/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php print IMAGES; ?>/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php print IMAGES; ?>/icons/apple-touch-icon-114x114.png">

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php $options = get_option('sparrowinspace_custom_settings'); ?>

	<!-- HEADER -->
	<header class="main-header" id="top">
	<?php if( extension_loaded('newrelic') ) { echo newrelic_get_browser_timing_header(); } ?>

		<div class="top-menu-container">

			<div class="container">

				<div class="row">

					<div class="span5">

						<?php if ($options['display_top_left_menu']) : ?>
							<nav class="top-menu-navigation-left clearfix">
								<?php wp_nav_menu(array('theme_location' => 'top-menu-left')); ?>
							</nav>

							<a href="" class="small-button white" id="rwd-top-nav-btn"><?php _e('Select a page...', 'sparrowinspace-framework'); ?></a>
							<div class="rwd-top-nav"></div> <!-- end rwd-top-nav -->
						<?php endif; ?>
						
					</div> <!-- end span5 -->

					<div class="span2">

					<?php if ($options['display_logo'] && $options['logo'] != '') : ?>
						<h1 class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php print $options['logo']; ?>" alt="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>"><span class="logo-text"><?php bloginfo( 'name' ); ?></span></a></h1>
					<?php endif ?>

					</div> <!-- end span2 -->

					<div class="span5">
						
						<?php if ($options['display_top_right_menu']) : ?>
							<nav class="top-menu-navigation-right clearfix">
							<?php wp_nav_menu(array('theme_location' => 'top-menu-right')); ?>
							</nav>
						<?php endif; ?>

					</div>

				</div> <!-- end row -->

			</div> <!-- end container -->

		</div> <!-- end top-menu-container -->

		<div class="container">
			<?php if ($options['display_main_menu']) : ?>
				<nav class="main-navigation clearfix">
					<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
				</nav>
			<?php endif; ?>

			<a href="" class="small-button white" id="rwd-main-nav-btn"><?php _e('Select a page...', 'sparrowinspace-framework'); ?></a>
			<div class="rwd-main-nav"></div> <!-- end rwd-main-nav -->

		</div> <!-- end container -->

	</header> <!-- end main-header -->
	<!-- END HEADER -->