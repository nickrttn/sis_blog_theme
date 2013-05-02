<?php
// TEMPLATE FOR LINK POST
?>
<?php $options = get_option('sparrowinspace_custom_settings'); ?>
<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">

	<header>

		<div class="article-meta-date">
			<span class="date"><?php the_date(get_option('date_format')); ?></span>
		</div>
		
		<p class="article-meta-extra">
			Posted by <?php the_author_posts_link(); ?> at <?php the_time(get_option('time_format')); ?>, in <?php the_category(',&nbsp;'); ?> 
			<?php if (comments_open() && !post_password_required()) { comments_popup_link(__(' - No Comments', 'sparrowinspace-framework'), __(' - 1 Comment', 'sparrowinspace-framework'), __(' - % Comments', 'sparrowinspace-framework')); } ?>
		</p>

	</header>

	<div class="url-container">

		<p><?php the_title(); ?></p>
		<span><?php the_content(); ?></span>

	</div> <!-- end url-container -->

	<?php if($options['display_tags_front']) : ?>
		<div class="tag-container-nobo">
			<?php the_tags('Tags: ', ','); ?>
		</div>
	<?php endif; ?>

</article>

<hr class="fancy-hr" />