<?php
// Prevent the direct loading of this file
if (!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php') {
	die(__('You cannot access this file directly.', 'sparrowinspace-framework'));	
}

// Check if post is password protected
if (post_password_required()) : ?>
	<p>
		<?php _e('This post is password protected. Enter the password to view the comments.', 'sparrowinspace-framework'); ?>
		<?php return; ?>
	</p>
<?php endif; if (have_comments()) : ?>

	<p class="article-add-comments"><a href="#respond">Leave a comment</a></p>
	<h3><?php comments_number(__('No Comments', 'sparrowinspace-framework'), __('1 Comment', 'sparrowinspace-framework'), __('% Comments', 'sparrowinspace-framework')); ?></h3>
	<ol class="commentslist">
		<?php wp_list_comments('callback=sparrowinspace_comments'); ?>
	</ol>

	<?php if (get_comment_pages_count() > 1 && get_option( 'page_comments' )) : ?>
		<div class="comments-nav-section clearfix">
			<p class="fl"><?php previous_comments_link(__('&laquo; Older Comments', 'sparrowinspace-framework')); ?></p>
			<p class="fr"><?php next_comments_link(__('Newer Comments &raquo; ', 'sparrowinspace-framework')); ?></p>
		</div>
	<?php endif; ?>

<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	<p><?php _e('Comments are closed.', 'sparrowinspace-framework'); ?></p>
<?php endif; 

// Display comment form
comment_form();
?>