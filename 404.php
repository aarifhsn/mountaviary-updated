<?php
/**
 * The template for displaying 404 pages (Not Found)
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */

get_header('topnav');
?>

<main class="bg-white dark:bg-gray-950 min-h-screen font-poppins">
	<div style="max-width:740px; margin:0 auto; padding:4rem 1.5rem;">

		<!-- Hero error block -->
		<div class="text-center mb-12">
			<p class="text-7xl font-extrabold text-slate-100 dark:text-slate-800 mb-2" style="letter-spacing:-2px;">404
			</p>
			<h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-slate-50 mb-3">
				<?php esc_html_e('Page not found', 'mountaviary'); ?>
			</h1>
			<p class="text-sm text-slate-400 dark:text-slate-500 max-w-sm mx-auto">
				<?php esc_html_e("It looks like nothing was found at this location. Try searching or browsing the links below.", 'mountaviary'); ?>
			</p>
		</div>

		<!-- Search -->
		<div class="mb-10">
			<?php get_search_form(); ?>
		</div>

		<div class="border-t border-slate-100 dark:border-slate-800 mb-10"></div>

		<!-- Recent Posts + Categories side by side -->
		<div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-10">

			<!-- Recent Posts -->
			<div>
				<h2 class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-4"
					style="letter-spacing:1.5px;">Recent Posts</h2>
				<?php
				$recent = new WP_Query(['posts_per_page' => 5, 'no_found_rows' => true]);
				if ($recent->have_posts()):
					while ($recent->have_posts()):
						$recent->the_post(); ?>
						<a href="<?php the_permalink(); ?>"
							class="flex items-start gap-2 py-2.5 border-b border-slate-100 dark:border-slate-800 no-underline group last:border-0">
							<span class="text-slate-200 dark:text-slate-700 mt-0.5 flex-shrink-0">›</span>
							<span
								class="text-sm font-semibold text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-slate-100 transition-colors leading-snug">
								<?php the_title(); ?>
							</span>
						</a>
					<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</div>

			<!-- Categories -->
			<div>
				<h2 class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-4"
					style="letter-spacing:1.5px;">Categories</h2>
				<?php
				$cats = get_categories(['orderby' => 'count', 'order' => 'DESC', 'number' => 8]);
				foreach ($cats as $cat): ?>
					<a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
						class="flex items-center justify-between py-2.5 border-b border-slate-100 dark:border-slate-800 no-underline group last:border-0">
						<span
							class="text-sm font-semibold text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-slate-100 transition-colors">
							<?php echo esc_html($cat->name); ?>
						</span>
						<span class="text-xs font-bold text-slate-300 dark:text-slate-600">
							<?php echo $cat->count; ?>
						</span>
					</a>
				<?php endforeach; ?>
			</div>

		</div>

		<!-- Tags -->
		<?php
		$tags = get_tags(['orderby' => 'count', 'order' => 'DESC', 'number' => 20]);
		if ($tags): ?>
			<div class="border-t border-slate-100 dark:border-slate-800 pt-8">
				<h2 class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-4"
					style="letter-spacing:1.5px;">Tags</h2>
				<div class="flex flex-wrap gap-2">
					<?php foreach ($tags as $tag): ?>
						<a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="inline-block px-2.5 py-1 rounded-lg text-xs font-semibold no-underline transition-colors
				text-slate-500 dark:text-slate-400
				bg-slate-100 dark:bg-slate-800
				hover:bg-slate-200 dark:hover:bg-slate-700
				hover:text-slate-800 dark:hover:text-slate-200">
							#<?php echo esc_html($tag->name); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</main>

<?php get_footer(); ?>