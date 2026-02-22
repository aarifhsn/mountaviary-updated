<?php
/**
 * The template for displaying archive pages
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */
get_header('topnav');
?>

<main class="bg-white dark:bg-gray-950 min-h-screen font-poppins">
	<div style="max-width:740px; margin:0 auto; padding:2.5rem 1.5rem 4rem;">

		<!-- Archive header -->
		<div class="mb-8 pb-6 border-b border-slate-100 dark:border-slate-800">
			<p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-2"
				style="letter-spacing:1.5px;">Archive</p>
			<?php the_archive_title(
				'<h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-slate-50">',
				'</h1>'
			); ?>
			<?php the_archive_description(
				'<p class="text-sm text-slate-400 dark:text-slate-500 mt-1">',
				'</p>'
			); ?>
		</div>

		<?php if (have_posts()): ?>

			<div class="space-y-0">
				<?php while (have_posts()):
					the_post(); ?>

					<article class="group flex gap-4 py-5 border-b border-slate-100 dark:border-slate-800 last:border-0">

						<!-- Thumbnail -->
						<?php if (has_post_thumbnail()): ?>
							<a href="<?php the_permalink(); ?>" class="flex-shrink-0 overflow-hidden rounded-xl no-underline"
								style="width:96px; height:72px;">
								<?php the_post_thumbnail('thumbnail', [
									'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.05]',
									'style' => 'width:96px; height:72px;',
								]); ?>
							</a>
						<?php endif; ?>

						<!-- Details -->
						<div class="flex-1 min-w-0">

							<!-- Category + Date -->
							<div class="flex items-center gap-2 mb-1.5">
								<?php
								$cats = get_the_category();
								if (!empty($cats)): ?>
									<a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>" class="inline-block px-2 py-0.5 rounded-md no-underline font-bold uppercase transition-colors
					  text-emerald-700 dark:text-emerald-400
					  bg-emerald-50 dark:bg-emerald-950
					  border border-emerald-200 dark:border-emerald-800
					  hover:bg-emerald-100 dark:hover:bg-emerald-900" style="font-size:10px; letter-spacing:1.5px;">
										<?php echo esc_html($cats[0]->name); ?>
									</a>
									<span class="text-slate-200 dark:text-slate-700">·</span>
								<?php endif; ?>
								<span class="text-xs text-slate-400 dark:text-slate-500">
									<?php the_date('F j, Y'); ?>
								</span>
							</div>

							<!-- Title -->
							<h3 class="font-bold leading-snug text-slate-900 dark:text-slate-100 mb-1" style="font-size:16px;">
								<a href="<?php the_permalink(); ?>"
									class="no-underline hover:text-slate-500 dark:hover:text-slate-300 transition-colors">
									<?php the_title(); ?>
								</a>
							</h3>

							<!-- Excerpt -->
							<p class="text-sm leading-relaxed text-slate-400 dark:text-slate-500 line-clamp-2">
								<?php echo wp_trim_words(get_the_excerpt(), 18, '…'); ?>
							</p>

						</div>

					</article>

				<?php endwhile; ?>
			</div>

			<!-- Pagination -->
			<?php
			$links = paginate_links([
				'total' => $wp_query->max_num_pages,
				'current' => max(1, get_query_var('paged')),
				'prev_text' => '‹',
				'next_text' => '›',
				'type' => 'array',
			]);
			if ($links): ?>
				<div class="flex items-center justify-center gap-1.5 mt-10">
					<?php foreach ($links as $link): ?>
						<div><?php echo $link; ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		<?php else: ?>

			<div class="text-center py-12">
				<p class="text-4xl mb-4">📂</p>
				<p class="text-base font-semibold text-slate-700 dark:text-slate-300 mb-1">
					<?php esc_html_e('No posts found', 'mountaviary'); ?>
				</p>
				<p class="text-sm text-slate-400 dark:text-slate-500">
					<?php esc_html_e('Nothing has been published here yet.', 'mountaviary'); ?>
				</p>
			</div>

		<?php endif; ?>

	</div>
</main>

<?php get_footer(); ?>