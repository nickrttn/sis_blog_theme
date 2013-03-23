<?php get_header(); ?>

	<!-- MAIN CONTENT -->
	<div class="container">

		<div class="row">
			
			<aside class="span3 main-sidebar">
			
				<?php get_sidebar(); ?>

			</aside> <!-- end aside -->

			<div class="span7 articles-container-fix">
				
				<div class="articles clearfix">

					<article class="clearfix">
						
						<header>					
							<h1><?php _e('Oh Snap!', 'sparrowinspace-framework'); ?></h1>
						</header>

						<p>
							<?php _e('Oops, it seems you\'re looking for a page that doesn\'t exist. Blame the gnomes.', 'sparrowinspace-framework'); ?>
						</p>
						
					</article>

				</div> <!-- end articles -->

			</div> <!-- end span7 -->

		</div> <!-- end row -->

	</div> <!-- end container -->

<?php get_footer(); ?>