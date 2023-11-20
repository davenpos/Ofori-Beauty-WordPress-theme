<?php
if (post_password_required()):
	return;
endif;
?>

<div id="comments" class="comments-area">
	<?php if (have_comments()): ?>
		<h3 class="comments-title">
			<?php
			printf(
				_x(
					'Comments on "%2$s" (' . get_comments_number() . ')',
					'comments title',
					'oforibeautytheme'
				),
				number_format_i18n(get_comments_number()),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h3>

		<ul class="comment-list">
			<?php
			$commentsQuery = new WP_Comment_Query();
			$comments = $commentsQuery->query(array(
				'status' => 'approve',
				'parent' => 0
			));

			if ($comments):
				oforib_commentsDisplay($comments, 1);
			endif; ?>
		</ul>
		
		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
			<nav class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'oforibeautytheme'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'oforibeautytheme')); ?></div>
				<div class="nav-next"><?php next_comments_link( __('Newer Comments &rarr;', 'oforibeautytheme') ); ?></div>
			</nav>
		<?php endif;

		if (!comments_open() && get_comments_number()): ?>
			<p class="no-comments"><?php _e('Comments are closed.', 'oforibeautytheme'); ?></p>
		<?php endif;
	else: ?>
		<h3 class="comments-title">No comments on this post.</h3>
	<?php endif;

	comment_form(array(
		'title_reply' => 'Leave a comment',
		'title_reply_to' => 'Reply to %s',
		'logged_in_as' => '<p class="logged-in-as">Logged in as ' . wp_get_current_user()->display_name . '.</p>'
	)); ?>

</div>