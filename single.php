<?php get_header(); ?>
<?php $options = get_option('sparrowinspace_custom_settings'); ?>


<!-- MAIN CONTENT -->
<div class="container">

	<div class="row">

		<aside class="span3 main-sidebar">
			<?php get_sidebar(); ?>
		</aside> <!-- end aside -->
		<!-- END SIDEBAR -->


		<!-- START ARTICLES -->
		<div class="span1"></div>

		<div class="span7 articles-container-fix">
			
			<div class="articles clearfix">

				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

				<article class="clearfix">
					
					<header>

						<div class="article-meta-date">
							<span class="date-day"><?php echo get_the_date('d'); ?></span>
							<span class="date-month"><?php echo get_the_date('M'); ?></span>
						</div>
						
						<h1><?php the_title(); ?></h1>

						<p class="article-meta-extra">
							Posted by <?php the_author_posts_link(); ?> at <?php the_time(get_option('time_format')); ?>, in <?php the_category(',&nbsp;'); ?><?php if (comments_open() && !post_password_required()) { comments_popup_link(__(' - No Comments', 'sparrowinspace-framework'), __(' - 1 Comment', 'sparrowinspace-framework'), __(' - % Comments', 'sparrowinspace-framework')); } ?>
						</p>
						
					</header>

					<?php if(has_post_thumbnail()) : ?>

						<figure class="article-full-image">
							<?php the_post_thumbnail('custom-blog-image'); ?>
						</figure>

					<?php else : ?>
						
						<hr />
					
					<?php endif; ?>

					<?php the_content(); ?>

					<?php if ($options['display_tags_posts']) : ?>
						<?php if(has_tag()) : ?>
							<p class="tag-container"><?php the_tags(); ?></p>
						<?php endif; ?>
					<?php endif; ?>

					<div class="post-pagination">
						<?php $args = array (
							'before' 	=> '<p class="post-navigation">',
							'after'	 	=> '</p>',
							'pagelink' 	=> 'Page %'
						); ?>
						<?php wp_link_pages($args); ?>
					</div>

				</article>

					<?php echo sharing_display(); ?>
					<?php related_posts(); ?>


				<?php if ($options['display_author_info']) : ?>
					<div class="article-author">
							<h5>Article by <?php the_author_posts_link(); ?></h5>
							<p><?php the_author_meta( 'description' ); ?></p>
					</div> <!-- end article-author -->
				<?php endif; ?>

			<?php endwhile; else : ?>

				<article>
					<h1><?php _e('No posts were found!', 'sparrowinspace-framework'); ?></h1>
				</article>

			<?php endif; ?>

			</div> <!-- end articles -->

			<div class="comments-area" id="comments">
				<?php comments_template('', true); ?>
			</div><!-- end comments-area -->

		</div> <!-- end span7 -->

	</div> <!-- end row -->

</div> <!-- end container -->

<!-- END MAIN CONTENT -->

<?php get_footer(); ?>