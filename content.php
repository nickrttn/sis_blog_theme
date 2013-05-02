<?php
// TEMPLATE FOR STANDARD POST
?>
<?php $options = get_option('sparrowinspace_custom_settings'); ?>
<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
						
	<header class="clearfix">

		<a href="<?php the_permalink(); ?>">
			<div class="article-meta-date">
				<span class="date-day"><?php echo get_the_date('d'); ?></span>
				<span class="date-month"><?php echo get_the_date('M'); ?></span>
			</div>
		</a>
		
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p class="article-meta-extra">Posted by <?php the_author_posts_link(); ?> at <?php the_time(get_option('time_format')); ?>, in <?php the_category(',&nbsp;'); ?> 
		<?php // Display the comments link if comments are allowed and the posts isn't pwd protected
		if (comments_open() && !post_password_required()) {
		 	comments_popup_link(__(' - No Comments', 'sparrowinspace-framework'), __(' - 1 Comment', 'sparrowinspace-framework'), __(' - % Comments', 'sparrowinspace-framework'));
		 } ?></p>
	</header>

	<?php if(has_post_thumbnail()) : ?>
		<figure class="article-preview-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
	<?php endif; ?>

	<?php the_content(__('More &raquo;', 'sparrowinspace-framework')); ?>

	<?php if($options['display_tags_front']) : ?>
		<div class="tag-container-nobo">
			<?php the_tags('Tags: ', ','); ?>
		</div>
	<?php endif; ?>



</article>

<hr class="fancy-hr" />