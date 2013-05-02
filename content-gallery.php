<?php
// TEMPLATE FOR GALLERY POST
?>
<?php $options = get_option('sparrowinspace_custom_settings'); ?>
<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
						
	<header>

		<div class="article-meta-date">
			<span class="date"><?php the_date(get_option('date_format')); ?></span>
		</div>
		
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		
		<p class="article-meta-extra">
			Posted by <?php the_author_posts_link(); ?> at <?php the_time(get_option('time_format')); ?>, in <?php the_category(',&nbsp;'); ?>
			<?php if (comments_open() && !post_password_required()) { comments_popup_link(__(' - No Comments', 'sparrowinspace-framework'), __(' - 1 Comment', 'sparrowinspace-framework'), __(' - % Comments', 'sparrowinspace-framework')); } ?>
		</p>

	</header>

	<?php 
	$gallery_atts = array(
		'post_parent'		=> $post->ID,
		'post_mime_type'	=> 'image'
		);
	$gallery_images = get_children($gallery_atts);

	if(!empty($gallery_images)){
		$gallery_count = count($gallery_images);
		$first_image = array_shift($gallery_images);
		$display_first_image = wp_get_attachment_image($first_image->ID);
	?>

		<figure class="article-preview-image">
			<a href="<?php the_permalink(); ?>">
				<?php echo $display_first_image; ?>
			</a>
		</figure>

		<p><strong><?php printf(_n('This gallery contains %s photo.',
								   'This gallery contains %s photos.', $gallery_count,
								   'sparrowinspace-framework'), $gallery_count); ?></strong></p>

	<?php } ?>

	<?php if($options['display_tags_front']) : ?>
		<div class="tag-container-nobo">
			<?php the_tags('Tags: ', ','); ?>
		</div>
	<?php endif; ?>

</article>

<hr class="fancy-hr" />