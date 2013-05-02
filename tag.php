<?php get_header(); ?>

<!-- MAIN CONTENT -->
<div class="container">

	<div class="row">

		<aside class="span3 main-sidebar">
			
			<?php get_sidebar(); ?>

		</aside> <!-- end aside -->

		<div class="span1"></div>

		<div class="span7 articles-container-fix">
			
			<div class="articles">

				<?php if(have_posts()) : ?> 

					<div class="additional-content">

						<h3><?php single_tag_title(__('Posts tagged with: ', 'sparrowinspace-framework'), true); ?></h3>

					</div> <!-- end additional-content -->

					<hr class="fancy-hr" />

				<?php while(have_posts()) : the_post(); ?>

					<?php get_template_part('content', get_post_format()); ?>

				<?php endwhile; else : ?>

					<article>
						<h1><?php _e('No posts were found.', 'sparrowinspace-framework'); ?></h1>
					</article>

				<?php endif; ?>

				<div class="articles-nav clearfix">
					
					<p class="articles-nav-prev"><?php next_posts_link(__('&laquo; Older Posts', 'sparrowinspace-framework')); ?></p>
					<p class="articles-nav-next"><a href=""><?php previous_posts_link(__('Newer Posts &raquo;', 'sparrowinspace-framework')); ?></a></p>

				</div> <!-- end articles-nav -->

			</div> <!-- end articles -->

		</div> <!-- end span7 -->

	</div> <!-- end row -->

</div> <!-- end container -->

<?php get_footer(); ?>