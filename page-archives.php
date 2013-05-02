<?php /* Template Name: Archive Page */ ?>
<?php get_header(); ?>

	<!-- MAIN CONTENT -->
	<div class="container">

		<div class="row">

			<aside class="span3 main-sidebar">
				<?php get_sidebar(); ?>
			</aside> <!-- end aside -->

			<div class="span1"></div>

			<div class="span7 articles-container-fix">
				
				<div class="articles clearfix">

					<article class="clearfix">
						
						<header>
							<div class="article-meta-date">
								<span class="date"><?php the_date(get_option('date_format')); ?></span>
							</div>
							
							<h1><?php the_title(); ?></h1>
							<?php if (current_user_can('edit_post', $post->ID)) {
								edit_post_link(__('Edit This', 'sparrowinspace-framework'),'<p class="article-meta-extra">', '</p>');
							} ?>
						</header>

						<hr class="image-replacement" />

						<h4><?php _e('Archives by Month', 'sparrowinspace-framework'); ?></h4>
						<ul>
							<?php wp_get_archives( 'type=monthly' ); ?>
						</ul>

						<hr />

						<h4><?php _e('Archives by Category', 'sparrowinspace-framework'); ?></h4>
						<?php wp_list_categories('title_li='); ?>


					</article>

				</div> <!-- end articles -->

			</div> <!-- end span7 -->

		</div> <!-- end row -->

	</div> <!-- end container -->

<?php get_footer(); ?>