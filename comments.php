<?php
/**
 * The template for displaying comments
 *
 * @package mountaviary
 */

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area font-poppins">

	<?php if (have_comments()): ?>

		<!-- Comments count title -->
		<h2 class="text-lg font-extrabold text-slate-700 dark:text-slate-50 mb-6">
			<?php
			$count = get_comments_number();
			if ('1' === $count) {
				printf(
					esc_html__('One thought on &ldquo;%1$s&rdquo;', 'mountaviary'),
					'<span class="font-normal text-slate-500 dark:text-slate-400">' . wp_kses_post(get_the_title()) . '</span>'
				);
			} else {
				printf(
					esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $count, 'comments title', 'mountaviary')),
					number_format_i18n($count),
					'<span class="font-normal text-slate-500 dark:text-slate-400">' . wp_kses_post(get_the_title()) . '</span>'
				);
			}
			?>
		</h2>

		<!-- Comments navigation (top) -->
		<?php the_comments_navigation([
			'prev_text' => '‹ Older comments',
			'next_text' => 'Newer comments ›',
		]); ?>

		<!-- Comment list -->
		<ol class="comment-list list-none p-0 m-0 space-y-4 mb-8">
			<?php
			wp_list_comments([
				'style' => 'ol',
				'short_ping' => true,
				'avatar_size' => 36,
				'callback' => 'mountaviary_comment_callback',
			]);
			?>
		</ol>

		<?php if (!comments_open()): ?>
			<p class="text-sm text-slate-400 dark:text-slate-500 py-4 border-t border-slate-100 dark:border-slate-800">
				<?php esc_html_e('Comments are closed.', 'mountaviary'); ?>
			</p>
		<?php endif; ?>

	<?php endif; ?>

	<!-- Comment form -->
	<?php
	comment_form([
		'title_reply' => '<span class="text-lg font-extrabold text-slate-700 dark:text-slate-50">Leave a comment</span>',
		'title_reply_to' => '<span class="text-lg font-extrabold text-slate-700 dark:text-slate-50">Reply to %s</span>',
		'cancel_reply_link' => 'Cancel',
		'label_submit' => 'Post Comment',
		'class_submit' => 'comment-submit-btn',
		'comment_field' => '
      <p class="comment-form-comment mb-4">
        <textarea id="comment" name="comment" rows="5" required
          placeholder="Share your thoughts…"
          class="w-full px-4 py-3 rounded-xl text-sm border border-slate-200 dark:border-slate-700
            bg-white dark:bg-slate-900
            text-slate-800 dark:text-slate-200
            placeholder-slate-300 dark:placeholder-slate-600
            focus:outline-none focus:border-slate-400 dark:focus:border-slate-500
            transition-colors resize-none"></textarea>
      </p>',
		'fields' => [
			'author' => '
        <p class="comment-form-author mb-4">
          <input id="author" name="author" type="text" required
            placeholder="Your name *"
            class="w-full px-4 py-3 rounded-xl text-sm border border-slate-200 dark:border-slate-700
              bg-white dark:bg-slate-900
              text-slate-800 dark:text-slate-200
              placeholder-slate-300 dark:placeholder-slate-600
              focus:outline-none focus:border-slate-400 dark:focus:border-slate-500
              transition-colors" />
        </p>',
			'email' => '
        <p class="comment-form-email mb-4">
          <input id="email" name="email" type="email" required
            placeholder="Your email *"
            class="w-full px-4 py-3 rounded-xl text-sm border border-slate-200 dark:border-slate-700
              bg-white dark:bg-slate-900
              text-slate-800 dark:text-slate-200
              placeholder-slate-300 dark:placeholder-slate-600
              focus:outline-none focus:border-slate-400 dark:focus:border-slate-500
              transition-colors" />
        </p>',
			'url' => '',   // hide website field
			'cookies' => '
        <p class="comment-form-cookies-consent mb-4 flex items-start gap-2">
          <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox"
            class="mt-0.5 accent-slate-800 dark:accent-slate-200" />
          <label for="wp-comment-cookies-consent" class="text-xs text-slate-400 dark:text-slate-500 leading-relaxed">
            ' . esc_html__('Save my name and email for the next time I comment.', 'mountaviary') . '
          </label>
        </p>',
		],
	]);
	?>

</div><!-- #comments -->

<?php
/**
 * Custom comment callback for styled comment output
 */
function mountaviary_comment_callback($comment, $args, $depth)
{
	$tag = ('div' === $args['style']) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('group', $comment); ?>>

		<div class="flex gap-3 p-4 rounded-xl border border-slate-100 dark:border-slate-800
	  bg-white dark:bg-gray-950
	  hover:border-slate-200 dark:hover:border-slate-700 transition-colors">

			<!-- Avatar -->
			<div class="flex-shrink-0">
				<?php echo get_avatar($comment, 36, '', '', ['class' => 'rounded-full']); ?>
			</div>

			<!-- Body -->
			<div class="flex-1 min-w-0">

				<!-- Meta row -->
				<div class="flex items-center gap-2 mb-2 flex-wrap">
					<span class="text-sm font-bold text-slate-800 dark:text-slate-200">
						<?php echo get_comment_author_link($comment); ?>
					</span>
					<span class="text-slate-200 dark:text-slate-700">·</span>
					<time class="text-xs text-slate-400 dark:text-slate-500"
						datetime="<?php comment_date('c', $comment); ?>">
						<?php echo get_comment_date('F j, Y', $comment); ?>
					</time>
					<?php if ('0' === $comment->comment_approved): ?>
						<span
							class="text-xs px-2 py-0.5 rounded-md bg-amber-50 dark:bg-amber-950 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-800 font-semibold">
							Awaiting moderation
						</span>
					<?php endif; ?>
				</div>

				<!-- Comment text -->
				<div class="text-sm leading-relaxed text-slate-600 dark:text-slate-400 mb-2">
					<?php comment_text($comment); ?>
				</div>

				<!-- Reply link -->
				<?php
				comment_reply_link(array_merge($args, [
					'add_below' => 'comment',
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
					'before' => '<div class="comment-reply">',
					'after' => '</div>',
					'reply_text' => '↩ Reply',
				]));
				?>

			</div>
		</div>

	</<?php echo $tag; ?>>
	<?php
}
?>