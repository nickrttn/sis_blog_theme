	<?php $options = get_option('sparrowinspace_custom_settings'); ?>
	<footer>
		<?php if ($options['display_footer_widgets']) : ?>
			<div class="footer-widget-area">

				<div class="container">

					<div class="row">

						<?php get_sidebar('footer'); ?>

					</div> <!-- end row -->

				</div> <!-- end container -->

			</div> <!-- end footer-widget-area -->
		<?php endif; ?>

		<div class="copyright-container clearfix">

			<div class="container">
			
				<p class="top-link-footer"><a href="#top"><?php _e('Go to Top', 'sparrowinspace_framework'); ?></a></p>
				<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> </p>
				<p>Designed &amp; Developed by <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></p>
			
			</div> <!-- end container -->

		</div> <!-- end copyright-container -->

		<?php if( extension_loaded('newrelic') ) { echo newrelic_get_browser_timing_footer(); } ?>

	</footer>

	<?php wp_footer(); ?>

</body>
</html>